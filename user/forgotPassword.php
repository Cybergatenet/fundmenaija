<?php

// including files
include 'connection.php';
include "script.php";
include "../config.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <!-- Favicons -->
    <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/forgotPass.css">

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

        @media (max-width: 768px) {
            #forgot-img {
                display: none;
            }

            .login-card .card-body {
                padding: 35px 0px;
            }

            .login-card-description {
                font-size: 1rem;
                color: #000;
                font-weight: normal;
                margin-bottom: 23px;
            }
        }
    </style>


</head>

<body>
    <main class="validate d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="bg-white mx-auto login-card col-md-5 py-4 shadow">
                <div class="row1  d-lg-flex justify-content-center no-gutters1">
                    <!-- <div id="forgot-img" class="col-md-5">
                        <img src="../assets/img/PageImage/forgotpass1.svg" alt="login" class="login-card-img1 img-fluid">
                    </div> -->
                    <div id="card-start" class="col-md-4s d-flex justify-content-center">
                        <div>
                            <div class="brand-wrapper">
                                <img src="../assets/img/Logo3.png" alt="logo" class="logo">
                                <p style="font-size: 1em; margin-top: 0.5em"><?php echo APP_NAME ?></p>
                            </div>
                            <p class="login-card-description">Validate Your Credential</p>

                            <!-- Login Form -->
                            <form action="" method="POST">

                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="Username" id="Username" class="form-control" placeholder="Username" required>
                                    <p id="alert1" style="color: red;"></p>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="Account Number" name="AccountNo" id="AccountNo" class="form-control" placeholder="AccountNo" required>
                                </div>
                                <input name="next" id="next" class="btn btn-block login-btn mb-4" type="submit" value="Next >>">
                            </form>
                            <div class="login-card-footer-text text-center m-0">Go Back To <a href="../index.php" class="text-reset1">Home</a></div>
                            <nav class="login-card-footer-nav text-center">
                                <a href="../pages/terms.php">Terms of use.</a>
                                <a href="../pages/privacypolicy.php">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>





    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert.min.js"></script>

    <script>
        <?php if (isset($_GET['error'])) { ?>
            swal({
                title: "Account Alert!",
                text: "<?php echo $_GET['error'] ?>",
                icon: "error",
            });


        <?php } ?>
    </script>
</body>

</html>