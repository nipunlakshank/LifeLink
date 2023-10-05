<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendContactForm(string $from, string $name, string $subject, string $message, string $body, array $attachments = null, $altBody = null): bool
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $success = true;

    try {
        //Server settings
        $mail->SMTPDebug = false;                      // Enable/Disable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = APP_EMAIL;                     //SMTP username
        $mail->Password   = EMAIL_PASSWORD;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // From
        $mail->setFrom($from, APP_NAME . " | Contact");

        // Recipients
        $mail->addAddress(APP_EMAIL, APP_NAME);
        // $mail->addAddress($recipient);

        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        if ($attachments != null) {
            foreach ($attachments as $attachment) {
                if (gettype($attachment) == "object")
                    $mail->addAttachment($attachment->value, $attachment->key);
                else
                    $mail->addAttachment($attachment);
            }
        }

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altBody ?? "Email: $from, \nName: $name, \nMessage: $message";

        $mail->send();
    } catch (Exception) {
        $success = false;
        echo "Message could not be sent. Mailer Error: $mail->ErrorInfo<br />";
    }

    return $success;
}
