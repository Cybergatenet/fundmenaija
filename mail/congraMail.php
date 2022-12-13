<?php

include_once "../config.php";
echo "sending mail...";
// function sendMessage($customerMail, $name)
function sendMessage($customerMail, $name)
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

    $content = file_get_contents('../mail/congraTemp.php');
    $mail->setFrom(SENDER, APP_NAME);
    $mail->addAddress($customerMail);
    $mail->addReplyTo(EMAIL);

    $mail->isHTML(true);
    $mail->Subject = "Account Created Sucessfully!";

    $swap_var = array(

        "{Name}" => "$name",
        "{APP_NAME}" => APP_NAME

    );

    foreach (array_keys($swap_var) as $key) {
        if (strlen($key) > 2 && trim($key) != "") {
            $content = str_replace($key, $swap_var[$key], $content);
        }
    }

    $mail->Body = "$content";


    if (!$mail->send()) {
        echo "Mail not sent <br>";
        // echo $mail->ErrorInfo;
        var_dump($mail);
    }else{
        echo "Mail has been sent";
    }
}


$email = "abelchinedu2@gmail.com";
$username = 'Cybergate';

sendMessage($email, $username);