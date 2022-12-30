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
    // Fetch a single user id and update his DB based on transaction done
    ###$user_id = htmlspecialchars($_GET['user_id']); // make req to DB
    ###$issue_id = htmlspecialchars($_GET['issue_id']); // make req to DB

    if(isset($_POST['pay'])){
        echo "Payment processing...";
        // return;
        // $errors = [];
        // $data = [];


        require_once 'HTTP/Request2.php';
        $request = new HTTP_Request2();
        $request->setUrl('https://user-api2-staging.ourpass.co/v1/api/subaccounts/375/transactions?page=1&limit=10');
        $request->setMethod(HTTP_Request2::METHOD_GET);
        $request->setConfig(array(
        'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        'apiKey' => '{{apiKey}}'
        ));
        $request->setBody('');
        try {
        $response = $request->send();
        if ($response->getStatus() == 200) {
            echo $response->getBody();
        }
        else {
            echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
            $response->getReasonPhrase();
        }
        }
        catch(HTTP_Request2_Exception $e) {
        echo 'Error: ' . $e->getMessage();
        }



















        // if (empty($_POST['name'])) {
        //     $errors['name'] = 'Name is required.';
        // }

        // if (empty($_POST['email'])) {
        //     $errors['email'] = 'Email is required.';
        // }

        // if (empty($_POST['superheroAlias'])) {
        //     $errors['superheroAlias'] = 'Superhero alias is required.';
        // }

        // if (!empty($errors)) {
        //     $data['success'] = false;
        //     $data['errors'] = $errors;
        // } else {
        //     $data['success'] = true;
        //     $data['message'] = 'Success!';
        // }

        // echo json_encode($data);
// ####### ONE ACCOUNT PAYMENT
        // require_once 'HTTP/Request2.php';
        // $request = new HTTP_Request2();
        // $request->setUrl('https://api2.ourpass.co/v1/api/subaccounts/373');
        // $request->setMethod(HTTP_Request2::METHOD_GET);
        // $request->setConfig(array(
        // 'follow_redirects' => TRUE
        // ));
        // $request->setBody('{\n    "subaccountId": 374\n}');
        // try {
        //     $response = $request->send();
        //     if ($response->getStatus() == 200) {
        //         echo $response->getBody();
        //     }
        //     else {
        //         echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        //         $response->getReasonPhrase();
        //     }
        // }
        // catch(HTTP_Request2_Exception $e) {
        //     echo 'Error: ' . $e->getMessage();
        // }
// #### ### ALL ACCOUNT TRANSACTIONS
        require_once 'HTTP/Request2.php';
        $request = new HTTP_Request2();
        $request->setUrl('https://api2.ourpass.co/v1/business/subaccounts/transactions');
        $request->setMethod(HTTP_Request2::METHOD_GET);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
        // 'apiKey' => 'pass_sec_live_46PhAGxwjVslPCKSpelAMxTupNmcBJem'
        'apiKey' => API_KEY_PRIVATE_KEY_OURPASS
        ));
        $request->setBody('');
        try {
        $response = $request->send();
            if ($response->getStatus() == 200) {
                echo $response->getBody();
            }
            else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
            }
        }
        catch(HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


?>