<?php
session_start();
require_once 'navbar.php';
require_once '../inc/header.php';

require_once '../db.php';

$get_query="SELECT * FROM banners";
$from_db=mysqli_query($db_connect,$get_query);

?>



<section>
<div class="container">

<div class="row">

<div class="col-lg-3">
<div class="card mt-4">
    <div class="card-header text-light bg-dark">
        <h5 class="card-title">Banner </h5>
    </div>
    <div class="card-body">

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
           <form action="banner_post.php" method="post" enctype="multipart/form-data">

           <div class="mt-4">
               <input type="text" class="form-control" name="sub_title" placeholder="sub_title">
           </div>
           <div class="mt-4">
               <input type="text" class="form-control" name="title_top"  placeholder="title_top">
           </div>
           <div class="mt-4">
               <input type="text" class="form-control" name="title_bottom"  placeholder="title_bottom">
           </div>
           <div class="mt-4">
               <input type="text" class="form-control" name="detail"  placeholder="detail">
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
    <div class="col-lg-9">
 <div class="card mt-4">
     <div class="card-header text-light bg-dark">
         <div class="card-title">Banner Information</div>
     </div>
     <div class="card-body">
<table class="table table-bordered">
<thead>
         <th>sub_title</th>
         <th>title_Top</th>
         <th>title_bottom</th>
         <th>detail</th>
         <th>location</th>
         <th>active_status</th>`
         <th>action</th>
     </thead>
     <tbody>
         <?php foreach($from_db as $banner): ?>
            <tr>
                <td><?=$banner['sub_title']?></td>
                <td><?=$banner['title_top']?></td>
                <td><?=$banner['title_bottom']?></td>
                <td><?=$banner['detail']?></td>
                <td> <img src="../<?=$banner['image_location']?>" alt="" style="width: 100px;"></td>
                <td>
                   <?php if($banner['active_status']==1): ?>
                    <span class="badge badge-sm bg-success">Active</span>

                    <?php else: ?>
                        <span class="badge badge-sm bg-danger">Deactive</span>
                    


                    <?php  endif ?>
                 
            
            </td>
                <td><div class="btn-group" role="group" aria-label="Basic example">
                    <?php
                    if($banner['active_status']==1):?>

                        <a href="banner_deactive.php?id=<?=$banner['id']?>"
                         class="btn btn-primary btn-sm bg-dark text-light ">Make de-active</a>
                    
                    <?php else :?>
                        <a href="banner_active.php?id=<?=$banner['id']?>"
                        class="btn btn-primary btn-sm bg-dark text-light ">Make active</a>
                        
                        <?php endif ?>
                        
                   
                    <a href="banner_edit.php?id=<?=$banner['id']?>" class="btn btn-primary btn-sm bg-primary">Edit</a>
                      <a href="banner_delete.php?id=<?=$banner['id']?>"class="btn btn-primary btn-sm bg-danger">Delete</a>
                   </div>
               
                </td>
            </tr>
            <?php endforeach?>
     </tbody>
</table>
     
     </div>
 </div>
</div>
</div>
</div>

</section>




<?php

require_once '../inc/fotter.php';
?>