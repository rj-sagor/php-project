<?php
session_start();
require_once 'navbar.php';
require_once '../inc/header.php';

require_once '../db.php';
$id=$_GET['id'];

$get_banner_query="SELECT * FROM banners WHERE id=$id";
$from_db=mysqli_query($db_connect,$get_banner_query);
$after_assoc=mysqli_fetch_assoc($from_db);

?>



<section>
<div class="container">

<div class="row">

<div class="col-lg-6 m-auto">
<div class="card mt-4">
    <div class="card-header text-light bg-dark">
        <h5 class="card-title">Banner </h5>
    </div>
    <div class="card-body">
    <?php 
            if(isset($_SESSION['err_file'])){
              
              ?>
           <div class="alert alert-danger" role="alert">
            <?php
          
            echo $_SESSION['err_file'];
            unset($_SESSION['err_file']);
            ?>
          </div>
              <?php
               }
            ?>

<?php 
            if(isset($_SESSION['successful'])){
              
              ?>
           <div class="alert alert-success" role="alert">
            <?php
          
            echo $_SESSION['successful'];
            unset($_SESSION['successful']);
            ?>
          </div>
              <?php
               }
            ?>
        
           <form action="banner_post_edit.php" method="post" enctype="multipart/form-data">

           <div class="mt-4">
               <input type="hidden" name="id" value="<?=$after_assoc['id']?>">
               <input type="text" class="form-control" name="sub_title" value="<?=$after_assoc['sub_title']?>">
           </div>
           <div class="mt-4">
               <input type="text" class="form-control" name="title_top"   value="<?=$after_assoc['title_top']?>">
           </div>
           <div class="mt-4">
               <input type="text" class="form-control" name="title_bottom"  value="<?=$after_assoc['title_bottom']?>">
           </div>
           <div class="mt-4">
               <input type="text" class="form-control" name="detail"  value="<?=$after_assoc['detail']?>">
           </div>
           <div class="mt-4">
              <img src="../<?=$after_assoc['image_location']?>" alt="" width="100">
           </div>
           <div class="mt-4">
               <input type="file" class="form-control" name="banner_image">
           </div>
           
           
           
               <div class="mt-3">
               <button class="btn btn-primary text-light bg-dark w-100">add</button>
               </div>
               
           
           </form>
    </div>
</div>
</div>
 
</div>
</div>

</section>




<?php

require_once '../inc/fotter.php';
?>