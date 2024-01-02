<?php

require "../include/PHPMailer.php";
require "../include/SMTP.php";
require "../include/Exception.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

if (empty($name)) {
    $errors = 'Name is required';
}
if (empty($email)) {
    $errors = 'Email is required';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors = 'Email is invalid';
}
if (empty($message)) {
    $errors = 'Message is required';
}
if (!empty($errors)) {
    echo "Error: " . $errors;
    exit;
}
class EmailTemplate {
    public static function EmailFormat($name, $email, $message) {
        return "<p>Name: $name</p>\n<p>Email: $email</p>\n<p>Message: $message</p>";
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
$mail->addReplyTo($email, $name);
$mail->addAddress("thamoddyarashmithadissanayake@gmail.com");
$mail->isHTML(true);
$mail->Subject = 'BLOG - Thamoddya Rashmitha';
$mail->Body = EmailTemplate::EmailFormat($name, $email, $message);

$mail->send();

if ($mail->send()) { 
    echo "success";
} else {
    echo "Error: " . $mail->ErrorInfo;
}

$mail->smtpClose();
?>