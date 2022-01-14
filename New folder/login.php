
<?php 
session_start();

require_once("inc/header.php");

if(isset($_SESSION['user_status'])){
  header('location: admin/dashboard.php');
}
?>



  <div class="container">
    <div class="row">
      <div class="col-md-6 m-auto">
        <div class="card mt-4">
          <div class="card-header d-flex justify-content-between ">
            <h4>Login From</h4>
            <a href="main.php" class="btn btn-sm btn-dark">Register</a>

          </div>
          <div class="card-body">
             
            <?php 
            if(isset($_SESSION['log_err'])){
              
              ?>
           <div class="alert alert-danger" role="alert">
            <?php
          
            echo $_SESSION['log_err'];
            unset($_SESSION['log_err']);
            ?>
          </div>
              <?php


            }
            ?>
               
          
       
            <form action="login_post.php" method="post">
             
              <div class="mb-10">
                <label for="" class="form-label">User email</label>
                <input type="email" name="email" class="form-control">
              </div>
              
              <div class="mb-10">
                <label for="" class="form-label">password</label>
                <input type="password" name="password" class="form-control">
              </div>
             
              
              <button type="submit" class="btn btn-info" style="padding: 3px 10px; margin-top: 10px; font-size: 18px;" >Log in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php

require_once("inc/fotter.php");
?>