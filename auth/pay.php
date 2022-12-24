<?php
    // Headers for the API
    header("Access-Control-Allow-Origin: *");

    // header("Access-Control-Allow-Origin: http://www.fundmenaija.com");

    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    // Headers end here
    
    include_once('../config.php');
    include_once('../inc/conn.php');
    $msg = '';
    $msgClass = '';

    #### Fetching single Issue
    $user_id = mysqli_real_escape_string($conn, htmlspecialchars($_GET['user_id']));
    $issue_id = mysqli_real_escape_string($conn, htmlspecialchars($_GET['issue_id']));

    if(!$issue_id || !$user_id){
        header('location: ./donate.php');
    }
    $_SESSION['user_id'] = $user_id;
    $query_issue = "SELECT * FROM `_issues` WHERE `id`='$issue_id' AND `user_id`='$user_id' LIMIT 1";
    $result = mysqli_query($conn, $query_issue);
  
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $issue = $row;
            // var_dump($issue);
            // echo $issue['issue_title'];
            // return;
        }
    }else{
        header('location: ./donate.php');
    }

// Fetching Customer Email for payment Reciept
    $query_customer = "SELECT `C_Email` FROM `customer_detail` WHERE `C_No`='$user_id' LIMIT 1";
    $email_result = mysqli_query($conn, $query_customer);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($email_result)){
            $customer = $row;
            // echo $customer['C_Email'];
            // return;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="FundMeNaija"
      content="FundMeNaija Web Application"
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
    <!-- Payment Gateway -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/Cheetah-Speed-Technology/core-cdn@1.0.5/cdn.min.js"></script>

    <style>
        form{
            border-radius: 10px;
            color: white; 
        }
        #button{
            min-width: 100%;
            border-radius: 4px!important;
        }
    </style>
  </head>
  <body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <header class='shadow-sm bg-white'>
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
                        <i class='menuIcon fa fa-times text-dark fa-2x hideMenu'></i>
                    </div>
                </div>
            </header>
        </div>
    </header>

    <div class="row mx-3 my-5">
        <div style="margin: 130px auto 20px" class="col-md-6">
            <form id="form" class="form-group px-lg-5 p-4 shadow bg-white">
                <div class='text-center'>
                    <b class='text-dark text-uppercase h4'>Complete Your Donation</b>
                </div>

                <div class="alert alert-success text-center h5 mb-0 mt-3">
                    <?php 
                        if(isset($issue['issue_title']) && isset($issue['user_username'])){
                            echo $issue['issue_title'] ." [" .$issue['user_username']. "]";
                        }else{
                            echo "Please Select a Fund Raiser...!";
                        }
                    ?>
                </div>
                <label for="u_name" class="form-label">Name</label>
                <input 
                    type="text" 
                    id="u_name" class="form-control py-3" 
                    placeholder="Donor's Full Name" 
                    title="Enter Your Full Names"
                    name="donor"
                    required
                >

                <label for="amount" class="form-label">Amount</label>
                <input 
                    type="number" 
                    id="amount" 
                    step="1000" 
                    min="1000" 
                    min-length="1000" 
                    class="form-control py-3" 
                    placeholder="Enter Amount" 
                    title="NOT LESS THAN 1000"
                    name="amount"
                    required
                >
