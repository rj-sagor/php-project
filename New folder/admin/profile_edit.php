
<?php 
session_start();

require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
require_once 'cheking.php';

$login_email=$_SESSION['admin_email'];



$get_profile_qurey="SELECT name,number FROM users WHERE email='$login_email'"; 
$from_db=mysqli_query($db_connect,$get_profile_qurey);
$after_assoc=mysqli_fetch_assoc($from_db);



// if(isset($_SESSION['user_status'])){
//   header('location: admin/dashboard.php');
// }
?>



  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto">
        <div class="card mt-4">
          <div class="card-header d-flex justify-content-between text-light bg-dark">
            <h4>Profile update</h4>
           
          </div>
          <div class="card-body"> 
              <?php 
            if(isset($_SESSION['invalid'])){
              
              ?>
           <div class="alert alert-danger" role="alert">
            <?php
          
            echo $_SESSION['invalid'];
            unset($_SESSION['invalid']);
            ?>
          </div>
              <?php


            }
            ?>
             
           
          
       
            <form action="prifile_edit_post.php" method="post" >
             
              <div class="mb-10">
                <label for="" class="form-label">User name</label>
                <input type="hidden" name="email" class="form-control" value="<?=$login_email?>">
                <input type="text" name="name" class="form-control" value="<?=$after_assoc['name']?>">
              </div>
              
              <div class="mb-10">
                <label for="" class="form-label">mobile number</label>
                <input type="text" name="number" class="form-control" value="<?=$after_assoc['number']?>">
              </div>

              
              
              <button type="submit" class="btn btn-dark"  >Update</button>
            </form>
          </div>
        </div>
      </div>
     
    </div>
  </div>
<?php

require_once("../inc/fotter.php");
?>