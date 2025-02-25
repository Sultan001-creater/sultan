<?php
require'../config/function.php';
$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){
    
    $adminId = validate($paraRestultId);

    $admin = getById('admins', $adminId);
    if($admin['status'] == 200)
    {
        $adminDeleteRes = delete('admins', $adminId);
        if($adminDeleteRes)
        {
            alert('success','Admin deleted Successfully');
   header('Location:admins.php');
   die();
           // redirect('admins.php','Admin deleted Successfully');

        }
        else
        {
            alert('danger','Something Went Wrong!');
            header('Location:admins.php');
            die();
           // redirect('admins.php','Something Went Wrong!');

        }
    }else
    {
        alert('info',$admin['message']);
            header('Location:admins.php');
            die();
      //  redirect('admins.php',$admin['message']); 
    }
    //echo $adminId;

}else{
    alert('danger','Something Went Wrong!');
            header('Location:admins.php');
            die();
   // redirect('admins.php','Something Went Wrong!');
}
?>