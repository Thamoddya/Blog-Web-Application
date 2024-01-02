<?php

require "../include/PHPMailer.php";
require "../include/SMTP.php";
require "../include/Exception.php";

include_once "../connection.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];


if (empty($email)) {
    $errors = 'Email is required';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors = 'Email is invalid';
}
if (!empty($errors)) {
    echo "Error: " . $errors;
    exit;
}

$checkEmailQuery = $connection->prepare("SELECT COUNT(*) FROM `newsletter` WHERE `Email` = :Email");
$checkEmailQuery->bindValue(':Email', $email);
$checkEmailQuery->execute();

$emailExists = $checkEmailQuery->fetchColumn();

if ($emailExists) {
} else {
    $addEmailToDatabase = $connection->prepare("INSERT INTO newsletter (Email) VALUES (:Email)");
    $addEmailToDatabase->bindValue(':Email', $email);
    $addEmailToDatabase->execute();
}


class EmailTemplate
{
    public static function EmailFormat($email)
    {
        return "
        <html>
        <head>
            <style>
                /* Add your custom styles here */
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                }
                .container {
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                    background-color: #ffffff;
                    border-radius: 5px;
                }
                .header {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .thank-you {
                    font-size: 24px;
                    color: #333333;
                    margin-bottom: 10px;
                }
                .details {
                    font-size: 16px;
                    color: #666666;
                    margin-bottom: 20px;
                }
                .logo{
                    width: 100%;
                    display:flex;
                    align-items: center;
                    justify-content: center;
                }
            </style>
        </head>
        <body>
            <div class='container' style='background-color: #f8f8f8;'>
                <div class='header'>
                    <h1 class='thank-you' style='color: #333333;'>Thank You for Subscribing!</h1>
                    <img src='https://lh3.googleusercontent.com/drive-viewer/AFGJ81p9tJj2N0LkZeOp-nT_roVn70kLHxrxyCxa0c0gR5AePdKqbbc_vhfR83YFImblLEDVmaXvmR0gOD6PVU3MAYPEuk0AeA=s1600' class='logo' alt='Logo'/>
                </div>
                <div class='details'>
                    <p style='color: #666666;'><strong>Name:</strong> Thamoddya Rashmitha</p>
                    <p style='color: #666666;'><strong>Email:</strong> $email</p>
                    <p style='color: #666666;'>Thank you for joining our newsletter. We're excited to have you on board!</p>
                    <p style='color: #666666;'>To stop receiving our newsletter, please visit our website and leave a message through the contact area.</p>
                </div>
            </div>
        </body>
        </html>
        ";
    }
}


$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'thamoddya.smtp@gmail.com';
$mail->Password = 'vfpornoftoayuwgf';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('thamoddya.smtp@gmail.com', 'KNOWLADGE ADDICT');
$mail->addReplyTo("thamoddyarashmithadissanayake@gmail.com");
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'BLOG - Thamoddya Rashmitha';
$mail->Body = EmailTemplate::EmailFormat($email);

$mail->send();

if ($mail->send()) {
    echo "success";
} else {
    echo "Error: " . $mail->ErrorInfo;
}

$mail->smtpClose();
?>