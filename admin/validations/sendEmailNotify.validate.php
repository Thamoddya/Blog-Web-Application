<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require '../../include/Exception.php';
require '../../include/PHPMailer.php';
require '../../include/SMTP.php';

$postID = $_POST['NotifyPost'];
$date = $_POST['NotifyPostDate'];
$postTitle = $_POST['NotifyPostTitle'];


include_once "../../connection.php";

// Retrieve email addresses from the database
$getEmailsQuery = $connection->query("SELECT `Email` FROM newsletter");
$emails = $getEmailsQuery->fetchAll(PDO::FETCH_COLUMN);

class EmailTemplate2
{
    public static function EmailFormat($date, $postID, $postTitle)
    {
        return ' 
        <tbody>
    <tr>
        <td valign="top">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="630"
                class="m_979553475810290082container">
                <tbody>
                    <tr>
                        <td>
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center"
                                width="100%">
                                <tbody>
                                    <tr>
                                        <td class="m_979553475810290082container"
                                            style="background-position:initial;background-size:initial;background-repeat:initial;background-origin:initial;background-clip:initial"
                                            bgcolor="">
                                            <table role="presentation" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td class="m_979553475810290082container">
                                                            <table role="presentation" cellspacing="0" cellpadding="0"
                                                                border="0" align="center" width="100%" bgcolor="">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="padding:0px 15px">

                                                                            <table width="100%"
                                                                                style="table-layout:fixed;width:100%"
                                                                                role="presentation">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding:0;border-collapse:collapse;border-spacing:0;margin:0"
                                                                                            valign="top">
                                                                                            <div
                                                                                                style="width:100%;height:100%">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table width="100%"
                                                                                style="table-layout:fixed;width:100%"
                                                                                role="presentation" bgcolor="">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td style="padding:0;border-collapse:collapse;border-spacing:0;margin:0"
                                                                                            valign="top">
                                                                                            <div
                                                                                                style="width:100%;height:100%">
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table border="0"
                                                                                class="m_979553475810290082container"
                                                                                align="center" cellpadding="0"
                                                                                cellspacing="0" width="100%"
                                                                                style="margin-bottom:5px;margin-top:5px"
                                                                                role="presentation" bgcolor="">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td align="center"
                                                                                            style="border-collapse:collapse;border-spacing:0;margin:0;padding:0"
                                                                                            valign="top">
                                                                                            <img src="https://lh3.googleusercontent.com/drive-viewer/AFGJ81ohUIfBfeOUneCqDG1juCFJI8ZDWvn8s2nrJXJr8NO_MRsVDzZw3XJZWHpjgiN8ebzeVqsiloAMqKDZBYmZl2GoKOZo=s1600"
                                                                                                width="598"
                                                                                                style="width:100%;max-width:100%;object-fit:cover;padding:0;outline:none;border:none;display:block"
                                                                                                class="CToWUd a6T"
                                                                                                data-bit="iit"
                                                                                                tabindex="0">
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table role="presentation" cellspacing="0"
                                                                                cellpadding="0" border="0"
                                                                                align="center" width="100%" bgcolor="">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="m_979553475810290082container"
                                                                                            style="padding-top:5px;padding-bottom:0px">
                                                                                            <div>
                                                                                                <div
                                                                                                    style="text-align:left">
                                                                                                    <span
                                                                                                        style="font-size:24px;color:rgb(49,54,56)"><strong>Important
                                                                                                            Notice
                                                                                                        </strong></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table role="presentation" cellspacing="0"
                                                                                cellpadding="0" border="0"
                                                                                align="center" width="100%" bgcolor="">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="m_979553475810290082container"
                                                                                            style="padding-top:5px;padding-bottom:15px">
                                                                                            <div>
                                                                                                <div
                                                                                                    style="text-align:left">
                                                                                                    <span
                                                                                                        style="font-size:16px;color:rgb(49,54,56)"><strong>' . $date . '</strong></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table role="presentation" cellspacing="0"
                                                                                cellpadding="0" border="0"
                                                                                align="center" width="100%" bgcolor="">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="m_979553475810290082container"
                                                                                            style="padding-top:24px;padding-bottom:8px">
                                                                                            <div>
                                                                                                <div
                                                                                                    style="text-align:left">
                                                                                                    <span
                                                                                                        style="font-size:30px;color:rgb(49,54,56)"><strong>Notice
                                                                                                            About
                                                                                                            New
                                                                                                            Post</strong></span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table role="presentation" cellspacing="0"
                                                                                cellpadding="0" border="0"
                                                                                align="center" width="100%" bgcolor="">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="m_979553475810290082container"
                                                                                            style="padding-top:8px;padding-bottom:25px">
                                                                                            <div>Dear User,<br>
                                                                                                <p>We hope this
                                                                                                    email finds you
                                                                                                    well. We are
                                                                                                    excited to
                                                                                                    announce the
                                                                                                    release of our
                                                                                                    newest blog
                                                                                                    post, titled "
                                                                                                    <strong> ' . $postTitle . ' </strong>
                                                                                                    ," and we
                                                                                                    could not wait to
                                                                                                    share it with
                                                                                                    you.
                                                                                                </p>
                                                                                                <p>We always
                                                                                                    appreciate your
                                                                                                    feedback, so
                                                                                                    please do not
                                                                                                    hesitate to
                                                                                                    share your
                                                                                                    thoughts,
                                                                                                    comments, or
                                                                                                    questions about
                                                                                                    the blog post.
                                                                                                    You can simply
                                                                                                    reply to this
                                                                                                    email, and we
                                                                                                    will be
                                                                                                    delighted to
                                                                                                    hear from you.
                                                                                                </p>
                                                                                                <p>If you find the
                                                                                                    blog post
                                                                                                    valuable, we
                                                                                                    kindly ask you
                                                                                                    to share it with
                                                                                                    your colleagues,
                                                                                                    friends, or
                                                                                                    anyone in your
                                                                                                    network who may
                                                                                                    benefit from the
                                                                                                    information.
                                                                                                    Feel free to use
                                                                                                    the social media
                                                                                                    sharing buttons
                                                                                                    provided on the
                                                                                                    blog page to
                                                                                                    spread the word
                                                                                                    effortlessly.
                                                                                                </p>
                                                                                                <p>Thank you for
                                                                                                    your continued
                                                                                                    support and
                                                                                                    interest in our
                                                                                                    content. We
                                                                                                    genuinely hope
                                                                                                    you find value
                                                                                                    in our latest
                                                                                                    blog post and
                                                                                                    that it
                                                                                                    contributes to
                                                                                                    your
                                                                                                    professional
                                                                                                    growth.</p>

                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table border="0" cellpadding="0"
                                                                                cellspacing="0" width="100%"
                                                                                class="m_979553475810290082container"
                                                                                role="presentation">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td valign="top" align="center"
                                                                                            style="padding-bottom:24px;padding-top:24px">
                                                                                            <table border="0"
                                                                                                cellpadding="0"
                                                                                                cellspacing="0"
                                                                                                align="center"
                                                                                                style="border-radius:12px;background-color:rgb(50,133,255);width:35%;border-collapse:separate!important"
                                                                                                role="presentation"
                                                                                                class="m_979553475810290082eo-button"
                                                                                                width="209"
                                                                                                bgcolor="rgb(50, 133, 255)">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align="center"
                                                                                                            valign="middle">
                                                                                                            <a href="https://thamoddya.cloud/blog/single-post.php?postID=' . $postID . '"
                                                                                                                style="font-weight:bold;font-size:18px;padding:18px;letter-spacing:-0.5px;line-height:100%;text-align:center;text-decoration:none;color:rgb(255,255,255);display:block;font-family:Arial,Helvetica,sans-serif"
                                                                                                                ;
                                                                                                                title="Learn more">Go To Post</a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table role="presentation" cellspacing="0"
                                                                                cellpadding="0" border="0"
                                                                                align="center" width="100%" bgcolor="">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="m_979553475810290082container"
                                                                                            style="padding-top:15px;padding-bottom:15px">
                                                                                            <div><br>Thank you
                                                                                                once again for your
                                                                                                support, and we look
                                                                                                forward to sharing
                                                                                                this exciting new
                                                                                                journey with
                                                                                                you.<br>
                                                                                                <br>Warm
                                                                                                regards,<br><br>
                                                                                                <br>Thamoddya
                                                                                                Rashmitha<br>
                                                                                                Admin/Developer<br>
                                                                                                Knowledge Addict<br>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>

                                    <tr bgcolor="#ffffff" style="background-color:#ffffff">
                                        <td class="m_979553475810290082container"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>

</tbody>
        ';
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
        $mail->Body = EmailTemplate2::EmailFormat($date, $postID, $postTitle);

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