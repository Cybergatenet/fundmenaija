<?php
    // Headers for the API
    header("Access-Control-Allow-Origin: *");
    
    include_once('../config.php');
    include_once('../inc/conn.php');

    // $issue_id = htmlspecialchars(isset($_GET['issue_id'])); // make req to DB

// Fetch All issues from DB
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

// fetch users image from `customer_details` add it to their DP

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
    <title>FundMeNaija | Donate</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Main css -->
    <link  href="../asserts/css/preloader.css" rel="stylesheet">
    <link href="../asserts/css/styles.css" type="text/css" rel="stylesheet">
    <!-- <link href="../auth/asserts/css/donate.css" type="text/css" rel="stylesheet"> -->
    <!-- <link href="../auth/asserts/css/fundraiser.css" type="text/css" rel="stylesheet"> -->

  </head>
  <body>
        <noscript>You need to enable JavaScript to run this app.</noscript>
    <section class='Donation'>
        <header class='shadow-sm'>
            <div class="container d-flex justify-content-between align-items-center py-2 px-lg-5">
                <!--------------------- Logo --------------------->
                <a href='../index.php' class="logo-container nav-link d-flex align-items-center">
                    <div style="width: 70px; height: 50px; position: relative;">
                        <img src="../assets/img/Logo3.png" alt="Logo" class="img-fluid" style="width: 100%; height: 100%; position: absolute" />
                    </div>
                    <div class="logo h6 text-dark">FUNDMENAIJA</div>
                </a>
                <!-- -------------- Desktop screen menu  -------------- -->
                <ul class="list-unstyled desktop">
                    <div class="d-flex align-items-center">
                        <li>
                            <a href='./about.php' class='nav-link text-dark mx-lg-2 py-2 px-3' id='nav-link'>About</a>
                        </li>
                        <li>
                            <a href='./contact.php' class="nav-link text-dark mx-lg-2 py-2 px-3" id='nav-link'>Contact</a>
                        </li>
                        <li>
                            <a href='./donate.php' class="nav-link text-dark mx-lg-2 py-2 px-3" id='nav-link'>Donate</a>
                        </li>
                        <li>
                            <a href='../user/login.php' class="nav-link text-dark mx-lg-2 py-2 px-3" id='nav-link'>Sign in</a>
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

                <!-- -------------- Mobile screen menu  -------------- -->
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
                    <i class='menuIcon fa fa-bars text-dark fa-2x'></i>
                </div>
            </div>
        </header>
    </section>


    <!-- Section  -->
    <div class="container py-3 px-lg-5">
        <!----------- Search bar template  ----------->
        <nav class='shadow bg-white d-flex justify-content-between align-items-center px-4 py-3' style="margin-top: 5em">
            <form class='d-flex align-items-center'>
                <input type="text" class="form-control py-1 px-3" 
                style="border-top-right-radius: 0px, border-bottom-right-radius: 0px
                " placeholder='Search'/>

                <i class="fa fa-search text-white p-2" 
                    style="background: #63baba; border-top-right-radius: 5px; border-bottom-right-radius: 5px
                "></i>
            </form> 
            <b class='light-cyan-color hover'>Sort</b>
        </nav>


        <!----------- Fundraiser template --------- -->

        <?php foreach($posts as $post): ?>
            <section class="Fundraiser p-4 bg-white my-4">
            <div class='d-flex align-items-center mx-lg-4'>
                <div class='fundraiser-img'>  

                    <picture>
                        <img src="../asserts/img/myhome.svg" alt="image" 
                            class="img-fluid mx-lg-0 p-1 border" 
                        />
                    </picture>
                </div>

                <div class="col-md-8 mx-lg-4 mt-lg-0 mt-3">
                    <div class="fundraiser-name col-md-12">
                        <b class='text-capitalize'><?php echo $post['user_username']; ?></b>
                        <p class='address text-capitalize'><?php echo $post['issue_time']; ?></span></p>
                    </div>
                </div>
            </div>
            
            <section class="mx-lg-4">
                <!-- A pop Up ### to do -->
                <button class='py-1 px-5 my-4 hover' style='background: #f3613c;'>
                    <a href="./pay.php?user_id=<?php echo $post['user_id']; ?>&issue_id=<?php echo $post['id']; ?>" class='nav-link text-white' id="1">Donate Fund</a> 
                </button>
                <!-- Fetch Id from DB --->

                <div class="display-6" style="font-weight: 400">
                    <?php echo substr($post['issue_title'], 0, 100); ?>...
                </div>

                <div class='col-md-9'>
                    <p class='write-up my-4 text-truncate1' id='<?php echo $post['id']; ?>'><?php echo $post['issue_body']; ?></p>
                    <p class='hover cursor'><b class="detailsBtn" id='<?php echo $post['id']; ?>'>Read</b></p>
                    <!-- onclick="see_details(<?php echo $post['id']; ?>)" -->
                </div>

                <div class="d-lg-flex">
                    <div class='event-img my-2 hidden' style="transition: 0.5s">
                        <img src="../user/customer_data/issue_img/<?php echo $post['avatar'];?>" alt="issue_image" class='img-fluid'/>
                    </div>

                    <div class='event-img my-2 mx-lg-2 hidden' style="transition: 0.8s">
                        <img src="../user/customer_data/issue_img/<?php echo $post['avatar'];?>" alt="image" class='img-fluid'/>
                    </div>
                </div>
            </section>
        </section>
        <?php endforeach; ?>

        <!------------ End Fundraiser temp ----------->
        
    </div>

    <a href="#" 
        class="back-to-top nav-link rounded-circle d-flex align-items-center justify-content-center h3" 
        title="Back-To-Top"><i class="fa fa-angle-up"></i>
    </a>
           
    
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
                <div class="d-flex social-icons m-4">
                    <a href='#' class='nav-link text-white'>
                        <i class='fab fa-facebook fa-1x'></i>
                    </a>
                    <a href='<?php echo INSTAGRAM; ?>' class='nav-link text-white'>
                        <i class='fab fa-instagram fa-1x mx-4'></i>
                    </a>
                    <a href='#' class='nav-link text-white'>
                        <i class='fab fa-twitter fa-1x'></i>
                    </a>
                </div>
            </span>
            <ul class="list-unstyled my-5 mx-lg-0 mx-3">
                <li class='my-2'>
                    <a href='./index.php' class='nav-link text-white'>Home</a>
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
    
            <ul class="list-unstyled my-5 mx-lg-0 mx-3">
                <li><a href='#' class='nav-link text-white'>Privacy policy</a></li>
                <li><a href='#' class='nav-link text-white'>Help</a></li>
            </ul>
        </div>
    </footer>

    <script src="../assets/js/main.js"></script>
    <script src='../authjs/index.js'></script>
</body>
</html>