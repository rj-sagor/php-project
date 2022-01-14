<?php
session_start();

require_once '../db.php';

//print_r($_POST);
$id=$_POST['id'];

$sub_title=$_POST['sub_title'];
$title_top=$_POST['title_top'];
$title_bottom=$_POST['title_bottom'];
$detail=$_POST['detail'];

$update_banners_title= "UPDATE banners SET sub_title='$sub_title',title_top='$title_top',
title_bottom='$title_bottom',detail='$detail' WHERE id=$id";
$update_banners_query=mysqli_query($db_connect,$update_banners_title);

$upload_image=$_FILES['banner_image']['name'];




if($upload_image){ 
    $upload_file_size=$_FILES['banner_image']['size'];
if($upload_file_size <= 2000000){
    
    $uplaod_file_name=$_FILES['banner_image']['name'];
   $after_explode=explode('.',$uplaod_file_name);
   $uplaod_file_extantion= end($after_explode);
   $allow_extantion=array('jpg','jpeg','png','JPG','PNG','JPEG');
   
   
  
   if(in_array($uplaod_file_extantion,$allow_extantion)){
  
     $insert_image_location="SELECT image_location FROM banners WHERE id=$id";
     $image_from_db=mysqli_query($db_connect,$insert_image_location);
     $after_assoc_location=mysqli_fetch_assoc($image_from_db);
     unlink("../".$after_assoc_location['image_location']);
  
       
  
        $new_name= $id .'.'. $uplaod_file_extantion;
      
       $upload_file_location='../uploads/banner/'.$new_name;
       move_uploaded_file($_FILES['banner_image']['tmp_name'],$upload_file_location);

       $db_location= "uploads/banner/".$new_name;
  
       $update_location_image_query="UPDATE banners SET image_location='$db_location' WHERE id=$id";
  
       mysqli_query($db_connect,$update_location_image_query);
       $_SESSION['successful']="Your Update data successful ?";
       header('location: banner.php');

     
   }
   else{
       $_SESSION['err_file']="this file formate is not allowed";
       header('location: banner_edit.php');
   }
  
  }
  else{
      $_SESSION['err_file']="Plese inter your photo under 2 mb ?";
      header('location: banner_edit.php');
  }
}
header('location: banner.php');
?>