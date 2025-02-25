<?php

if(isset($_SESSION['loggedIn']))
{
    $email = validate($_SESSION['loggedInUser']['email']);

    $query = "SELECT * FROM admins WHERE email ='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 0)
    {
        logoutSession();
        alert('danger','Access Denied!');
        header('Location:login.php');
        die();
        //redirect('../login.php','Access Denied!');
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
        if($row['is_ban'] == 1){
            logoutSession();
            alert('danger','Your account has been banned!');
            header('Location:../login.php');
            die();
            redirect('../login.php','Your account has been banned!');
        }
    }
}
else
{
    alert('danger','Login to continue...');
    header('Location:../login.php');
    die();
    redirect('../login.php','Login to continue...');
}
?>