<?php
session_start();
$user_id = $_SESSION['user_id'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$role = $_SESSION['role'];
$status = $_SESSION['status'];

if($status !== "login"){
    header("location:../index.php?message=login terlebih dahulu");
}

if(isset($_POST['logout'])){
    session_destroy();
    header("location:../index.php?message=anda telah logout");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link
      rel="stylesheet"
      href="../bootstrap/css/bootstrap.css"
    />
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar bg-light d-flex">
  <div class="container-fluid d-flex flex-row">
    <a class="navbar-brand"><h2>Dashboard</h2></a> <form class="d-flex" role="search" method="POST">
      <button class="btn btn-outline-success" name="logout" type="submit">Logout</button>

 <p class="nama">Halo <b><?php echo $nama_lengkap; ?></b></p> 
 <p class="nama fw-lighter">(<?php echo $role; ?>)</p>
    </form>

  </div>

</nav>
<?php 
if(isset($_GET['message'])){
  echo $_GET['message'];
}
?>
<?php
// Data absen
include("absensi.php");

?>
<p>
  <?php


?></p>


<form action="" method="POST">
</form>


</body>
</html>