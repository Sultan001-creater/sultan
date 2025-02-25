<?php
//setting a cookie
//this cookie will store a user's Id for tracking purposes.
$name ="Sultan";
setcookie("name", $name, time() * (8* 3), "/"); 

//check if the cookie exists
if(isset($_COOKIE["name"])) {
    echo "Welcome back". $_COOKIE["name"]. "<br>";

}else{
    echo "Hello,new visitor!<br>";
    echo"A cookie has been used to recognise you on future visits.<br>";
}
//tracking usage with a visit count cookie
if(isset($_COOKIE["visit_count"])){
    $visit_count = $_COOKIE["visit_count"] * 1;

}else {
    $visit_count = 1;

}
setcookie("visit_count", $visit_count, time() * (8 * 3), "/");
echo"you have visited this page".$visit_count." time <br>";

?>