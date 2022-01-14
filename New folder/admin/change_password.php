
<?php 
session_start();

require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
require_once 'cheking.php';

$login_email=$_SESSION['admin_email'];




// if(isset($_SESSION['user_status'])){
//   header('location: admin/dashboard.php');
// }
?>



  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto">
        <div class="card mt-4">
          <div class="card-header d-flex justify-content-between text-light bg-dark">
            <h4>Change Password From</h4>
           
          </div>
          <div class="card-body"> 
          <?php 
            if(isset($_SESSION['success'])):
              
              ?>
           <div class="alert alert-success" role="alert">
            <?php
          
            echo $_SESSION['success'];
            unset($_SESSION['success']);

            ?>
          </div>
              <?php

            endif;
            
            ?>

<?php 
            if(isset($_SESSION['pass_err'])):
              
              ?>
           <div class="alert alert-danger" role="alert">
            <?php
          
            echo $_SESSION['pass_err'];
            unset($_SESSION['pass_err']);
            
            ?>
          </div>
              <?php

            endif;
            
            ?>

<?php 
            if(isset($_SESSION['pass_err'])):
              
              ?>
           <div class="alert alert-danger" role="alert">
            <?php
          
            echo $_SESSION['pass_err'];
            unset($_SESSION['pass_err']);
            
            ?>
          </div>
              <?php

            endif;
            
            ?>
               
              
           
          
       
            <form action="change_pass_post.php" method="post">
             
              <div class="mb-10">
                <label for="" class="form-label">Old password</label>
                <input type="hidden" name="email" class="form-control" value="<?=$login_email?>">
              <input type="password" name="Old_pass" class="form-control">
              </div>
              
              <div class="mb-10">
                <label for="" class="form-label">New password</label>
                <input type="password" name="New_pass" class="form-control">
              </div>

              <div class="mb-10">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" name="Confirm_pass" class="form-control">
              </div>
              
              <button type="submit" class="btn btn-dark" >Update password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php

require_once("../inc/fotter.php");
?>