<?php
session_start();
require_once '../db.php';
//print_r($_POST);


$guest_name=$_POST['guest_name'];
$guest_email=$_POST['guest_email'];
$guest_subject=$_POST['guest_subject'];
$guest_massage=$_POST['guest_massage'];



$flag= true;

if(!$guest_name){

    $_SESSION['guest_name_err']="All filed fill up first";
    $flag=false;
}
if(!$guest_email){

    $_SESSION['guest_email_err']="All filed fill up first";
    $flag=false;
}
if(!$guest_subject){

    $_SESSION['guest_subject_err']="All filed fill up first";
    $flag=false;
}
if(!$guest_massage){

    $_SESSION['guest_msg_err']="All filed fill up first";
    $flag=false;
}
if($flag){
   $guest_insert_query= "INSERT INTO geust_massages (guest_name,guest_email,guest_subject,guest_massage) VALUES 
   ('$guest_name','$guest_email','$guest_subject','$guest_massage')";
   mysqli_query($db_connect,$guest_insert_query);

   $_SESSION['guest_msg_succes']=" <h4> your massage recievd ! we will call you asap?</h4>";
   header('location: ../index.php');
}
else{
    header('location: ../index.php');
}






?>