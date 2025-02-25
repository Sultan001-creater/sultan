<?php
require'../config/function.php';
$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){
    
    $customerId = validate($paraRestultId);

    $customer = getById('customers', $customerId);
    if($customer['status'] == 200)
    {
        $customerDeleteRes = delete('customers', $customerId);
        if($customerDeleteRes)
        {
            redirect('customers.php','Admin deleted Successfully');

        }
        else
        {
            redirect('customers.php','Something Went Wrong!');

        }
    }else
    {
        redirect('customers.php',$customer['message']); 
    }
    //echo $adminId;

}else{
    redirect('customers.php','Something Went Wrong!');
}
?>