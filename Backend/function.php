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

   
    //Login 

    function login($inputData){

        
        global $conn;
                $email = mysqli_real_escape_string($conn, $inputData['email']);
                $password = mysqli_real_escape_string($conn, md5($inputData['password']));
                // echo $password;

        $query = " SELECT * FROM userinfo where email = '$email' ";
        
        $query_run = mysqli_query($conn, $query);
   
        if($query_run)
        {
            
            if(mysqli_num_rows($query_run) > 0)
            {
                
                $res = mysqli_fetch_array($query_run, MYSQLI_ASSOC); 
          
                $key = 'example_key';
                $payload = array(
                    'id'=>$res['id'],
                    'username'=>$res['username'],
                    'email'=>$res['email'],
                    'password'=>$res['password']
                );
               

                if($password == $res['password']){
                    $jwt = JWT::encode($payload, $key,'HS256');
                    $arr['email'] = $res['email'];
                    $arr['password'] = $res['password'];
                    $arr['jwt'] = $jwt;

                          $data = [
                    'status' =>200,
                    'message' =>'User list fetch successfully',
                    'data' =>$arr
                ];
                    }
                    else{
                        $data = [
                            'status' =>400,
                            'message' =>'User not found',
                            'data' =>$verify
                        ];
                    }
              
                header("HTTP/1.0 200 Ok");
                echo json_encode($data);
                
        

            }else
            {
                echo '<script>alert("No User Found")</script>';
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

    
  // add pending approvals

  function addPendingApprovals($userInput)
  {
      global $conn;
           
              $pTitle = mysqli_real_escape_string($conn, $userInput['pTitle']);
              $pDate = mysqli_real_escape_string($conn, ($userInput['pDate']));
              $pDesc = mysqli_real_escape_string($conn, $userInput['pDesc']);

          
              if(empty(trim($pTitle))){
                  return error422('Enter your  Title');
              }
              if(empty(trim($pDate))){
                  return error422('Enter the date');
              }
              if(empty(trim($pDesc))){
                  return error422('Enter your  Description');
              }

      else
      {
         
          
          $insertQuery = "INSERT INTO pending_approvals(pending_title, pending_dec, pending_date) 
          Values('$pTitle', '$pDesc', '$pDate')";
         
      
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


  //update

  function updateData($userInput, $params)
  {
      global $conn;
      // if(isset($_FILES['pimg']["name"])){
          if(!isset($params['id'])){
              return error422("product id not found");
          }
          elseif($params['id'] == null ){
              return error422("Enter the id");
          }
              $id = mysqli_real_escape_string($conn, $params['id']);
              $pTitle = mysqli_real_escape_string($conn, $userInput['pending_title']);
              $pDate = mysqli_real_escape_string($conn, $userInput['pending_date']);
              $pDec = mysqli_real_escape_string($conn, $userInput['pending_dec']);
             
              if(empty(trim($id))){
                  return error422('Enter your  id');
              }
              if(empty(trim($pTitle))){
                  return error422('Enter your  title');
              }
              if(empty(trim($pDate))){
                  return error422('Enter your  Description');
              }

      else
      {         
        $insertQuery = "UPDATE pending_approvals SET pending_date ='$pDate',
           pending_title ='$pTitle', pending_dec ='$pDec' WHERE id ='$id' ";
          
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
  

  //fetch with id 

  function getPending($params)
    {
        global $conn;

            if(!isset($params['id'])){
                return error422("product id not found");
            }
            elseif($params['id'] == null ){
                return error422("Enter the product id");
            }
                $id = mysqli_real_escape_string($conn, $params['id']);
              
                $insertQuery = "SELECT * FROM pending_approvals where id = '$id'";
              
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



    // fetch all data of pending table

    function getPendingList(){

        global $conn;
        
        try {
            $key = 'example_key';
            $headers=getallheaders();
            $authcode=trim($headers['Authorization']);
            $token=substr($authcode,7);
            $decoded = JWT::decode($token, new Key($key,'HS256'));
         
            $query = "SELECT * FROM pending_approvals";
        
            $query_run = mysqli_query($conn, $query);
            
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
          
          //catch exception
          catch(Exception $e) {
            
            echo 'Message: ' .$e->getMessage();

          }
   
    }


     //delete

     function getdeletePending($id){

        global $conn;
        
        if(!isset($id['id'])){
            return error422('product id not found in url');
        }
        elseif($id['id'] == null){
            return error422('Enter the product id');
        }

        $pID = mysqli_real_escape_string($conn, $id['id']);

        $query = "DELETE FROM pending_approvals Where id = '$pID' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if($result){
            $data = [
                'status' =>200,
                'message' =>'Product deleted Successfully',
            ];
            header("HTTP/1.0 200 Deleted");
            return json_encode($data);
        }
        else{
            $data = [
                'status' =>404,
                'message' =>'Product Not Found',
            ];
            header("HTTP/1.0 404 Product Not Found");
            return json_encode($data);
        }

    }

?>