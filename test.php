<?php
session_start();
<<<<<<< HEAD
    // var_dump($_SESSION);

    return var_dump($_SESSION['email']);
=======
    var_dump($_SESSION);
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
?>

<?php 
                    
    if(isset($_SESSION['username']) || isset($_SESSION['AccountNo']) || isset($_SESSION['accountNo'])){
        echo '<li><a class="nav-link scrollto" href="../user/logout.php">Logout</a></li>';
    }else{
        echo '<li><a class="nav-link scrollto" href="../user/login.php">Login</a></li>';
    }

<<<<<<< HEAD
=======
    

>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
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
<<<<<<< HEAD
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tester</title>
</head>
<body>
    
<script src="https://formspree.io/js/formbutton-v1.min.js" defer></script>

<script>
  /* paste this in verbatim */
  window.formbutton=window.formbutton||function(){(formbutton.q=formbutton.q||[]).push(arguments);};

  /* customize formbutton here*/     
  formbutton("create", {
    action: "https://formspree.io/YOUR_FORM_ID",
    title: "How can we help?",
    fields: [
      { 
        type: "email", 
        label: "Email:", 
        name: "email",
        required: true,
        placeholder: "your@email.com"
      },
      {
        type: "textarea",
        label: "Message:",
        name: "message",
        placeholder: "What's on your mind?",
      },
      { type: "submit" }      
    ],
    styles: {
      title: {
        backgroundColor: "gray"
      },
      button: {
        backgroundColor: "gray"
      }
    },
    initiallyVisible: true
  });
</script>
</body>
</html>
=======
?>
>>>>>>> 1c7ec94f87209fec2ea8e0ad6f1a6a7a991a572b
