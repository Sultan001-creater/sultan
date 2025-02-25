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
            alert('success','Category deleted Successfully');
            header('Location:categories.php');
            die();
           // redirect('categories.php','Category deleted Successfully');

        }
        else{
            alert('danger','Something Went Wrong!');
            header('Location:categories.php');
            die();
           // redirect('categories.php','Something went wrong.');
        }
    }
    else
    {
        alert('info',$category['message']);
        header('Location:categories.php');
        die();
        //redirect('categories.php',$category['message']);
    }
    //echo $adminId;
}else{
    alert('info','Something went wrong.');
    header('Location:categories.php');
    die();
    //redirect('categories.php','Something went wrong.');
}
?>