<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require '../mail/phpmailer/PHPMailer/src/Exception.php';
    require '../mail/phpmailer/PHPMailer/src/PHPMailer.php';
    require '../mail/phpmailer/PHPMailer/src/SMTP.php';

    include_once('../config.php');

    function sendOtp($customerMail, $otp, $name)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = GMAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;     
            $mail->Username = EMAIL; 
            $mail->Password = PASSWORD;  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;//Enable implicit TLS encryption
            $mail->Port       = 465;//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(EMAIL, 'FundMeNaija');

            $mail->addAddress($customerMail, $name);     //Add a recipient

            $mail->addReplyTo(EMAIL, 'FundMeNaija');

            $content = file_get_contents('../mail/otpMail.php');
            $mail->isHTML(true);
            $mail->Subject = "Email Verification";

            $swap_var = array(

                "{Name}" => "$name",
                "{otp}" => "$otp",
                "{APP_NAME}" => APP_NAME,
                "{Address}" => ADDRESS,

            );

            foreach (array_keys($swap_var) as $key) {
                if (strlen($key) > 2 && trim($key) != "") {
                    $content = str_replace($key, $swap_var[$key], $content);
                }
            }

            $mail->Body = "$content";

            // $mail->Body    = 'Use this code to valid your Account <b>in bold!</b>';
            $mail->AltBody = "$content";

            $mail->send();
            if($mail){
                echo "
                    <script>
                        alert('Verification Code Sent To Email');
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Email Failed');
                    </script>
                ";
            }
            
            // echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
}

// function sendOtp($customerMail, $otp, $name)
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


//     $mail->setFrom(EMAIL, APP_NAME);
//     $mail->addAddress($customerMail);
//     $mail->addReplyTo(EMAIL);
    
//     $content = file_get_contents('../mail/otpMail.php');
//     $mail->isHTML(true);
//     $mail->Subject = "Email Verification";

//     $swap_var = array(

//         "{Name}" => "$name",
//         "{otp}" => "$otp",
//         "{APP_NAME}" => APP_NAME,
//         "{Address}" => ADDRESS,

//     );

//     foreach (array_keys($swap_var) as $key) {
//         if (strlen($key) > 2 && trim($key) != "") {
//             $content = str_replace($key, $swap_var[$key], $content);
//         }
//     }

//     $mail->Body = "$content";


//     if (!$mail->send()) {
//         echo "mail not sent";
//         echo "
//         <script>
//             alert('Email Verification has Failed. try Again');
//         </script>
//     ";
//     }else{
//         echo "
//         <script>
//             alert('Email Sent');
//         </script>
//     ";
//     }
// }

?>