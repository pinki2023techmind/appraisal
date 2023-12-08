<?php 

    // header('Access-Control-Allow-Origin:*');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header('Content-Type:application/json');
    header('Access-Control-Allow-Method:*');
    header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-request-With');


        require_once('invoiceFunction.php');

            $inputData = json_decode(file_get_contents("php://input"), true);
          

            if(empty($inputData))
            {
                $storeInvoice = storeInvoice($_POST);
            }
            else
            {
                $storeInvoice = storeInvoice($inputData);
                
            }
           echo $storeInvoice;

?>