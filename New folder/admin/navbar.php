
<?php
// session_start();
require_once 'cheking.php';

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Visit website</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            FronEnd Inforamation
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="geust_massage_edit.php">Geust_Message
              <?php
              require_once '../db.php';

              $get_insert_qurey="SELECT COUNT(*) AS unread_msg FROM geust_massages WHERE 
              read_status= 1";
              $get_from_db=mysqli_query($db_connect,$get_insert_qurey);
              $after_asoc=mysqli_fetch_assoc($get_from_db);

              ?>
         
            <span class="badge bg-danger ms-2"><?=$after_asoc['unread_msg']?> </span></a></li>
            <li><a class="dropdown-item" href="banner.php">Banner</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Vlog</a></li>
          </ul>
        </li>
        
      </ul>
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
     <?=$_SESSION['admin_email']?>

     <?php
     $login_email=$_SESSION['admin_email'];



     $get_profile_qurey="SELECT name,number,image FROM users WHERE email='$login_email'"; 
     $from_db=mysqli_query($db_connect,$get_profile_qurey);
     $after_assoc=mysqli_fetch_assoc($from_db);
     
     ?>

     <img src="../<?=$after_assoc['image']?>" alt="" style="border-radius: 50%; " width="20px" height="20px">
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="profile.php">profile</a></li>
    <li><a class="dropdown-item" href="change_password.php">Change password</a></li>
    <li><a class="dropdown-item text-danger" href="../logout.php">Log out</a></li>
  </ul>
</div>
      
    </div>
  </div>
</nav>
