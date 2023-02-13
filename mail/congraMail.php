<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './phpmailer/PHPMailer/src/Exception.php';
require './phpmailer/PHPMailer/src/PHPMailer.php';
require './phpmailer/PHPMailer/src/SMTP.php';

include_once('../config.php');

function sendMessage($customerMail, $name)
{
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                  
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = SMTP_HOST;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = SENDER;                     //SMTP username
        $mail->Password   = PWD;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(EMAIL, 'FundMeNaija');

        $mail->addAddress($customerMail, $name);     //Add a recipient

        $mail->addReplyTo(SENDER, 'FundMeNaija');

        $mail->isHTML(true);
        
        $content = file_get_contents('../mail/congraTemp.php');
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

        // $mail->Body    = 'Use this code to valid your Account <b>in bold!</b>';
        // $mail->AltBody = 'Alternatively, you can click on this link to verify your account';

        $mail->send();
        echo "
            <script>
                alert('Verification Code Sent To Email');
            </script>
        ";
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

// function sendMessage($customerMail, $name)
// function sendMessage($customerMail, $name)
// {

//     require 'PHPMailerAutoload.php';
//     require 'class.smtp.php';
//     $mail  = new PHPMailer;
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->Port = 587;
//     $mail->SMTPAuth = true;
//     $mail->SMTPSecure = 'tls';

//     $mail->Username = EMAIL;
//     $mail->Password = PASSWORD;

//     $mail->setFrom(SENDER, APP_NAME);
//     $mail->addAddress($customerMail);
//     $mail->addReplyTo(EMAIL);
    
//     $mail->isHTML(true);

//     $content = file_get_contents('../mail/congraTemp.php');
//     $mail->Subject = "Account Created Sucessfully!";

//     $swap_var = array(

//         "{Name}" => "$name",
//         "{APP_NAME}" => APP_NAME

//     );

//     foreach (array_keys($swap_var) as $key) {
//         if (strlen($key) > 2 && trim($key) != "") {
//             $content = str_replace($key, $swap_var[$key], $content);
//         }
//     }

//     $mail->Body = "$content";


//     if (!$mail->send()) {
//         echo "Mail not sent <br>";
//         // echo $mail->ErrorInfo;
//         // var_dump($mail);
//     }else{
//         echo "Mail has been sent";
//     }
// }

?>