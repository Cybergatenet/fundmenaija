<?php
    session_start();

    include_once('./config.php');
    include_once('./inc/conn.php');


    // fetching posts here
    $query_issues = 'SELECT * FROM `_issues` ORDER BY "post_time" DESC';
    $return_issues = mysqli_query($conn, $query_issues);
    $posts = array();

    if(mysqli_num_rows($return_issues) > 0){
        while($row = mysqli_fetch_assoc($return_issues)){
            $posts[] = $row;
        }
    }else{
        $posts[] = array("error"=>"NO Issues Found");
    }

#### Fetching single post
    // $post_id = mysqli_real_escape_string($conn, htmlspecialchars($_GET['post_id']));
    // if(!$post_id){
    //     header('location: ./index.php');
    // }
    // $_SESSION['post_id'] = $post_id;
    // $query_post = "SELECT * FROM charlycare_posts WHERE `id`='$post_id' LIMIT 1";
    // $result = mysqli_query($conn, $query_post);
    // $blog_posts = array();
  
    // if(mysqli_num_rows($result) > 0){
    //     while($row = mysqli_fetch_assoc($result)){
    //         $blog_posts[] = $row;
    //     }
    // }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Fundmenaija is global community designed to provide solutions on funding for everyone with a genuine need globally.">
    <meta name="keywords" content="Raise Money,Raise Fund,Help, Fund, Raise">
    <meta name="author" content="Designed by Cybergate Communication Network">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta
      name="FundMeNaija"
      content="FundMeNaija website"
    />
      <!-- Favicons -->
      <link href="./assets/img/favicon-32x32.png" rel="icon">
    <link href="./assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <title>FundMeNaija | Home</title>

    <!-- jQuery CDN here && other cdns here-->
    <script src="./authjs/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- ads scroll CSS -->
    <link rel="stylesheet" href="./asserts/css/ads.css" type="text/css">

    <!-- Main css -->
    <link href="./asserts/css/styles.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <header>
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
                    <li>
                        <a href='auth/about.php' class='nav-link mx-lg-2 py-2 px-3' id='nav-link'>About</a>
                    </li>
                    <li>
                        <a href='auth/contact.php' class="nav-link mx-lg-2 py-2 px-3" id='nav-link'>Contact</a>
                    </li>
                    <li>
                        <a href='auth/donate.php' class="nav-link mx-lg-2 py-2 px-3" id='nav-link'>Donate</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
                            echo '<li><a id="nav-link" class="nav-link scrollto" href="../user/logout.php">Logout</a></li>';
                        }else{
                            echo '<li>
                            <a href="user/login.php" class="nav-link mx-lg-2 py-2 px-3" id="nav-link">Sign in</a>
                        </li>
                        <li>
                            <button>
                                <a href="user/createAccount.php"
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
                        <a href='./index.php' class='nav-link my-3 text-white'>Home</a>
                    </li>
                    <li>
                        <a href='auth/about.php' class='nav-link my-3 text-white'>About</a>
                    </li>
                    <li>
                        <a href='auth/contact.php' class='nav-link my-3 text-white'>Contact</a>
                    </li>
                    <li>
                        <a href='auth/donate.php' class='nav-link my-3 text-white'>Donate</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
                            echo '<li><a id="nav-link" class="nav-link scrollto text-white" href="../user/logout.php">Logout</a></li>';
                        }else{
                            echo '<li>
                            <a href="user/login.php" class="nav-link mx-lg-2 py-2 px-3 text-white" id="nav-link">Sign in</a>
                        </li>
                        <li>
                            <button>
                                <a href="user/createAccount.php"
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
                <i class='menuIcon fa fa-bars text-white fa-2x'></i>
                <i class='menuIcon fa fa-times text-white fa-2x hideMenu'></i>
            </div>
        </div>
    </header>

    <!-------------------- Banner  f3613c -------------------->
    <section class='Banner py-5'>
        <div class="container py-5 px-lg-5 my-4 px-3">
            <main class='col-md-12 text-center py-lg-0 py-4'>  
                <h1 class='display-4' style="color: #fff; opacity: 1; font-weight: 700"><span style="color: #f3613c">FUND AND </span> GET FUNDED</h1>
                <p class='text-white' style="font-size: 1.8em">Fund and raise funds from people globally to support your projects, bills, daily needs and other things from FundMeNaija today</p>

                <button class="btn font-weight-bold text-white my-3 py-3 px-5" onclick="window.location.href = './user/login.php'">Get started</button>
            </main>
        </div>
    </section>

    <!--------------------- Section one --------------------->
    <section class='pt-3 pb-5'>
      <div class="container d-flex py-5 px-lg-3 px-4">
        <div class="col-md-5 px-lg-5 d-lg-block d-none">
          <div style="width: 100%; height: 60vh; position: relative">
            <picture>
              <img src="./asserts/img/Donate_img.jpeg" class='img-fluid' style="position: absolute; width: 100%; height: 100%; border-radius: 10px">
            </picture>
            <div class='layer'></div>
          </div>

        </div>
        <div class="col-md-6">
          <h1 class="display-4" style="color: #15242b">Raising money have never been easy.</h1>
          <p class='my-lg-5'>We provide you with opportunity to dream and see it come to pass by helping you get the needed funding on any project, plans or other basic needs.</p>
            <button class="btn font-weight-bold text-white py-3 px-5 mt-lg-0 mt-3" onclick="window.location.href = './user/login.php'">Get started</button>
        </div>
      </div>
    </section>

    <!----------------------- Section Two #f1f5f8; ----------------------->
    <div class="title text-center mb-lg-5 px-4" >
        <h1 class="mx-3 display-6" >Who is eligible ?</h1>
        <p class='text-center'>Check who is eligible to raise or donate fund.</p>
    </div>
    <section class="contentTwo d-flex justify-content-center py-4 mt-5">
        <div class="container px-lg-5">
            <div class="card-container text-center align-items-center">
                <span class='hidden my-2' style="transition: 0.3s !important">
                    <div class="main-card d-lg-flex shadow">
                        <div class="text-container d-flex flex-column justify-content-center py-5 px-5">
                            <h4 class='text-uppercase'>Individuals</h4>
                            <p class='text-capitalize'>Individuals who are in need financially or medically</p>
                        </div>
                    </div>
                </span>
                <span class='hidden my-2' style="transition: 0.4s !important">
                    <div class="main-card d-lg-flex shadow py-lg-2">
                        <div class="text-container d-flex flex-column justify-content-center py-5 px-5">
                            <h4 class='text-uppercase'>Churches</h4>
                            <p class='text-capitalize'>Churches for fund raising and offerings.</p>
                        </div>
                    </div>
                </span>
                <span class='hidden my-2' style="transition: 0.5s !important">
                    <div class="main-card d-lg-flex shadow py-lg-3">
                        <div class="text-container d-flex flex-column justify-content-center py-5 px-5">
                            <h4 class='text-uppercase'>Schools</h4>
                            <p class='text-capitalize'>Schools for fund raising.</p>
                        </div>
                    </div>
                </span>
                <span class='hidden my-2' style="transition: 0.6s !important">
                    <div class="main-card d-lg-flex shadow py-lg-2">
                        <div class="text-container d-flex flex-column justify-content-center py-5 px-5">
                            <h4 class='text-uppercase'>Small scale business</h4>
                            <p class='text-capitalize'>For businesses investment.</p>
                        </div>
                    </div>
                </span>
                <span class='hidden my-2' style="transition: 0.7s !important">
                    <div class="main-card d-lg-flex shadow">
                        <div class="text-container d-flex flex-column justify-content-center py-5 px-5">
                            <h4 class='text-uppercase'>Hospitals</h4>
                            <p class='text-capitalize'>For medical donations like blood, body organ donors and volunteers.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!--------------------- Section three --------------------->
    <section>
        <div class="container my-0">
            <div class="row align-items-baseline">
                <section class="col-md-6 align-items-center p-0">
                    <div class="px-lg-5 px-4 pb-30 mb-1" style="transition: 0.5s">
                        <div class="my-5 hidden" style="transition: 0.3s !important">
                            <div class="d-flex align-items-center">
                                <div style="background: #f3613c; padding: 5px 9px; border-radius: 30px; color: white; font-weight: bold">01</div>
                                    <h5 class="mx-3">About Fundmenaija</h5>
                                </div>
                                <p style="color: #777; margin-top: 0.5em; line-height: 30px">Fundmenaija is global community designed to provide solutions on funding for everyone with a genuine need globally.</p>
                        </div>    
                    </div>
                    <div class="px-lg-5 px-4" style="transition: 0.4s">
                        <div class="mb-lg-5 hidden" style="transition: 0.5s !important">
                            <div class="d-flex align-items-center">
                                <div style="background: #f3613c; padding: 5px 9px; border-radius: 30px; color: white; font-weight: bold">02</div>
                                <h5 class="mx-3">Why you should Choose Fundmenaija</h5>
                            </div>
                            <p style="color: #777; margin-top: 0.5em; line-height: 30px">Fundmenaija is a unique Crowdfunding market place that stands on efficiency, global best practice and transparency</p>
                        </div>
                    </div>
                </section>

                <section class="col-md-6 px-3 py-3" style="transition: 0.5s">
                    <div class="px-lg-5 px-1" style="transition: 0.7s">
                        <div class="my-3 hidden" style="transition: 0.7s !important">
                            <div class="d-flex align-items-center">
                                <div style="background: #f3613c; padding: 5px 9px; border-radius: 30px; color: white; font-weight: bold">03</div>
                                <h5 class="mx-3">How Fundmenaija works</h5>
                            </div>
                            <p style="color: #777; margin-top: 0.5em; line-height: 30px">Everyone is welcomed to Fundmenaija as a fundraiser or a donor, both as individuals and organization, we will server you just by creating a fundraiser wallet and get approved in seconds.</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!--------------------- Section four --------------------->
    <section class="Content-four shadow-sm">
      <div class="container p-lg-5 p-3">
        <h1 class="display-6 font-weight-bold my-4 text-white">How to get started</h1>
        <div class="d-lg-flex text-center text-white">
          
          <div class="card p-4 my-3 h5 shadow">
            <p onclick="window.location.href = './user/login.php'">Sign up and verify your account</p>
            <i class='fa fa-arrow-right text-white fa-1x'></i>
          </div>

          <div class="card p-4 mx-lg-4 my-3 h5 shadow">
            <p onclick="window.location.href = './auth/donate.php'">Donate</p>
            <i class='fa fa-arrow-right text-white fa-1x'></i>
          </div>

          <div class="card p-4 my-3 h5 shadow">
            <p onclick="window.location.href = './auth/donate.php'">Volunteer</p>
            <i class='fa fa-arrow-right text-white fa-1x'></i>
          </div>
          </div>
       </div>
    </section>
    <!--------------------- Ads Showing Here ------------------>
    <section class="content" id="services">
        <div class="container">
            <div class="heading animate-top mx-lg-4"> <!-- class of white for text-white  -->
                <h2>Fund Raisers</h2>
                <p>Donate Fund to your Favourite Raisers</p>
            </div>
            <div class="content">
                <div class="slider owl-carousel shadow-md-sm p-lg-4">
                    <?php foreach($posts as $post): ?>
                    <div class="card shadow-sm" style="min-height: 420px; max-height: 420px; height: 420px; border: 0px; border-radius: 10px">
                        <div class="img">
                            <img src="./user/customer_data/Issue_img/<?php echo $post['avatar']; ?>" alt="issue image">
                        </div>
                        <div class="content" style="position: relative;">
                            <div class="title"><?php echo $post['issue_title']; ?></div>
                            <p><?php echo substr($post['issue_body'], 0, 100); ?>...</p>
                            <div class="btn" style="position: absolute; bottom: -50px;">
                                <a href="./auth/donate.php?issue_id=<?php echo $post['id']; ?>#donation<?php echo $post['id']; ?>" class="btn btn-danger">Donate Fund</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-------------------- STOP Ads Showing Here ---------------->
    
    <!---------------------- Footer template ---------------------->
    <footer  style="background: #1e1e26; display: flex; justify-content: center">
        <div class="container px-4 d-lg-flex justify-content-between align-items-baseline text-white">
            <span>
                <div class="d-flex align-items-center my-lg-0 my-5">
                    <div style="width: 70px; height: 50px; position: relative;">
                        <img src="./assets/img/Logo3.png" alt="Logo" class="img-fluid" style="width: 100%; height: 100%; position: absolute" />
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

    <a href="#" 
        class="back-to-top nav-link rounded-circle d-flex align-items-center justify-content-center h3" 
        title="Back-To-Top"><i class="fa fa-angle-up"></i></a>
    <div id="preloader"></div>

    <script>
        $(".slider").owlCarousel({
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true
        });
    </script>
    <script src="./authjs/ads.js"></script>
    <script src='./authjs/index.js'></script>
    <script src="./assets/js/main.js"></script>
    
  </body>
</html>


<!-- site key: 6Ldm7HcjAAAAAC-k9g6fBmge6H8h8uOSFeEI3POO -->

<!-- secrete key: 6Ldm7HcjAAAAAOpdUyHJjTjol2eN-rod5eoI40ra -->
