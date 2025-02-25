<?php
 require 'config/function.php';
 if(isset($_SESSION['loggedIn'])){
    logoutSession();
    alert('success','logged out succesfully');
    header('Location:login.php');
    die();
    redirect('login.php','logged out succesfully!');
 }
?>