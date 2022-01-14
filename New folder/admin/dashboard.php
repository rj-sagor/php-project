<?php

session_start();
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';
require_once 'cheking.php';

$get_qurey="SELECT * FROM users"; 





$from_db=mysqli_query($db_connect,$get_qurey);



?>

 




<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header text-light bg-dark">
                        <h3 class="card-title text-center">User List</h3>
                    </div>
                    <div class="card-body">

                    <table class=" table table-bordered">

                    <thead>
                        <th>user name</th>
                        <th>user email</th>
                        <th>user number</th>
                    </thead>
                    <tbody>
                        

                        <?php
                        foreach($from_db as $user ):
                        ?>
                        <tr>
                        <td><?=$user['name']?></td>
                        <td><?=$user['email']?></td>
                        <td><?=$user['number']?></td>
                     </tr >
                     <?php
                     endforeach
                     ?>
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