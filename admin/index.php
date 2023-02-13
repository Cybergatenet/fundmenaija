<?php
session_start();
if (!isset($_SESSION['accountNo']) || !isset($_SESSION['username'])) {
    session_destroy();
    header("Location: ../user/login.php");
}else{
    session_destroy();
    header("Location: ../user/logout.php");
}