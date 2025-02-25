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
            alert('success','Admin deleted Successfully');
        header('Location:customers.php');
        die();
           // redirect('customers.php','Admin deleted Successfully');

        }
        else
        {
            alert('danger','Something Went Wrong!');
        header('Location:customers.php');
        die();
            redirect('customers.php','Something Went Wrong!');

        }
    }else
    {
        alert('info',$customer['message']);
        header('Location:customers.php');
        die();
       // redirect('customers.php',$customer['message']); 
    }
    //echo $adminId;

}else{
    alert('danger','Something Went Wrong!');
    header('Location:customers.php');
    die();
    redirect('customers.php','Something Went Wrong!');
}
?>