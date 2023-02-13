<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    
    require './phpmailer/PHPMailer/src/Exception.php';
    require './phpmailer/PHPMailer/src/PHPMailer.php';
    require './phpmailer/PHPMailer/src/SMTP.php';

    include_once('../config.php');

<<<<<<< HEAD
=======



>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
// //Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    //Server settings
<<<<<<< HEAD
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPDebug = 0;
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = SMTP_HOST;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = SENDER;                     //SMTP username
    $mail->Password   = PWD;                               //SMTP password
=======
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = EMAIL;                     //SMTP username
    $mail->Password   = PASSWORD;                               //SMTP password
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(EMAIL, 'FundMeNaija');

    $mail->addAddress('abelchinedu2@gmail.com', 'Cybergate');     //Add a recipient

    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo(SENDER, 'FundMeNaija');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Verification Code';
    $mail->Body    = 'Use this code to valid your Account <b>in bold!</b>';
    $mail->AltBody = 'Alternatively, you can click on this link to verify your account';

    $mail->send();
    echo "
        <script>
            alert('Your account has been verified');
        </script>
    ";
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>