<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../mail/phpmailer/PHPMailer/src/Exception.php';
require '../mail/phpmailer/PHPMailer/src/PHPMailer.php';
require '../mail/phpmailer/PHPMailer/src/SMTP.php';


require '../vendor/autoload.php';
include_once('../config.php');

$errMsg = '';
$errMsgClass = '';
$name = $company = $email = $phone = $message = '';
session_start();

if(isset($_POST['contact'])){
    // echo "submitted";
    // return;
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $name = htmlspecialchars($_POST['name']);
    $company = htmlspecialchars($_POST['company']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    if(!empty($name) && !empty($company) && !empty($email) && !empty($phone) && !empty($message)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $errMsg = "Please use a vaild email";
            $errMsgClass = "alert-danger";
        }else{
                $toemail = SENDER;
				$title = "FundMeNaija Contact from ".$name;
				$body = '<html><body>';
				$body .= '<h2>Message For FundMeNaija</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>company</h4><p>'.$company.'</p>
					<h4>phone</h4><p>'.$phone.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>';
				$body .= '</body></html>';
            try {
                //Server settings
                $mail->SMTPDebug = 0;
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
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                // $mail->Port       = 587;                        
                $mail->Port       = 465;                           
            
                //Recipients
                $mail->setFrom(EMAIL, 'FundMeNaija Contact');
                $mail->addAddress(SENDER, 'Cybergate');
                $mail->addCC(_SENDER_);
                             
                $mail->addReplyTo(SENDER, 'Sender');
            
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
                            alert('Your Message have been sent');
                        </script>
                    ";
                    $errMsg = "Thank you ".$name . " for partnering with us."."\r\n"." Your Request is being considered and we will get back to you as soon as possible";
                    $errMsgClass = "alert-success";
                    // header('location: ./contact.php');
                }else{
                    // var_dump($mail);
                    // echo "<br><h1>Failed wotowoto</h1>";
                    // return;
                    $errMsg = "Your email was not successful. Retry";
                    $errMsgClass = "alert-danger";
                }

                $name = $company = $email = $phone = $message = '';
                // header('location: ../index.php');
            } catch (Exception $e) {
                $errMsg = "Your email was not successful. Try again later";
                $errMsgClass = "alert-danger";
                exit();
            }
        }
    }else{
        $errMsg = "Please Fill in All Fields";
        $errMsgClass = "alert-danger";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="FundMeNaija"
      content="FundMeNaija website"
    />
      <!-- Favicons -->
    <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <title>FundMeNaija | Contact</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Main css -->
    <link href="../asserts/css/styles.css" type="text/css" rel="stylesheet">
    <link href="../asserts/css/contact.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header style="background: white">
        <div class="container d-flex justify-content-between align-items-center py-2 px-lg-5">
            <!---------------------- Logo ---------------------->
            <a href='../index.php' class="logo-container nav-link d-flex align-items-center">
                <div class='logo-img'>
                    <img src="../assets/img/Logo3.png" alt="Logo" class="img-fluid">
                </div>
                <div class="logo h6 text-dark">FUNDMENAIJA</div>
            </a>
            <!-- ------------- Desktop screen menu  ------------- -->
            <ul class="list-unstyled desktop">
                <div class="d-flex align-items-center">
                    <li>
                        <a href='../auth/about.php' class='nav-link text-dark mx-lg-2 py-2 px-3' id='nav-link'>About</a>
                    </li>
                    <li>
                        <a href='../auth/contact.php' class="nav-link text-dark mx-lg-2 py-2 px-3" id='nav-link'>Contact</a>
                    </li>
                    <li>
                        <a href='../auth/donate.php' class="nav-link text-dark mx-lg-2 py-2 px-3" id='nav-link'>Donate</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
                            echo '<li><a id="nav-link" class="nav-link scrollto text-dark" href="../user/logout.php">Logout</a></li>';
                        }else{
                            echo '<li>
                            <a href="../user/login.php" class="nav-link mx-lg-2 py-2 px-3 text-dark" id="nav-link">Sign in</a>
                        </li>
                        <li>
                            <button>
                                <a href="../user/createAccount.php"
                                    class="nav-link font-weight-bold text-white px-4">Sign up
                                </a>
                            </button>
                        </li>';
                        }
                    ?>
                </div>
            </ul>

            <!-- ------------- Mobile screen menu  ------------- -->
            <ul class="mobile">
                <div class="d-flex font-weight-bold border-top">
                    <li>
                        <a href='../index.php' class='nav-link my-3 text-white'>Home</a>
                    </li>
                    <li>
                        <a href='../auth/about.php' class='nav-link my-3 text-white'>About</a>
                    </li>
                    <li>
                        <a href='../auth/contact.php' class='nav-link my-3 text-white'>Contact</a>
                    </li>
                    <li>
                        <a href='../auth/donate.php' class='nav-link my-3 text-white'>Donate</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
                            echo '<li><a id="nav-link" class="nav-link scrollto text-white" href="../user/logout.php">Logout</a></li>';
                        }else{
                            echo '<li>
                            <a href="../user/login.php" class="nav-link mx-lg-2 py-2 px-3" id="nav-link">Sign in</a>
                        </li>
                        <li>
                            <button>
                                <a href="../user/createAccount.php"
                                    class="nav-link font-weight-bold text-white px-4">Sign up
                                </a>
                            </button>
                        </li>';
                        }
                    ?>
                </div>
            </ul>

             <!-- ----------------- Hamburger menu ----------------- -->
            <div class='hambuger' onClick="hamburger()">
                <i class='menuIcon fa fa-bars text-dark fa-2x'></i>
                <i class='menuIcon fa fa-times text-dark fa-2x hideMenu'></i>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="wrapper animated bounceInLeft shadow-sm bg-white">
            <div class="company-info">
                <ul>
                    <li class="my-5 text-dark"><i class="fas fa-address-book mx-3"></i>Lagos, Nigeria</li>
                    <li class="my-5 text-dark"><i class="fas fa-phone mx-3"></i> contact.fundmenaija@gmail.com</li>
                    <li class="my-5 text-dark"><i class="fas fa-envelope mx-3"></i> contact@fundmenaija.com</li>
                </ul>
            </div>
            <div class="contact">
                <!-- <h3>Email Us</h3> -->
                <!-- <div class="alert alert-danger">Your Message has been sent</div> -->
                <form id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <!-- <form id="contactForm" action="<?php echo FORMSUBMIT; ?>" method="POST"> -->
                        <!-- Error Msg -->
                <div class="alert <?php echo $errMsgClass; ?>"><?php echo $errMsg; ?></div>

                    <p>
                        <label class="mx-3">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter your full name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                    </p>
                    <p>
                        <label class="mx-3">Company</label>
                        <input type="search" name="company" id="company" placeholder="Enter your company Name if Any" value="<?php echo isset($_POST['company']) ? $_POST['company'] : ''; ?>">
                    </p>
                    <p>
                        <label class="mx-3">Email Address</label>
                        <input type="email" name="email" id="email" placeholder="Enter your Email Address" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                    </p>
                    <p>
                        <label class="mx-3">Phone Number</label>
                        <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>">
                    </p>
                    <p class="full">
                        <label class="mx-3">Message</label>
                        <textarea name="message" rows="5" id="message" placeholder="Add a comment..."><?php echo isset($_POST['message']) ? $_POST['message'] : ''; ?></textarea>
                    </p>
                    <p class="full">
                        <button type="submit" name="contact">Send Mail</button>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <!-- Contact us Bot Chat -->
    <?php include_once('../inc/support.php'); ?>
    <!---------------------- Footer template ---------------------->
    
    <footer  style="background: #1e1e26; display: flex; justify-content: center">
        <div class="container p-4 d-lg-flex justify-content-between text-white">
            <span class='my-5'>
                <div class="d-flex align-items-center">
                    <div style="width: 70px; height: 50px; position: relative;">
                        <img src="../assets/img/Logo3.png" alt="Logo" class="img-fluid" style="width: 100%; height: 100%; position: absolute" />
                    </div>
                    <div class="logo h6 text-white">FUNDMENAIJA</div>
                </div>
                <div class="d-flex social-icons my-4">
                    <a href='#' class='nav-link text-white'>
                        <i class='fab fa-instagram fa-2x'></i>
                    </a>
                </div>
            </span>
            <ul class="list-unstyled my-5 d-lg-flex">
                <li class='my-2'>
                    <a href='../index.php' class='nav-link text-white'>Home</a>
                </li>
                <li class='my-2'>
                    <a href='auth/about.php' class='nav-link text-white'>About</a>
                </li>
                <li class='my-2'>
                    <a href='auth/contact.php' class='nav-link text-white'>Contact</a>
                </li>
                <li class='my-2'>
                    <a href='auth/donate.php' class='nav-link text-white'>Donate</a>
                </li>
            </ul>
    
            <ul class="list-unstyled my-5">
                <li><a href='#' class='nav-link text-white'>Privacy policy</a></li>
                <li><a href='#' class='nav-link text-white'>Help</a></li>
            </ul>
        </div>
    </footer>


    <script src='../authjs/index.js'></script>
    <!-- <script src="../assets/js/main.js"></script> -->
</body>
</html>
