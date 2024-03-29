<?php

session_start();
include 'connection.php';
include "script.php";
include "../config.php";

// $row = array('ID'=>2);

// echo "super".$row['ID'].random_int(1,9);
// return;

<<<<<<< HEAD
=======

>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
// echo htmlspecialchars($_SERVER['PHP_SELF']);
// return;
if (isset($_SESSION['username'])) {
    if(isset($_SESSION['admin'])){
        header("location: ../admin/Dashboard.php");
        exit();
        return;
    }
    header("location: ../user/UserData/Dashboard.php");
    exit();
}else{

    if (isset($_POST['login'])) {
        // check if reCaptcha has been validated by Google      
        $secret = SECRET;
        $captchaId = htmlentities($_POST['g-recaptcha-response']);
        
        //sends post request to the URL and tranforms response to JSON
        $responseCaptcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captchaId));
        // Recaptcha Validation
        if(empty(trim($captchaId))){
            // echo '<script>alert("Recaptcha verify failed. Try Again");</script>';
            header("Location: ../user/login.php?error=You MUST check Recaptcha button");
            exit();
        }elseif($responseCaptcha->success != 'true'){
            // var_dump($responseCaptcha);
            header("Location: ../user/login.php?error=Recaptcha verification failed");
            exit();
            // return;
        }

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];
        $hashPassword = md5($password);
        $password_err = $username_err = "";

        if (empty(trim($_POST['password'])) && empty(trim($_POST['username']))) {

            header("Location: ../user/login.php?error=Username and Password required");
            exit();
        } elseif (empty(trim($_POST['username']))) {

            $username_err = "Username cannot be blank";
            header("Location: ../user/login.php?error=Username required");
            exit();
        } elseif (empty(trim($_POST['password']))) {

            header("Location: ../user/login.php?error=Password required");
            exit();
        } else {

            $query = "SELECT ID, Username, Password, AccountNo, Status, State FROM login WHERE Username= '{$username}' AND Password= '{$hashPassword}'";

            $result = mysqli_query($conn, $query) or die("Query Fail.");

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

                    $status = $row['Status'];
                    $state = $row['State'];

                    if ($state == 0) {
                        if ($status == "Active") {

                            $_SESSION['username'] = $row['Username'];
                            $_SESSION['verifyCode'] = $row['Username'];
                            // $_SESSION['id'] = $row['ID'];
                            $_SESSION['accountNo'] = $row['AccountNo'];   
                            
                            // replaced with google recaptcha && LOGIN instead
                            // header("Location: ../user/twostepverify.php");

                            header('Location: ../user/UserData/Dashboard.php');
                            mysqli_close($conn);
                        } else {
                            header("Location: ../user/login.php?error=Account not Activated");
                            exit();
                        }
                    } else if ($state == 1) {

                        if ($status == "Super") {
<<<<<<< HEAD
                            // session_start();
                            // $int = random_int(1,9);
                            $int = 8932437;

                            $_SESSION['username'] = $row['Username'];
                            $_SESSION['admin'] = "super".$row['ID'].$int;
=======
                            session_start();

                            $_SESSION['username'] = $row['Username'];
                            $_SESSION['admin'] = "super".$row['ID'].random_int(1,9);
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
                            
                            $_SESSION['accountNo'] = $row['AccountNo'];

                            header("Location: ../admin/Dashboard.php");
                            mysqli_close($conn);
                        } else {
                            header("Location: ../user/login.php?error=Account not Activated");
                            exit();
                        }
                    }
                }
            } else {
                header("Location: ../user/login.php?error=Invalid Credential");
                exit();
            }
        }
    }
}
// Route to handle forgotten password
    if (isset($_POST['forgotBtn'])) {

        header('Location: ../user/twostepsetup.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FundMeNaija | Login</title>
    <!-- Favicons -->
    <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">
    <!-- preloader CSS -->
    <link  href="../asserts/css/preloader.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/login.css">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Extra CSS for external module -->
    <style>
        .swal-button {
            padding: 7px 19px;
            border-radius: 2px;
            background: linear-gradient(to right, #8e2de2, #4a00e0);
            font-size: 12px;
            color: white;
        }

        .swal-button:hover {
            opacity: 0.8;
            background-color: transparent;
        }

        .pointer{
            cursor: pointer;
        }

    </style>
</head>
<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="login-card shadow p-0 col-md-9 mx-auto">
                
                <div class="row no-gutters">
                    
                    <div class="col-md-6">
                        <img src="../assets/img/PageImage/loginImage.jpg" alt="login" class="login-card-img img-fluid">
                    </div>
                    <div class="col-md-6 d-flex flex-column align-items-center">
                        <div class="">
                        
                            <a href="../index.php" class="nav-link text-dark d-flex">
                                <p><<</p>
                                <p class="mx-2 pointer">Home</p>
                            </a>
                            <div class="brand-wrapper">
                                <img src="../assets/img/Logo3.png" alt="logo" class="logo">
                                <p style="font-size: 1em; margin-top: 0.5em"><?php echo APP_NAME ?></p>
                            </div>
                            <p class="login-card-description">Sign into your account</p>

                            <!-- Login Form -->
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                                <?php if (isset($_GET['error'])) {  ?>

                                    <p style="color: red;"> *<?php echo $_GET['error'] ?> ! </p>

                                <?php } ?>

                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" id="Username" class="form-control" placeholder="Enter Username" required>
                                    <p id="alert1" style="color: red;"></p>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                                </div>
                                <div class="my-3">
                                    <input type="hidden" name="g-recaptcha-response" 
                                    value="<?php echo isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : ''; ?>"
                                    required>
                                    <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>" class="form-control"></div>
                                </div>

                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                            </form>
                            <a href="./forgotPassword.php" class="forgot-password-link">Forgot password?</a>
                            <p class="login-card-footer-text">Don't have an account? <a href="./createAccount.php" class="text-reset">Register here</a></p>
                            <!-- <nav class="login-card-footer-nav">
                                <a href="../auth/about.php">Terms of use</a>
                                <a href="../auth/about.php">Privacy policy</a>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<<<<<<< HEAD
    <!-- Contact us Bot Chat -->
    <?php include_once('../inc/support.php'); ?>
=======
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
    
    <div id="preloader"></div>

    <script src="../assets/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>
    <script src="../assets/js/showHidePass.js"></script>
    <script>
        <?php if (isset($_GET['error'])) { ?>
            swal({
                title: "Account Alert!",
                text: "<?php echo $_GET['error'] ?>",
                icon: "error",
            });


        <?php } ?>
    </script>
    <script>
        $(document).ready(function() {
            $('input[type=\'password\']').showHidePassword();

            // $('#OldPassword').showHidePassword();
        });
    </script>
</body>
</html>