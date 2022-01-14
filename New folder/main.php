
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
            <h4>Register From</h4>
            <a href="login.php" class="btn btn-sm btn-success">Login</a>

          </div>
          <div class="card-body">
             
            <?php 
            if(isset($_SESSION['reg_err'])){
              
              ?>
           <div class="alert alert-danger" role="alert">
            <?php
          
            echo $_SESSION['reg_err'];
            unset($_SESSION['reg_err']);
            ?>
          </div>
              <?php


            }
            ?>
               <?php 
            if(isset($_SESSION['reg_success'])){
              
              ?>
           <div class="alert alert-success" role="alert">
            <?php
          
            echo $_SESSION['reg_success'];
            unset($_SESSION['reg_success']);
            ?>
          </div>
              <?php


            }
            ?>
       
            <form action="register.php" method="post">
              <div class="mb-10">
                <label for="" class="form-label">User name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="mb-10">
                <label for="" class="form-label">User email</label>
                <input type="text" name="email" class="form-control">
              </div>
              <div class="mb-10">
                <label for="" class="form-label">Number</label>
                <input type="text" name="number" class="form-control">
              </div>
              <div class="mb-10">
                <label for="" class="form-label">password</label>
                <input type="password" name="password" class="form-control">
              </div>
             
              
              <button type="submit" class="btn btn-secondary" style="padding: 3px 10px; margin-top: 10px; font-size: 18px;" >SUBMIT</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php

require_once("inc/fotter.php");
?>