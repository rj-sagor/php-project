<?php

session_start();
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
require_once 'cheking.php';

$login_email=$_SESSION['admin_email'];



$get_profile_qurey="SELECT name,number,image FROM users WHERE email='$login_email'"; 
$from_db=mysqli_query($db_connect,$get_profile_qurey);
$after_assoc=mysqli_fetch_assoc($from_db);



?>

 




<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card mt-5">
                    <div class="card-header d-flex justify-content-between text-light bg-dark">
                        <h5 class="card-title">User Information</h5>

                        <a href="profile_edit.php" class="btn btn-sm btn-primary">Edit</a>
                    </div>
                    <div class="card-body">
                        <p> <strong class="card-title me-4"> User Name</strong><?=$after_assoc['name']?></p>
                        <p> <strong class="card-title me-4"> User mobile</strong><?=$after_assoc['number']?></p>
                        <img src="../<?=$after_assoc['image']?>" alt="" height="200" width="180">
                    </div>
                </div>
            </div>
           


              <div class="col-lg-4">
                <div class="card mt-5">
                    <div class="card-header text-light bg-dark ">
                        <h4 class="card-title ">picture Upload</h4>
                    </div>
                    
                  <?php
                    if(isset($_SESSION['success'])){
              
              ?>
           <div class="alert alert-success" role="alert">
            <?php
          
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
          </div>
              <?php
               }
            ?>
            <?php
                    if(isset($_SESSION['fill_err'])){
              
              ?>
           <div class="alert alert-danger" role="alert">
            <?php
          
            echo $_SESSION['fill_err'];
            unset($_SESSION['fill_err']);
            ?>
          </div>
              <?php
               }
            ?>
                   
                 
                    <form action="upload_picture.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                  
                     <div class="mt-4">
                     <input type="file" class="form-control" name="image">
                     </div>
                     
                     <div class="mt-3">
                     <button class="btn btn-primary text-light bg-dark w-100">Upload</button>
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