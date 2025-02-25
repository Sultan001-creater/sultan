<?php
require 'config/function.php';

if(isset($_POST['loginBtn']))
{
    $name = validate($_POST['name']);
    $password = validate($_POST['password']);
    if($name != '' && $password != '')
    {
        $query = "SELECT * FROM admins WHERE name='$name' LIMIT 1 ";
        $result = mysqli_query($conn, $query);
        if($result){
           
            if(mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_assoc($result);
                $hashedpassword = $row['password'];

                if(!password_verify($password,$hashedpassword)){
                    redirect('login.php','Incorrect password!');
                }
                
                if($row['is_ban'] == 1){
                    redirect('login.php','Your account has been banned.Please Contact Your Admin!');
                }

                $_SESSION['loggedIn'] = true;
                $_SESSION['loggedInUser'] = [
                    'user_id' => $row['id'],
                    'name' => $row['name'],
                    'national_id' => $row['national_id'],
                    'email' => $row['email'],
                    'phone' => $row[''],

                ];
                redirect('admin/index.php','Logged in Successfully');
            }else{
                redirect('login.php','Invalid Username!');
            }

        }else{
            redirect('login.php','Something went Wrong!');
        }
    }
    else
    {
        redirect('login.php','All fields are Mandatory!');
    }
}
?>