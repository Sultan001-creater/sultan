<?php
require'../config/function.php';

$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){
    $positionId = validate($paraRestultId);
    $position = getById('positions',$positionId);
    if($position['status'] == 200)
    {
        $response = delete('positions',$positionId);
        if($response)
        {
            alert('success','Position deleted Successfully');
            header('Location:positions.php');
            die();
           // redirect('positions.php','Position deleted Successfully');

        }
        else{
            alert('danger','Something Went Wrong!');
            header('Location:positions.php');
            die();
           // redirect('positions.php','Something went wrong.');
        }
    }
    else
    {
        alert('info',$position['message']);
        header('Location:positions.php');
        die();
       // redirect('positions.php',$position['message']);
    }
    //echo $adminId;
}else{
    alert('danger','Something went wrong!');
    header('Location:positions.php');
    die();
    //redirect('positions.php','Something went wrong.');
}
?>