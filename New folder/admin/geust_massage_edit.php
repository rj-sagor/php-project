<?php
session_start();
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
if(!isset($_SESSION['user_status'])){
    header('location: login.php');

  }




  $get_insert_query="SELECT * FROM geust_massages";
  $get_after_db=mysqli_query($db_connect,$get_insert_query);




?>

<section>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-4" >
                <div class="card-header bg-warning">
                <h5 class="card-title text-capitalize">Message Show From</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>geust Name</th>
                            <th>geust Email</th>
                            <th>geust Subject</th>
                            <th>geust Message</th>
                           
                            <th>action</th>
                        </thead>
                        <tbody>

                        <?php foreach($get_after_db as $massage):  ?>

                            <tr class="<?=($massage['read_status'] == 1)? "text-light bg-dark" : "text-dark"
                            ?>">
                                <td><?=$massage['guest_name']?></td>
                                <td><?=$massage['guest_email']?></td>
                                <td><?=$massage['guest_subject']?></td>
                                <td><?=$massage['guest_massage']?></td>
                               <td>

                             <?php if($massage['read_status'] ==1): ?>
                                <a href="msg_read.php?msg_id=<?=$massage['id']?>" class="btn btn-sm btn-success">mark as read</a>


                                <?php endif?>
                                <a href="msg_delete.php?msg_id=<?=$massage['id']?>" class="btn btn-sm btn-danger">Delete</a>
                               </td>
                            </tr>

                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<?php

require_once '../inc/fotter.php'
?>