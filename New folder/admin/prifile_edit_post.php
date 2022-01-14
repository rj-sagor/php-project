<?php
session_start();

require_once '../db.php';

$email=$_POST['email'];
$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$number=$_POST['number'];

if(strlen($number)== 11){
    $update_query="UPDATE users SET name='$name' , number='$number' WHERE email='$email'";
mysqli_query($db_connect,$update_query);
header('location: profile.php');



}
else{
    $_SESSION['invalid']="This nubmer is invalid";
    header('location: profile_edit.php');
}




?>