<!-- Fund Raiser's Email -->
                <input type="hidden" id="email" value="<?php echo $customer['C_Email']; ?>">
                <br>
                <select name="p_method" id="p_method" class="form-control" required>
                    <option value="" disabled selected>Select Donations Method</option>
                    <option value="onepass">OnePass</option>
                    <option value="paystack">Paystack</option>
                </select>
                <br>
                <span class="d-flex">
                    <input type="checkbox" name="robot" id="robot" required>
                    <label class='text-dark mx-2' for='robot'>Not a Robot?</label>
                </span>
                <br>
                <br>
                <button id="button" type="submit" 
                    class="btn btn-block text-white" 
                    style="padding: 10px 32px;" name="pay">Proceed with Payment
                </button>
                    <!-- <input id="button" type="button" class="btn btn-block btn-danger text-white font-weight-bold" onclick="runIframe()" style="padding: 10px 32px;" value="Proceed with Payment"> -->
                </form>
        </div>
    </div>

    <div id="preloader"></div>
    <!--------------- Footer template --------------->
    <footer  style="background: #1e1e26; display: flex; justify-content: center">
        <div class="container p-4 d-lg-flex justify-content-between text-white">
            <span class='my-5'>
                <div class="d-flex align-items-center">
                    <div class='bg-danger1' style="width: 70px; height: 50px; position: relative;">
                        <img src="../assets/img/Logo3.png" alt="Logo" class="img-fluid" style="width: 100%; height: 100%; position: absolute" />
                    </div>
                    <div class="h6 text-white">FUNDMENAIJA</div>
                </div>
                <div class="social-icons m-4">
                    <i class='fab fa-facebook fa-1x'></i>
                    <i class='fab fa-instagram fa-1x mx-4'></i>
                    <i class='fab fa-twitter fa-1x'></i>
                </div>
            </span>

            <ul class="list-unstyled my-5 mx-lg-0 mx-3">
                <li class='my-2'>Home</li>
                <li class='my-2'>Contact</li>
                <li class='my-2'>Transfer fund</li>
            </ul>
            <ul class="list-unstyled my-5 mx-lg-0 mx-3">
                <li>Privacy policy</li>
                <li>Help</li>
            </ul>
        </div>
    </footer>
    </section>

    
    <script src="../authjs/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../assets/js/main.js"></script>
    <script src='../authjs/index.js'></script>
        <!-- Payment Gateway -->
    <script type="text/javascript">
        // Validation
        const donor = document.querySelector('#u_name');
        const amount = document.querySelector('#amount');
        const email = document.querySelector('#email');
        const p_method = document.querySelector('#p_method');
        const robot = document.querySelector('#robot');
        const form = document.getElementById("form");

        form.addEventListener("submit", e => {
            e.preventDefault();
            // console.log("Form submited");
            // ### Validation UI
            if(donor.value != '' && amount.value != '' && amount.value >= 1000 && p_method.value != '' && email.value != ''){
                if(p_method.value === 'onepass'){
                    return runIframe();
                    // console.log("ONePass: "+p_method.value)
                }else{
                    return payWithPaystack();
                    // console.log("Paystack: "+p_method.value)
                }
            }else{
                console.log("Please Fill out all fields");
            }
        });


        // $(document).ready(function () {
        //     $("formui").submit(function (e) {
        //         $(".form-group").removeClass("has-error");
        //         $(".help-block").remove();
        //         var formData = {
        //             name: $("#name").val(),
        //             email: $("#email").val(),
        //             superheroAlias: $("#superheroAlias").val(),
        //         };

        //         $.ajax({
        //         type: "POST",
        //         url: "process.php",
        //         data: formData,
        //         dataType: "json",
        //         encode: true,
        //         }).done(function (data) {
        //             console.log(data);
        //             if (!data.success) {
        //                 if (data.errors.name) {
        //                 $("#name-group").addClass("has-error");
        //                 $("#name-group").append(
        //                     '<div class="help-block">' + data.errors.name + "</div>"
        //                 );
        //                 }

        //                 if (data.errors.email) {
        //                 $("#email-group").addClass("has-error");
        //                 $("#email-group").append(
        //                     '<div class="help-block">' + data.errors.email + "</div>"
        //                 );
        //                 }

        //                 if (data.errors.superheroAlias) {
        //                 $("#superhero-group").addClass("has-error");
        //                 $("#superhero-group").append(
        //                     '<div class="help-block">' + data.errors.superheroAlias + "</div>"
        //                 );
        //                 }
        //             } else {
        //                 $("form").html(
        //                 '<div class="alert alert-success">' + data.message + "</div>"
        //                 );
        //             }
        //         })
        //         .fail(function (data) {
        //             $("form").html(
        //             '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
        //             );
        //         });

        //         e.preventDefault();
        //     });
        // });

        // $("#form").submit(function(e) {
        //     e.preventDefault(); 
        //     var form = $(this);
        //     var actionUrl = form.attr('action');
        //     $.ajax({
        //         type: "POST",
        //         url: actionUrl,
        //         data: form.serialize(),
        //         success: function(data)
        //         {
        //             alert(data); 
        //         },
        //         error: function(error){
        //             console.log("Error: "error);
        //         }
        //     });
        // });

        // $(function() {
        //     $('form.my_form').submit(function(event) {
        //         event.preventDefault(); // Prevent the form from submitting via the browser
        //         var form = $(this);
        //         $.ajax({
        //         type: form.attr('method'),
        //         url: form.attr('action'),
        //         data: form.serialize()
        //         }).done(function(data) {
        //         // Optionally alert the user of success here...
        //         }).fail(function(data) {
        //         // Optionally alert the user of an error here...
        //         });
        //     });
        // });

        // ONEPASS GATEWAY
        let runIframe = () => {
            OurpassCheckout.openIframe({
                api_key: "<?php echo API_KEY_PRIVATE_KEY_OURPASS; ?>",
                subAccountAuthKey: 'auth_live_fgegsdgsdgsdgdsgd',
                reference: 'OURPASS_ORDER_73aeefff68430210ae3a8e88ccfe2erbf214171',
                amount: amount.value,
                qty: 1,
                name: 'Donation',
                description: 'Fundmenaija Pass Donation',
                src: 'https://raw.githubusercontent.com/Cheetah-Speed-Technology/website_dstore/master/Cap-front1.png',
                url: 'ourpass.co',
                items: [
                    {
                        itemAmount: amount.value,
                        itemName: 'Donation',
                        itemWeight: 1,
                        itemQuantity: 1,
                        imageUrl: 'https://fundmenaija.com/user/customer_data/Issue_img/<?php echo $issue['avatar']; ?>',
                        itemDescription: 'Fundmenaija Donation By: '+u_name.value,
                    },
                    // {
                    //     itemAmount: 500,
                    //     itemName: 'Free will',
                    //     itemWeight: 1,
                    //     itemQuantity: 1,
                    //     imageUrl: 'https://raw.githubusercontent.com/Cheetah-Speed-Technology/website_dstore/master/Cap-front1.png',
                    //     itemDescription: 'A',
                    //     itemDescription: 'An ananimous donation to cybergate',
                    // },
                ],
                metadata: {
                    name: 'MARIO GOTZE',
                },
                headers: {
                    'apiKey': '{{<?php echo API_KEY_PRIVATE_KEY_OURPASS; ?>}}'
                },
                onSuccess: (res) => {
                    alert('Your Donate is Successful');
                    window.location.href = './success.php';
                },
                onClose: () => {
                    // Handle failed request either for try again with confirm
                    const answer = confirm('Donation Cancelled. Try Again?');
                    if(answer){
                        window.location.href = '#'
                    }else{
                        window.location.href = './donate.php'
                    }
                },
            });                
        }     
    </script>
    <script src="../authjs/pay.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    </body>
</html>