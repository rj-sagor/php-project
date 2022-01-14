<?php
require_once '../db.php';
 $id =$_GET['id'];
 $update_banner="UPDATE banners SET active_status=0 WHERE id=$id";
mysqli_query($db_connect,$update_banner);
header('location: banner.php');

?>