<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="FundMeNaija"
      content="FundMeNaija website"
    />
    <!-- App Icon -->
     <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">
    <title>FundMeNaija | Home</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Main css -->
    <link href="../asserts/css/styles.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <header class='shadow-sm' style="background: backgroundColor">

        <div class="container d-flex justify-content-between align-items-center py-2 px-lg-5">
            <div class="d-flex align-items-center">
                <div style="width: 60px; height: 60px; position: relative;">
                    <img src="../assets/img/Logo3.png" alt="Logo" class="img-fluid" style="width: 100%; height: 100%; position: absolute" />
                </div>
                <div class="h4 text-white">Fundmenaija</div>
            </div>
            <ul class="list-unstyled desktop">
                <div class="d-flex align-items-center">
                    <li>
                        <a href='../auth/about.php' class='nav-link mx-lg-2 py-2 px-3' id='nav-link'>About</a>
                    </li>
                    <li>
                        <a href='../auth/contact.php' class="nav-link mx-lg-2 py-2 px-3" id='nav-link'>Contact</a>
                    </li>
                    <li>
                        <a href='../auth/donate.php' class="nav-link mx-lg-2 py-2 px-3" id='nav-link'>Donate</a>
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

            <!-- {/************* Mobile screen menu  *************/} -->
            <ul class="mobile">
                <div class="d-flex font-weight-bold border-top">
                    <li>
                        <Link href='../auth/about.php'
                            class='nav-link my-3 text-white'>About
                        </Link>
                    </li>
                    <li>
                        <Link href='../auth/contact.php'
                            class='nav-link my-3 text-white'>Contact
                        </Link>
                    </li>
                    <li>
                        <Link href='../auth/donate.php'
                            class='nav-link my-3 text-white'>Donate
                        </Link>
                    </li>
                    <li>
                        <Link href='../user/login.php'
                            class='nav-link my-3 text-white'>Log in
                        </Link>
                    </li>
                    <li>
                        <Link href='../user/createAccount.php'
                            class='nav-link my-3 text-white'>Sign up
                        </Link>
                    </li>
                </div>
            </ul>

            <!-- {/**************** Hamburger menu ****************/} -->
            <div class='hambuger' onclick="() => hamburger()">
                <!-- { switchMenuIcon !== 'true' 
                    ? 
                    <i class={changeLinkColor !== 'true' ? 
                        'fa fa-bars text-white fa-2x' : 
                        'fa fa-bars text-dark fa-2x'}>
                    </i>
                    :
                    <i class={changeLinkColor !== 'true' ? 
                        'fa fa-times text-white fa-2x' : 
                        'fa fa-times text-dark fa-2x'}>
                    </i>
                } -->
            </div>
        </div>
    </header>