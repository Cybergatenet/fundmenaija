<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="./asserts/css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
    <!------------desktop------------>
    <header>
        <div class="desktop d-flex align-items-center justify-content-between" style="height: 60px;">
            <a href="./index.php" class="d-flex align-items-center nav-link text-dark" style="height: 100%;">
                <span class="d-flex">
                    <div style="position: relative;
                    width: 80px; height: 100%; display: flex; align-items: center">
                        <img src="../assets/img/Logo3.png" 
                        class="img-fluid" style="width: 60%; height: 40%; left: 0;">
                    </div>
                    <div class="">FUNDMENAIJA</div>
                </span>
            </a>

            <ul class="list-unstyled d-flex">
                <li class="mx-3">About</li>
                <li class="mx-3">Contact</li>
                <li class="mx-3">Donate</li>
                <!-- <?php 
                    if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
                        echo '<li class="mx-3"><a id="nav-link" href="./user/logout.php" class="nav-link">Logout</a></li>';
                        
                    }else{
                        echo '<li class="mx-3"><a id="nav-link" href="./user/logout.php" class="nav-link">Sign in</a></li>;
                        <li><button><a href="./user/createAccount.php" class="nav-link font-weight-bold text-white px-4">Sign up</a></button></li>';
                    }
                ?> -->
            </ul>
        </div>
        <!-------------Mobile------------->
        <ul class="mobile list-unstyled py-5 text-center" style="background-color: #15242b;">
            <li><a href='./index.php' class='nav-link text-white'>Home</a></li>
            <li><a href='./auth/about.php' class='nav-link text-white'>About</a></li>
            <li><a href='./auth/contact.php' class='nav-link text-white'>Contact</a></li>
            <li><a href='./auth/donate.php' class='nav-link text-white'>Donate</a></li>
        </ul>
        <!-- ----------------- Hamburger menu ----------------- -->
        <div class='hambuger' onClick="hamburger()">
            <i class='menuIcon fa fa-bars text-white fa-2x'></i>
            <i class='menuIcon fa fa-times text-white fa-2x hideMenu'></i>
        </div>
    </header>
</body>
</html>

<header class="d-flex align-items-center">
        <div  class="container mx-auto px-0">
            <div class="d-flex justify-content-between align-items-center">
                <!--------Desktop-------->
                <a href="./index.php" class="nav-link">
                    <span class="d-flex">
                        <div style="position: relative;
                        width: 80px; height: 0%; display: flex; align-items: center">
                            <img src="./assets/img/Logo3.png" 
                            class="img-fluid" style="width: 60%; height: 40%; left: 0;">
                        </div>
                        <div class="logo text-white">FUNDMENAIJA</div>
                    </span>
                </a>
                <!-- <div class="desktop"> -->
                    <ul class="list-unstyled d-lg-flex mobile">
                        <li><a href='./index.php' class='nav-link text-white'>Home</a></li>
                        <li><a href='./auth/about.php' class='nav-link text-white'>About</a></li>
                        <li><a href='./auth/contact.php' class='nav-link text-white'>Contact</a></li>
                        <li><a href='./auth/donate.php' class='nav-link text-white'>Donate</a></li>
                        <!-- <?php 
                            if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
                                echo '<li class="mx-3"><a id="nav-link" href="./user/logout.php" class="nav-link">Logout</a></li>';
                                
                            }else{
                                echo '<li class="mx-3"><a id="nav-link" href="./user/logout.php" class="nav-link">Sign in</a></li>;
                                <li><button><a href="./user/createAccount.php" class="nav-link font-weight-bold text-white px-4">Sign up</a></button></li>';
                            }
                        ?> -->
                    </ul>
                <!-- </div> -->
            </div>
        </div>
        <!-------------Mobile------------->
        <!-- <ul class="mobile list-unstyled py-5 text-center d-none" style="background-color: #15242b;">
            <li><a href='./index.php' class='nav-link text-white'>Home</a></li>
            <li><a href='./auth/about.php' class='nav-link text-white'>About</a></li>
            <li><a href='./auth/contact.php' class='nav-link text-white'>Contact</a></li>
            <li><a href='./auth/donate.php' class='nav-link text-white'>Donate</a></li>
        </ul> -->
        <!-- ----------------- Hamburger menu ----------------- -->
        <div class='hambuger' onClick="hamburger()">
            <i class='menuIcon fa fa-bars text-white fa-2x'></i>
            <i class='menuIcon fa fa-times text-white fa-2x hideMenu'></i>
        </div>
    </header>



<header class='d-hidden'>
        <div class="container d-flex justify-content-between align-items-center py-2 px-lg-5">
            <!---------------------- Logo ---------------------->
            <a href='./index.php' class="logo-container nav-link d-flex align-items-center">
                <div class='logo-img'>
                    <img src="./assets/img/Logo3.png" alt="Logo" class="img-fluid">
                </div>
                <div class="logo h6 text-white">FUNDMENAIJA</div>
            </a>
            <!-- ------------- Desktop screen menu  ------------- -->
            <ul class="list-unstyled desktop">
                <div class="d-flex align-items-center">
                    <li><a href='./auth/about.php' class='nav-link mx-lg-2' id='nav-link'>About</a></li>
                    <li><a href='./auth/contact.php' class="nav-link mx-lg-2" id='nav-link'>Contact</a></li>
                    <li><a href='./auth/donate.php' class="nav-link mx-lg-2" id='nav-link'>Donate</a></li>
                    <?php 
                        if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
                            echo '<li><a id="nav-link" class="nav-link scrollto" href="./user/logout.php">Logout</a></li>';
                        }else{
                            echo '<li>
                            <a href="./user/login.php" class="nav-link mx-lg-2 py-2 px-3" id="nav-link">Sign in</a>
                        </li>
                        <li><button><a href="./user/createAccount.php" class="nav-link font-weight-bold text-white px-4">Sign up</a></button></li>';
                        }
                    ?>
                </div>
            </ul>

            <!-- ------------- Mobile screen menu  ------------- -->
            <ul class="mobile">
                <div class="d-flex font-weight-bold border-top">
                    <li><a href='./index.php' class='nav-link text-white'>Home</a></li>
                    <li><a href='./auth/about.php' class='nav-link text-white'>About</a></li>
                    <li><a href='./auth/contact.php' class='nav-link text-white'>Contact</a></li>
                    <li><a href='./auth/donate.php' class='nav-link text-white'>Donate</a></li>
                    <?php 
                        if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
                            echo '<li><a id="nav-link" class="nav-link scrollto text-white" href="./user/logout.php">Logout</a></li>';
                        }else{
                            echo '<li>
                            <a href="./user/login.php" class="nav-link mx-lg-2 py-2 px-3 text-white" id="nav-link">Sign in</a>
                        </li>
                        <li><button><a href="./user/createAccount.php" class="nav-link font-weight-bold text-white px-4">Sign up</a></button></li>';
                        }
                    ?>
                </div>
            </ul>

            <!-- ----------------- Hamburger menu ----------------- -->
            <div class='hambuger' onClick="hamburger()">
                <i class='menuIcon fa fa-bars text-white fa-2x'></i>
                <i class='menuIcon fa fa-times text-white fa-2x hideMenu'></i>
            </div>
        </div>
    </header>