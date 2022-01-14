<?php
require_once '../db.php';
 $id =$_GET['msg_id'];
 $delete_queray="DELETE FROM geust_massages  WHERE id=$id";
mysqli_query($db_connect,$delete_queray);
header('location: geust_massage_edit.php');

?>