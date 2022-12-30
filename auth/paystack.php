<?php
    session_start();

    include_once('../inc/conn.php');

    
    $ref = mysqli_real_escape_string($conn, htmlspecialchars($_GET['reference']));
    
    if ($ref == '' || !$ref){
        header('location: javascript://history.go(-1)');
    }

    // fetch User account
    $user_id = $_SESSION['user_id'];

    // Fetching Customer Account for payment Reciept
    $query_customer = "SELECT `Account_No` FROM `customer_detail` WHERE `C_No`='$user_id' LIMIT 1";
    $email_result = mysqli_query($conn, $query_customer);
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($email_result)){
            $customer = $row;
            // echo $customer['Account_No'];
            // return;
        }
    }
?>
<?php
    include_once('../config.php');

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".Live_Secret,
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $result = json_decode($response);
  }
  if($result->data->status == 'success'){

    $status = $result->data->status;
    $reference = $result->data->reference;
    $amount = $result->data->amount;
    $last_name = $result->data->customer->last_name;
    $first_name = $result->data->customer->first_name;
    $full_name = $first_name." ".$last_name;
    $email = $result->data->customer->email;

    date_default_timezone_set('Africa/Lagos');

    $date_time = date('m/d/y h:i:s a', time());
    echo "Payment Successful";

    // Insert Data into DB
    // $stmt = $conn->prepare('INSERT INTO `accounts`(`Account_No`, `Balance`, `SavingBalance`, `SavingTarget`, `AccountType`, `State`) VALUES (?,?,?,?)'); // insert data

    ### Fetch previou data and update instead
    // fetch OLd balance and add the new deposit to it

    $stmt = $conn->prepare('UPDATE `accounts` SET `Balance`=?'); // Update data
    $stmt->bind_param('s', $customer['Account_No']);
    $stmt->execute();

    if($stmt){
        // success
        header('location: ./auth/success.php?status=success');
        exit;
    }else{
        // Fail
        echo "Error: ". mysqli_error($conn);
        exit;
        die("Payment could not be Saved. Reciept Failed");
    }
    $stmt->close();
    $conn->close();


  }else{
    echo "Sorry, An Error Occurred with your payment";
    header('location: ./auth/error.php');
  }
?>