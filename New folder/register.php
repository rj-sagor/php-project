<?php
session_start();


require_once 'db.php';

$name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
$email= filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$number =$_POST['number'];
$password =$_POST['password'];

$after_valided_email=filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);


$all_cap = preg_match('@[A-Z]@',$password);
$all_small= preg_match('@[a-z]@',$password);
$all_num=preg_match('@[0-9]@',$password);
$pattern='/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$all_special_char=preg_match($pattern,$password);


if($_POST['name']== NULL || $_POST['email'] == NULL || $_POST['number'] == NULL || $_POST['password']==NULL ){
    $_SESSION['reg_err']="first fill up this";
    header('location:main.php');
}
else{
    if(strlen($number) ==11 ){
        $cheaching_query= "SELECT COUNT(*) as total_users FROM users WHERE email='$email'";
        $result_from_db=mysqli_query($db_connect,$cheaching_query);
        $after_asoc=mysqli_fetch_assoc($result_from_db);

        if($after_asoc['total_users']==0 ){


            if($after_valided_email){

                if(strlen($password) >=6 && $all_cap==1 && $all_small ==1 && $all_num==1 && $all_special_char==1){

                    $encrypt_pass=md5($password);

                    $insert_query="INSERT INTO users (name,email,number,password) VALUES ('$name','$email','$number','$encrypt_pass')";
            mysqli_query($db_connect,$insert_query);
               $_SESSION['reg_success']=" successfully insert";
         
               header('location:main.php');
                }
                else{
                    $_SESSION['reg_err']=" plz enter 6 digit and 1 cap 1 small 1 number 1 spacial char";
                    header('location:main.php');
                }
                
            }
            else{
                $_SESSION['reg_err']= "this is invalid email";
                header('location:main.php');
            }
        
      
        }
         
    else
    {
        $_SESSION['reg_err']="all ready regiter";
        header('location:main.php');
    }
        
    
}
 else
 {
    $_SESSION['reg_err']= "this is invalid number";
    header('location:main.php');
     }

    }

?>