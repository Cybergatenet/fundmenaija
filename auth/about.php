<?php
    include_once('../config.php');
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
    <title>FundMeNaija | About Us</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <!-- Preloader CSS -->
    <link  href="../asserts/css/preloader.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Main css -->
    <link href="../asserts/css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container d-flex justify-content-between align-items-center py-2 px-lg-5">
            <!---------------------- Logo ---------------------->
            <a href='../index.php' class="logo-container nav-link d-flex align-items-center">
                <div style="width: 70px; height: 50px; position: relative;">
                    <img src="../assets/img/Logo3.png" alt="Logo" class="img-fluid" style="width: 100%; height: 100%; position: absolute" />
                </div>
                <div class="logo h6">FUNDMENAIJA</div>
            </a>
            <!-- ------------- Desktop screen menu  ------------- -->
            <ul class="list-unstyled desktop">
                <div class="d-flex align-items-center">
                    <li>
                        <a href='./about.php' class='nav-link mx-lg-2 py-2 px-3' id='nav-link'>About</a>
                    </li>
                    <li>
                        <a href='./contact.php' class="nav-link mx-lg-2 py-2 px-3" id='nav-link'>Contact</a>
                    </li>
                    <li>
                        <a href='./donate.php' class="nav-link mx-lg-2 py-2 px-3" id='nav-link'>Donate</a>
                    </li>
                    <li>
                        <a href='../user/login.php' class="nav-link mx-lg-2 py-2 px-3" id='nav-link'>Sign in</a>
                    </li>
                    <li>
                        <button>
                            <a href="../user/createAccount.php"
                                class="nav-link font-weight-bold text-white px-4">Sign up
                            </a>
                        </button>
                    </li>
                </div>
            </ul>

            <!-- ------------- Mobile screen menu  ------------- -->
            <ul class="mobile">
                <div class="d-flex font-weight-bold border-top">
                    <li>
                        <a href='./about.php' class='nav-link my-3 text-white'>About</a>
                    </li>
                    <li>
                        <a href='./contact.php' class='nav-link my-3 text-white'>Contact</a>
                    </li>
                    <li>
                        <a href='./donate.php' class='nav-link my-3 text-white'>Donate</a>
                    </li>
                    <li>
                        <a href='../user/login.php' class='nav-link my-3 text-white'>Sign in </a>
                    </li>
                    <li>
                        <a href='../user/createAccount.php' class='nav-link my-3 text-white'>Sign up </a>
                    </li>
                </div>
            </ul>

             <!-- ----------------- Hamburger menu ----------------- -->
            <div class='hambuger' onClick="hamburger()">
                <i class='menuIcon fa fa-bars text-white fa-2x'></i>
                <i class='menuIcon fa fa-times text-white fa-2x hideMenu'></i>
            </div>
        </div>
    </header>


    <!-------------------- Banner -------------------->
    <section class='Banner py-5'>
        <div class="container py-5 px-lg-5 my-4">
            <main class='col-md-12 text-center py-3'>  
                <h1 class='display-3' style="color: #fff; opacity: 1; font-weight: 700">
                    <span style="color: #f3613c">About </span> Us
                </h1>
            </main>
        </div>
    </section>


    <section class='about'>
        <div class="col-md-9 mx-auto px-5 py-5 bg-white shadow-sm">
            <p>Fundmenaija is global community designed to provide solutions on funding for everyone with a genuine need globally.
            Fundmenaija is a unique Crowdfunding market place that stands on efficiency, global best practice and transparency,
            Everyone is welcomed to Fundmenaija as a fundraiser or a donor, both as individuals and organization, we will server you just by creating a fundraiser wallet and get approved in seconds. Fundmenaija is global community designed to provide solutions on funding for everyone with a genuine need globally.
            </p>
        </div>
    </section>


    <!---------------------- Footer template ---------------------->
    <footer  style="background: #1e1e26; display: flex; justify-content: center">
        <div class="container px-4 d-lg-flex justify-content-between align-items-baseline text-white">
            <span>
                <div class="d-flex align-items-center my-lg-0 my-5">
                    <div style="width: 70px; height: 50px; position: relative;">
                        <img src="../assets/img/Logo3.png" alt="Logo" class="img-fluid" style="width: 100%; height: 100%; position: absolute" />
                    </div>
                    <div class="logo h6 text-white">FUNDMENAIJA</div>
                </div>
                <div class="d-flex social-icons my-4">
                    <a href='<?php echo INSTAGRAM; ?>' class='nav-link text-white'>
                        <i class='fab fa-instagram fa-2x'></i>
                    </a>
                </div>
            </span>
            <ul class="list-unstyled my-5 d-lg-flex">
                <li class='my-2'>
                    <a href='../index.php' class='nav-link text-white'>Home</a>
                </li>
                <li class='my-2'>
                    <a href='./about.php' class='nav-link text-white'>About</a>
                </li>
                <li class='my-2'>
                    <a href='./contact.php' class='nav-link text-white'>Contact</a>
                </li>
                <li class='my-2'>
                    <a href='./donate.php' class='nav-link text-white'>Donate</a>
                </li>
            </ul>
    
            <ul class="list-unstyled my-5">
                <li><a href='#' class='nav-link text-white'>Privacy policy</a></li>
                <li><a href='#' class='nav-link text-white'>Help</a></li>
            </ul>
        </div>
    </footer>
    
     <!-- preloader -->
     <div id="preloader"></div>

    <script src="../assets/js/main.js"></script>
    <script src='../authjs/index.js'></script>
</body>
</html>