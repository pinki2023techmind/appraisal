<?php 


    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');


include('invoiceFunction.php');


$requestMethod = 'GET';

    if($requestMethod == "GET")
    {
        $courseList = getcourseList();
        echo $courseList;
    }
    else
    {
        $data = [
            'status' =>405,
            'message' =>$requestMethod. 'Method Not Allowed',
        ];
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode($data);
    }
?>