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
            redirect('positions.php','Position deleted Successfully');

        }
        else{
            redirect('positions.php','Something went wrong.');
        }
    }
    else
    {
        redirect('positions.php',$position['message']);
    }
    //echo $adminId;
}else{
    redirect('positions.php','Something went wrong.');
}
?>