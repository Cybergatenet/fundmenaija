<?php
    // session_start();

    require('./conn.php');

    // if($_SESSION){
	// 	session_destroy();
	// 	unset($_SESSION['id']);
	// 	unset($_SESSION['username']);
	// 	unset($_SESSION['email']);
	// 	unset($_SESSION['verified']);
	// 	unset($_SESSION['msg']);
	// 	unset($_SESSION['alert-class']);
		
	// 	header("location: ../login_signup/login.php");
	// }else{
	// 	header("location: ../index.php");
	// }

    $user_id = "1";
    $user_username = "cybergate";
    $avatar = 'user.jpg'; // sanitize pics before uplaod
    $post_title = 'School Fees';
    $post_body = 'We believe in building the life we deserve through innovation and creativity. This is a welcome message to all our users who wish to raise fund for their business or academics. Thank you for signing in the our site. We promise to bring you amazing features that will improve and grace your life. Stay tune for much more. Or visit our about us page for more information.';
    // $date = date('Y/m/d H:i:s');
    $date = date('g:i a');
    $post_time = $date;

    $sql = "INSERT INTO `_issues` (`user_id`, `user_username`, `avatar`, `post_title`, `post_body`, `post_time`) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssss', $user_id, $user_username, $avatar, $post_title, $post_body, $post_time);

    if($stmt->execute()){
        echo "Issue data Inserted successfully";
    }else{
        echo "NOT successful".'<br>'.mysqli_error($conn);
    }

?>