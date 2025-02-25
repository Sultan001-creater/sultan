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
            redirect('suppliers.php','Supplier deleted Successfully');

        }
        else
        {
            redirect('suppliers.php','Something Went Wrong!');

        }
    }else
    {
        redirect('suppliers.php',$supplier['message']); 
    }
    //echo $supplierId;

}else{
    redirect('suppliers.php','Something Went Wrong!');
}
?>