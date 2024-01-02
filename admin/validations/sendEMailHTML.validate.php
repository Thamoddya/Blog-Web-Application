<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require '../../include/Exception.php';
require '../../include/PHPMailer.php';
require '../../include/SMTP.php';

$postDataHTML = $_POST['postDataHTML'];



include_once "../../connection.php";

// Retrieve email addresses from the database
$getEmailsQuery = $connection->query("SELECT `Email` FROM newsletter");
$emails = $getEmailsQuery->fetchAll(PDO::FETCH_COLUMN);

class EmailTemplate2
{
    public static function EmailFormat($postDataHTML)
    {
        return $postDataHTML;
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

// Set the sender
$mail->setFrom('thamoddya.smtp@gmail.com', 'KNOWLADGE ADDICT');

// Loop through each email address and send the email
foreach ($emails as $email) {
    try {
        // Set the recipient and email content
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'BLOG - Thamoddya Rashmitha';
        $mail->Body = EmailTemplate2::EmailFormat($postDataHTML);

        // Send the email
        $mail->send();

        // Clear recipients for the next iteration
        $mail->clearAddresses();

        
    } catch (Exception $e) {
        echo "Error sending email to: " . $email . ". Error message: " . $mail->ErrorInfo . "<br>";
    }
}
echo "Success";
?>