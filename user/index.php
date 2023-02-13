<?php
    session_start();

    if($_SESSION){
        session_destroy();
		unset($_SESSION['otp']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['verified']);

		
		header("location: ./login.php");
	}else{
        header("location: ../index.php");
	}
    header("Location: https://fundmenaija.com");
?>