<?php
require '../config/function.php';
$paramResult = checkParamId('index');
if(is_numeric($paramResult)){
 $indexValue = validate($paramResult);
 if(isset($_SESSION['productItems']) && isset($_SESSION['productItemIds'])){
    
    unset($_SESSION['productItems'][$indexValue]);
    unset($_SESSION['productItemIds'][$indexValue]);

    alert('danger','Item Removed From Cart');
    header('Location:orders-create.php');
    die();
    //redirect('orders-create.php',' Item Removed From Cart');
 }else{
   alert('danger','There is no Item');
   header('Location:orders-create.php');
   die();
   // redirect('orders-create.php','There is no Item');
 }
}else{
   alert('danger','Param Not numeric');
   header('Location:orders-create.php');
   die();
    //redirect('orders-create.php','Param Not numeric');
}
?>