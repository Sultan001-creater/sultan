<?php
require '../config/function.php';
$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){

 $productId = validate($paraRestultId);
 $product = getById('products',$productId);
 if($product['status'] == 200)
 {
    
    $response = delete('products', $productId);
    if($response)
    {

    $deleteImage = "../".$product['data']['image'];
    if(file_exists($deleteImage)){
      unlink($deleteImage);
    }
    alert('success','Product Deleted Successfully');
    header('Location:products.php');
    die();
   // redirect('products.php','Product Deleted Successfully');
 }else{
   alert('danger','Something went wrong!');
    header('Location:products.php');
    die();
   // redirect('products.php','Something Went Wrong!');
 }
}else{
   alert('info',$product['message']);
    header('Location:products.php');
    die();
   // redirect('products.php',$product['message']);
}
}else
{
   alert('danger','Something went wrong!');
    header('Location:products.php');
    die();
   //redirect('products.php','Something Went Wrong!');
}
?>