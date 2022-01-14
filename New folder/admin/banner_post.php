<?php
session_start();
require_once '../db.php';
$upload_file_size=$_FILES['banner_image']['size'];

$sub_title=$_POST['sub_title'];
$title_top=$_POST['title_top'];
$title_bottom=$_POST['title_bottom'];
$detail=$_POST['detail'];
if($sub_title== NULL || $title_top==NULL || $title_bottom==NULL || $detail==NULL){
    $_SESSION['fill_err']="all filed fill up first ?";
    header('location: banner.php');
}
else{
    if($upload_file_size <= 2000000){
        $uplaod_file_name=$_FILES['banner_image']['name'];
       $after_explode=explode('.',$uplaod_file_name);
       $uplaod_file_extantion= end($after_explode);
       $allow_extantion=array('jpg','jpeg','png','JPG','PNG','JPEG');
       
       
      
       if(in_array($uplaod_file_extantion,$allow_extantion)){
      
          $insert_query="INSERT INTO banners (sub_title,title_top,title_bottom,detail,image_location)
           VALUES ('$sub_title','$title_top','$title_bottom','$detail','primary location')";
           $from_db=mysqli_query($db_connect,$insert_query);
           $from_db_id=mysqli_insert_id($db_connect);
      
      
           
      
            $new_name= $from_db_id .'.'. $uplaod_file_extantion;
          
           $upload_file_location='../uploads/banner/'.$new_name;
           move_uploaded_file($_FILES['banner_image']['tmp_name'],$upload_file_location);
           $db_location="uploads/banner/".$new_name;
      
           $update_location_query= "UPDATE banners SET image_location='$db_location' WHERE id=$from_db_id";
      
           mysqli_query($db_connect,$update_location_query);
           $_SESSION['success']="Successfully insert your date";
           header('location: banner.php');
      
       }
       else{
           $_SESSION['fill_err']="this file formate is not allowed";
           header('location: banner.php');
       }
      
      }
      else{
         $_SESSION['fill_err'] ="Please input your photo under 2 mb ?";
         header('location: banner.php');
      }

}


?>