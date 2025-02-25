<?php
 SESSION_start();

  require'dbcon.php';
    //input field validation
 function validate($inputData){
   
    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
 }
 //redirect from 1 page to another page with the message (status)
 function redirect($url, $status){
    $_SESSION['status'] = $status;
    header('location:'.$url);
    exit(0);
 }

 //Display messages after any process
 function alertmessage(){
    if(isset($_SESSION['status'])){
        echo '<div class = "alert alert-warning alert-dismissible fade show" role = "alert">
        <h6>'.$_SESSION['status'].'</h6>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

       
        

    }
 }


 //insert record using this function
 function insert($tableName, $data)
 {
    global $conn;

    $table = validate($tableName);

    $columns =array_keys($data);
    $values =array_values($data);

    $finalColumn = implode(',', $columns);
    $finalValues = "'".implode("', '", $values)."'";

    $query = "INSERT INTO $table($finalColumn) VALUES ($finalValues)";
    $result = mysqli_query($conn,$query);
    return $result;


 }

 //update data using this function
 function update($tableName, $id, $data)
    {
        global $conn;

        $table = validate($tableName);
        $id = validate($id);

        $updateDataString ="";

        foreach($data as $column => $value){

            $updateDataString .= $column.'='."'$value',";
        }

            $finalUpdateData = substr(trim($updateDataString),0,-1);

            $query = "UPDATE $table SET $finalUpdateData WHERE id='$id'";
            $result = mysqli_query($conn,$query);
            return $result;

    }
 
    function getAll($tableName, $status = NULL){
        
        global $conn;

        $table = validate($tableName);
        $status = validate($status);

        if($status == 'status')
        {
           $query = "SELECT * FROM $table WHERE status ='0'";
        }
        else
        {
           $query = "SELECT * FROM $table";
        }
         return mysqli_query($conn, $query);
    
    }
    function getById($tableName, $id){
        global $conn;

        $table = validate($tableName);
        $id = validate($id);

        $query = "SELECT * FROM $table WHERE id ='$id' LIMIT 1";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $row = mysqli_fetch_assoc($result);
                $responce =[
                    'status' => 200,
                    'data' => $row,
                    'message' =>'Record Found'
                ];
                return $responce;

            }
            else
            {
                $responce =[
                    'status' => 404,
                    'message' =>'No Data Found'
                ];
                return $responce;
            }
        }
        else
        {
            $responce =[
                'status' => 500,
                'message' =>'Something went Wrong'
            ];
            return $responce;
        }
    }
    //Delete data from database using id
    function delete($tableName, $id){
        global $conn;

        $table = validate($tableName);
        $id = validate($id);

        $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
        $result = mysqli_query($conn, $query);
        return $result;


    }
    function checkParamId($type){
        if(isset($_GET[$type])){
            if($_GET[$type] !=''){
                return $_GET[$type];

            }else{
                return'<h5>No Id Found</h5>';
            }

        }else{
            return'<h5>No Id Given</h5>';
        }
    }
    function logoutSession(){
        unset($_SESSION['loggedIn']);
        unset($_SESSION['loggedInUser']);
    }

    function jsonResponse($status, $status_type, $message){
        $response = [
            'status' => $status,
            'status_type' => $status_type,
            'message' => $message
        ];
        echo json_encode($response);
        return;
    }
    //get Count to display on dashboard.
    function getCount($tableName)
    {
        global $conn;

        $table = validate($tableName);
        $query = "SELECT * FROM $table";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
            $totalCount = mysqli_num_rows($query_run);
            return $totalCount;

        }else{
            return 'Something went wrong!';
        }
    }

?>