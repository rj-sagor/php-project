<?php

session_start();
//print_r($_POST);
require_once '../db.php';

$user_email=$_POST['email'];

$old_pass=$_POST['Old_pass'];
$new_pass=$_POST['New_pass'];
$confim_pass=$_POST['Confirm_pass'];

if($new_pass==$confim_pass){
$encrypt_pass= md5($old_pass);

echo "pass change kora jabe";

$checking_old_query="SELECT COUNT(*) AS total_user FROM users WHERE email='$user_email' 
AND password='$encrypt_pass'";

$After_db=mysqli_query($db_connect,$checking_old_query);
$after_assoc=mysqli_fetch_assoc($After_db);



if($after_assoc['total_user']==1){

  $encrypt_pas=md5($new_pass);
  $update_query="UPDATE users SET password='$encrypt_pass' WHERE email='$user_email'";
  mysqli_query($db_connect,$update_query);
  $_SESSION['success']="Password change successefully";
  header('location: change_password.php');
}
else{
    $_SESSION['pass_err'] ="Old password did not macth";
    header('location: change_password.php');

}

    
}
else{
    $_SESSION['pass_err'] ="new pass or confirm password did not mach";
    header('location: change_password.php');
}




?>