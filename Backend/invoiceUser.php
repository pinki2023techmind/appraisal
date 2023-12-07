<?php 


    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header('Content-Type:application/json');
    header('Access-Control-Allow-Method:*');
    header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-request-With');


        require_once('invoiceFunction.php');

            $inputData = json_decode(file_get_contents("php://input"), true);
            // echo $inputData['first_name'];

            if(empty($inputData))
            {
                $getUser = getInvoiceUser($_GET);
            }
            else
            {
                $getUser = getInvoiceUser($_GET);
                
            }
            echo $getUser;
 
?>