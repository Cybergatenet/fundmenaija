<?php

include_once "../../config.php";
function sendOtp($customerMail, $otp, $name)
{

    require 'PHPMailerAutoload.php';
    require 'class.smtp.php';
    $mail  = new PHPMailer;
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';


    $mail->Username = SENDER;
    $mail->Password = PWD;

    $content = file_get_contents('../mail/otpMail.php');

    $mail->setFrom(EMAIL, APP_NAME);
    $mail->addAddress($customerMail);
    $mail->addReplyTo(EMAIL);

    $mail->isHTML(true);
    $mail->Subject = "Email Verification";

    $swap_var = array(

        "{Name}" => "$name",
        "{otp}" => "$otp",
        "{APP_NAME}" => APP_NAME

    );

    foreach (array_keys($swap_var) as $key) {
        if (strlen($key) > 2 && trim($key) != "") {
            $content = str_replace($key, $swap_var[$key], $content);
        }
    }

    $mail->Body = "$content";


    if (!$mail->send()) {
        echo "mail not sent";
    }
}
