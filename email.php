<?php
  function sendOTPMail($email, $otp){
    // Multiple recipients
    // $to = 'abelchinedu2@gmail.com, cybergatenet@yahoo.com'; // note the comma
    $to = $email; // note the comma

    // Subject
    $subject = 'Email Verification';

    // Message
    $message = '
    <html>
    <head>
      <title>Verification Email</title>
    </head>
    <body>
      <h3>Verification Email</h3>
      <p>Here is your Provisional  OTP: '.$otp.'</p>
      Thank you for choosing Fundmenaija
    </body>
    </html>
    ';

    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // Additional headers
    $headers[] = 'To: Cybergate <customer@example.com>, Abel <abel@example.com>';
    $headers[] = 'From: Fundmenaija <fundmenaija@example.com>';
    $headers[] = $email;
    $headers[] = $email;

    // Mail it
        mail($to, $subject, $message, implode("\r\n", $headers));
        // if(mail($to, $subject, $message, implode("\r\n", $headers))){
        //     echo "successful <br>";
        // }else{
        //     echo "Failed: <br>";
        //     var_dump(ini_set());
        // }
  }
?>