<?php

include_once "../config.php";

function sendOtp($customerMail, $otp, $name)
{

    require 'PHPMailerAutoload.php';
    require 'class.smtp.php';
    $mail  = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';


    $mail->Username = EMAIL;
    $mail->Password = PASSWORD;


    $content = file_get_contents('../mail/otpForgotTemp.php');
    $mail->setFrom(EMAIL, APP_NAME);
    $mail->addAddress($customerMail);
    $mail->addReplyTo(EMAIL);


    $mail->isHTML(true);
    $mail->Subject = "Forgot Password OTP";

    $swap_var = array(

        "{name}" => "$name",
        "{otp}" => "$otp",
        "{APP_NAME}" => APP_NAME,
        "{Address}" => ADDRESS

    );

    foreach (array_keys($swap_var) as $key) {
        if (strlen($key) > 2 && trim($key) != "") {
            $content = str_replace($key, $swap_var[$key], $content);
        }
    }

    $mail->Body = "$content";


    if ($mail->send()) {
        return "success";
    } else {
        return "fail";
    }
}
