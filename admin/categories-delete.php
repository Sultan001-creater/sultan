<?php
require'../config/function.php';

$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){
    $categoryId = validate($paraRestultId);
    $category = getById('category',$categoryId);
    if($category['status'] == 200)
    {
        $response = delete('category',$categoryId);
        if($response)
        {
            redirect('categories.php','Category deleted Successfully');

        }
        else{
            redirect('categories.php','Something went wrong.');
        }
    }
    else
    {
        redirect('categories.php',$category['message']);
    }
    //echo $adminId;
}else{
    redirect('categories.php','Something went wrong.');
}
?>