<?php
require_once '../db.php';
 $id =$_GET['msg_id'];
 $update_query="UPDATE geust_massages SET read_status=2 WHERE id=$id";
mysqli_query($db_connect,$update_query);
header('location: geust_massage_edit.php');

?>