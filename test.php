<?php
session_start();
    var_dump($_SESSION);
?>

<?php 
                    
    if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
        echo '<li><a class="nav-link scrollto" href="../user/logout.php">Logout</a></li>';
    }else{
        echo '<li><a class="nav-link scrollto" href="../user/login.php">Login</a></li>';
    }

    

?>

<?php 
    if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
        echo '<li><a id="nav-link" class="nav-link scrollto text-white" href="../user/logout.php">Logout</a></li>';
    }else{
        echo '<li>
        <a href="../user/login.php" class="nav-link mx-lg-2 py-2 px-3" id="nav-link">Sign in</a>
    </li>
    <li>
        <button>
            <a href="../user/createAccount.php"
                class="nav-link font-weight-bold text-white px-4">Sign up
            </a>
        </button>
    </li>';
    }
?>