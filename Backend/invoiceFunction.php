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

?>