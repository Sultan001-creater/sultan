<?php
require'../config/function.php';
$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){
    
    $supplierId = validate($paraRestultId);

    $supplier = getById('suppliers', $supplierId);
    if($supplier['status'] == 200)
    {
        $supplierDeleteRes = delete('suppliers', $supplierId);
        if($supplierDeleteRes)
        {
            alert('success','Supplier deleted Successfully');
    header('Location:suppliers.php');
    die();
          //  redirect('suppliers.php','Supplier deleted Successfully');

        }
        else
        {
            alert('danger','Something went wrong!');
    header('Location:suppliers.php');
    die();
         //   redirect('suppliers.php','Something Went Wrong!');

        }
    }else
    {
        alert('info',$supplier['message']);
    header('Location:suppliers.php');
    die();
      //  redirect('suppliers.php',$supplier['message']); 
    }
    //echo $supplierId;

}else{
    alert('danger','Something went wrong!');
    header('Location:suppliers.php');
    die();
   // redirect('suppliers.php','Something Went Wrong!');
}
?>