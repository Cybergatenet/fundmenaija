<?php 
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../mail/phpmailer/PHPMailer/src/Exception.php';
    require '../mail/phpmailer/PHPMailer/src/PHPMailer.php';
    require '../mail/phpmailer/PHPMailer/src/SMTP.php';

    include_once('../config.php');

    function auth_mail($userMail, $userOTP, $userName){

        $toemail = $userMail;
        $title = "OTP Contact from FundMeNaija";
        $body = '<html><body>';
        $body .= '<h2>Message For FundMeNaija</h2>
            <h4>Name</h4><p>'.$userName.'</p>
            <h4>OTP Details: </h4><p style="box-sizing: border-box;display: inline-block;font-family:arial,helvetica,sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #094c54; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
            <span style="display:block;padding:13px 30px;line-height:120%;"><span style="font-size: 18px; line-height: 19.2px; font-weight: 900;">Your OTP: '.$userOTP.'</span></span>
          </a></p>';
        $body .= '</body></html>';
        try {
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            // * Options:
            // * @see SMTP::DEBUG_OFF: No output
            // * @see SMTP::DEBUG_CLIENT: Client messages
            // * @see SMTP::DEBUG_SERVER: Client and server messages
            // * @see SMTP::DEBUG_CONNECTION: As SERVER plus connection status
            // * @see SMTP::DEBUG_LOWLEVEL: Noisy, low-level data output, rarely needed
            $mail->isSMTP();                      
            $mail->Host       = SMTP_HOST;
            $mail->SMTPAuth   = true;                  
            $mail->Username   = SENDER;
            $mail->Password   = PWD;          
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPSecure = 'tls';
            // $mail->Port       = 587;                        
            $mail->Port       = 465;                           
        
            //Recipients
            $mail->setFrom(SENDER, 'FundMeNaija');
            $mail->addAddress($userMail, $userName);
            // $mail->addCC(_SENDER_);
                            
            $mail->addReplyTo(SENDER, 'Fundmenaija');
        
            // Content
            $mail->isHTML(true);        
            $mail->Subject = $title;
            $mail->Body = $body;
            $mail->AltBody = $body;
                
            $mail->send();
            if($mail){
                // var_dump($mail);
                // echo "<br><h1>Successful</h1>";
                // return;
                echo "
                    <script>
                        alert('OTP Sent Successfully');
                    </script>
                ";
                // $errMsg = "Thank you ".$name . " for partnering with us."."\r\n"." Your Request is being considered and we will get back to you as soon as possible";
                // $errMsgClass = "alert-success";
                // header('location: ../user/createAccount.php');
            }else{
                // var_dump($mail);
                // echo "<br><h1>Failed wotowoto</h1>";
                // return;
                // $errMsg = "Your email was not successful. Retry";
                // $errMsgClass = "alert-danger";
                echo "
                    <script>
                        alert('".$$userName.", Your OTP was not successful. Retry');
                    </script>
                ";
            }
            // $singleErrorMessage = $mail->ErrorInfo;
            // var_dump($singleErrorMessage);

            // $name = $company = $email = $phone = $message = '';
            // header('location: ../index.php');
        } catch (Exception $e) {
            // $errMsg = "Your email was not successful. Try again later";
            // $errMsgClass = "alert-danger";
            echo "
                <script>
                    alert('OTP Failed. Sign up Again');
                </script>
                ";
            // exit();
        }
    }

    // auth_mail("cybergatenet@yahoo.com", '123456', "Debuger");
?>