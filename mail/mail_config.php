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
<<<<<<< HEAD
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = GMAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth = true;     
            $mail->Username = EMAIL; 
            $mail->Password = PASSWORD;  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;//Enable implicit TLS encryption
            $mail->Port       = 465;//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
=======
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL;                     //SMTP username
            $mail->Password   = PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b

            //Recipients
            $mail->setFrom(EMAIL, 'FundMeNaija');

            $mail->addAddress($customerMail, $name);     //Add a recipient

<<<<<<< HEAD
            $mail->addReplyTo(EMAIL, 'FundMeNaija');
=======
            $mail->addReplyTo(SENDER, 'FundMeNaija');
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b

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
<<<<<<< HEAD
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
=======
            // $mail->AltBody = 'Alternatively, you can click on this link to verify your account';

            $mail->send();
            echo "
                <script>
                    alert('Verification Code Sent To Email');
                </script>
            ";
            echo 'Message has been sent';
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
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