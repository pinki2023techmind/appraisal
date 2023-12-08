<?php 


    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');
    header("Access-Control-Allow-Credentials", true);
    include('db.php');
 
    require "vendor/autoload.php";
    
    use \Firebase\JWT\JWT; 
    use \Firebase\JWT\Key;

    function error422($message){
        $data = [
            'status' =>422,
            'message' =>$message,
        ];
        header("HTTP/1.0 422 Unprocessable Entry");
        echo json_encode($data);
        exit();
    }

   
   

      //fetch  user data with id 

  function getInvoiceUser($params)
  {
      global $conn;

          if(!isset($params['id'])){
              return error422("product id not found");
          }
          elseif($params['id'] == null ){
              return error422("Enter the product id");
          }
              $id = mysqli_real_escape_string($conn, $params['id']);
            
              $insertQuery = "SELECT * FROM userinfo where id = '$id'";
            
              $query_run = mysqli_query($conn, $insertQuery);
        
      if($query_run)
      {
          
          if(mysqli_num_rows($query_run) > 0)
          {

              $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

              $data = [
                  'status' =>200,
                  'message' =>'User list fetch successfully',
                  'data' =>$res
              ];
              header("HTTP/1.0 200 Ok");
              return json_encode($data);
      

          }else
          {
              $data = [
                  'status' =>404,
                  'message' =>'No User Find',
              ];
              header("HTTP/1.0 404 No User Find");
              return json_encode($data);
          }
      }

      else
      {
          $data = [
              'status' =>500,
              'message' =>'Internal server error',
          ];
          header("HTTP/1.0 500 Internal server error");
          return json_encode($data);

      }
      
    
  }

        //fetch  user data with id 

        function getcourseList()
        {
            global $conn;
                  
                    $insertQuery = "SELECT * FROM course_details";
                  
                    $query_run = mysqli_query($conn, $insertQuery);
              
            if($query_run)
            {
                
                if(mysqli_num_rows($query_run) > 0)
                {
      
                    $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
      
                    $data = [
                        'status' =>200,
                        'message' =>'User list fetch successfully',
                        'data' =>$res
                    ];
                    header("HTTP/1.0 200 Ok");
                    return json_encode($data);
            
      
                }else
                {
                    $data = [
                        'status' =>404,
                        'message' =>'No User Find',
                    ];
                    header("HTTP/1.0 404 No User Find");
                    return json_encode($data);
                }
            }
      
            else
            {
                $data = [
                    'status' =>500,
                    'message' =>'Internal server error',
                ];
                header("HTTP/1.0 500 Internal server error");
                return json_encode($data);
      
            }
            
          
        }


        //add invoice data

        function storeInvoice($userInput)
    {
      global $conn;
           
              $userId = mysqli_real_escape_string($conn, $userInput['username_id']);
              $courseId = mysqli_real_escape_string($conn, ($userInput['course_id']));
              $courseCost = mysqli_real_escape_string($conn, $userInput['course_cost']);
           
          
              if(empty(trim($userId))){
                  return error422('Enter your  Title');
              }
              if(empty(trim($courseId))){
                  return error422('Enter the date');
              }
              if(empty(trim($courseCost))){
                  return error422('Enter your  Description');
              }

      else
      {
          
          $insertQuery = "INSERT INTO invoice_details(username_id, course_id, course_cost) 
          Values('$userId', '$courseId', '$courseCost')";
      
          $result = mysqli_query($conn, $insertQuery);
         
          if($result)
          {
              $data = [

                  'status' =>201,
                  'message' =>' inserted successfully',
              ];
              header("HTTP/1.0 201 Created");
              return json_encode($data);
          }
          else
          {
              $data = [
                  'status' =>500,
                  'message' =>'internal server error',
              ];
              header("HTTP/1.0 500 internal server error");
              return json_encode($data);
          }

        }
    }



    //invouce course
    function getInvoiceCourse($params)
    {
        global $conn;

        if(!isset($params['id'])){
            return error422("product id not found");
        }
        elseif($params['id'] == null ){
            return error422("Enter the product id");
        }
            $id = mysqli_real_escape_string($conn, $params['id']);
              
                $insertQuery = "SELECT * FROM invoice_details,  userinfo WHERE 
                invoice_details.username_id= '$id' && userinfo.id = '$id'";
              
                $query_run = mysqli_query($conn, $insertQuery);
          
        if($query_run)
        {
            
            if(mysqli_num_rows($query_run) > 0)
            {
  
                $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
  
                $data = [
                    'status' =>200,
                    'message' =>'User list fetch successfully',
                    'data' =>$res
                ];
                header("HTTP/1.0 200 Ok");
                return json_encode($data);
        
  
            }else
            {
                $data = [
                    'status' =>404,
                    'message' =>'No User Find',
                ];
                header("HTTP/1.0 404 No User Find");
                return json_encode($data);
            }
        }
  
        else
        {
            $data = [
                'status' =>500,
                'message' =>'Internal server error',
            ];
            header("HTTP/1.0 500 Internal server error");
            return json_encode($data);
  
        }
        
      
    }


?>