<?php
    session_start();
    require_once '../db.php';

    $login_email = $_SESSION['admin_email'];

    $upload_file_size=$_FILES['image']['size'];
    if($upload_file_size <= 2000000){
        $uplaod_file_name=$_FILES['image']['name'];
       $after_explode=explode('.',$uplaod_file_name);
       $uplaod_file_extantion= end($after_explode);
       $allow_extantion=array('jpg','jpeg','png','JPG','PNG','JPEG');
       
       
      
       if(in_array($uplaod_file_extantion,$allow_extantion)){
      
        //   $insert_query="INSERT INTO banners (sub_title,title_top,title_bottom,detail,image_location)
        //    VALUES ('$sub_title','$title_top','$title_bottom','$detail','primary location')";
           
        //    $from_db=mysqli_query($db_connect,$insert_query);

        //    echo $from_db_id=mysqli_insert_id($db_connect);
            $checking_query = "SELECT COUNT(*) AS total_user FROM users WHERE email='$login_email'";
            $result_from_db=mysqli_query($db_connect,$checking_query);
            $after_assoc_result = mysqli_fetch_assoc($result_from_db);

            if($after_assoc_result['total_user'] == 1){
                $checking_query2 = "SELECT id FROM users WHERE email='$login_email'";
                $result_from_db2=mysqli_query($db_connect,$checking_query2);
                $after_assoc_result2 = mysqli_fetch_assoc($result_from_db2);
                $from_db_id =  $after_assoc_result2['id'];

                $new_name= $from_db_id .'.'. $uplaod_file_extantion;
          
           $upload_file_location='../uploads/profile/'.$new_name;
           move_uploaded_file($_FILES['image']['tmp_name'],$upload_file_location);

           $db_location="uploads/profile/".$new_name;
      
           $update_location_query= "UPDATE users SET image='$db_location' WHERE id=$from_db_id";
      
           mysqli_query($db_connect,$update_location_query);
           $_SESSION['success']="Successfully insert your date";
           header('location: profile.php');

            }
        
      
       }
       else{
           $_SESSION['fill_err']="this file formate is not allowed";
           header('location: profile.php');
       }
    }
    else{
        $_SESSION['fill_err'] ="Please input your photo under 2 mb ?";
        header('location: profile.php');
    }    


?>
