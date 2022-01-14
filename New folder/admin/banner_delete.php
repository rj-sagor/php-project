<?php
require_once '../db.php';
$id=$_GET['id'];

$insert_image_location="SELECT image_location FROM banners WHERE id=$id";
$image_from_db=mysqli_query($db_connect,$insert_image_location);
$after_assoc_location=mysqli_fetch_assoc($image_from_db);
unlink("../".$after_assoc_location['image_location']);

$delete_image_location="DELETE FROM banners WHERE id=$id";
mysqli_query($db_connect,$delete_image_location);
header('location: banner.php');

?>