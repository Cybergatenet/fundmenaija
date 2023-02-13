<?php

    echo '<script>alert("Payment is Successful");</script>';

    echo "<center><h5 class='mt-3'>Go Back To Home Page <a href='https://fundmenaija.com'>  Click Here</a></h5></center>";

    // Design a Printable reciept

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FundMeNaija | Reciept</title>
    <link href="../assets/img/favicon-32x32.png" rel="icon">
    <link href="../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<style>
    a:hover{
        text-decoration: none;
        color: green;
    }
</style>
<body>
    <section class="container shadow-sm py-3">
        <div class="bg-danger py-2 head text-center px-5" style="font-size: 1.5em; font-weight: 500;">
            <p class="text-light ">This receipt is for this transaction. Your deposit was successful.</p>
        </div>
        <div class="fund text-light text-center py-5" style="background:  rgb(4, 4, 63); font-size: 1.8em; font-weight: 600;">
            <p>FundMeNaija received your payment <p>of</p></p>
            <p class="price" style="font-size:2em; font-weight: bolder;">NGN 5,000.00</p>
        </div>
        <div class="text-center py-4">
            <h5>Transaction details</h5>
        </div>
        <main >
            <div class=" px-5">
                <span class="d-flex justify-content-between">
                    <p>Reference</p>
                    <p>FMN381602455</p>
                </span>
                <div class="border"></div>
            </div>
            <div class=" px-5">
                <span class="d-flex justify-content-between">
                    <p>Date</p>
                    <p>28th Dec, 2022</p>
                </span>
                <div class="border"></div>
            </div>
            <div class="d-flex justify-content-between px-5 pb-5">
                <p>Card</p>
                <p>vi Ending with 4081</p>
            </div>
        </main>
        <div class="text-center pb-5">
            <h4>FundMeNaija</h4>
            <a href="">contact@fundmenaija.com</a>
        </div>
    </section>
    <!-- Contact us Bot Chat -->
    <?php include_once('../inc/support.php'); ?>
    <footer class="py-5">
        <div class=" text-center">
            <p class="m-0">&copy; Paystack Inc 2022</p>
            <p>Modern Payments for Africa</p>    
        </div>
        <center>
            <button class="btn btn-primary" type="button" onclick='print();'>Print Reciept</button>
        </center>
    </footer>

    <script>
        const print = () => {window.print()};
    </script>
</body>
</html>