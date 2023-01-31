<?php
session_start();
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
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css.css">
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

 <p class="nama">Halo <b><?php echo $_SESSION['nama_lengkap']; ?></b></p> 
 <p class="nama fw-lighter">(<?php echo $_SESSION['role']; ?>)</p>
    </form>

  </div>

</nav>
    <div class="mx-auto mb-5 mt-5">
        <form class="d-flex justify-content-center align-center gap-4" action="" method="POST" >
           <div> <p class="fs-5">Lihat pada tanggal :</p></div>
<input class="input" type="date" name="first" value="tanggal">
<button type="submit" name="sort" class="btn btn-primary" value="Klik">Klik</button>
</form>

    </div>
<table class="table">
    <tbody>
    <tr class="tr">
        <th class="bg-primary text-light">No</th>
        <th class="bg-primary text-light">Nama</th>
        <th class="bg-primary text-light">Jabatan</th>
        <th class="bg-primary text-light">Tanggal</th>
        <th class="bg-primary text-light">Masuk</th>
        <th class="bg-primary text-light">Keluar</th>
    </tr>

        <?php
        include("../connect.php");
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users JOIN absen ON users.user_id = absen.user_id";
        
        $result = $db->query($sql);

        if (isset($_POST['sort']) && $_POST['first'] ==  NULL) {
            while($data = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" .$data['id'] ."</td>";
                echo "<td>" .$data['nama_lengkap'] ."</td>";
                echo "<td>" .$data['role'] ."</td>";
                echo "<td>" .$data['tgl'] ."</td>";
                echo "<td>" .$data['jam_masuk'] ."</td>";
                echo "<td>" .$data['jam_keluar'] ."</td>";
                echo "</tr>";
            }
        }
        else if (isset($_POST['sort'])){
            $first = $_POST['first'];
            $sql = "SELECT * FROM users JOIN absen ON users.user_id = absen.user_id AND tgl='$first'";
            $result = $db->query($sql);
            while($data = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" .$data['id'] ."</td>";
                echo "<td>" .$data['nama_lengkap'] ."</td>";
                echo "<td>" .$data['role'] ."</td>";
                echo "<td>" .$data['tgl'] ."</td>";
                echo "<td>" .$data['jam_masuk'] ."</td>";
                echo "<td>" .$data['jam_keluar'] ."</td>";
                echo "</tr>";
            }
        }  else {
     

                while($data = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" .$data['id'] ."</td>";
                    echo "<td>" .$data['nama_lengkap'] ."</td>";
                    echo "<td>" .$data['role'] ."</td>";
                    echo "<td>" .$data['tgl'] ."</td>";
                    echo "<td>" .$data['jam_masuk'] ."</td>";
                    echo "<td>" .$data['jam_keluar'] ."</td>";
                    echo "</tr>";
                
            }
            
        }
        
        ?>
 </tbody>
    </table>
    <div class="d-flex justify-content-center align-center mt-4">
        <button class="text-center" onclick="window.print()">CETAK LAPORAN</button>
    </div>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



<style> 
	table tbody {
		display:block; 
        background-color: lightblue;
		height:80vh;
		overflow-y:scroll;
        height: 80vh;
        width: 100%;
    
	}
table {
  width: 80%!important;
  margin: auto;
  overflow: hidden;

} 
td,
tr {
  border: 1px solid rgb(255, 255, 255);
  padding: 0 20px;
  width: 10%;

}
tr {
    width: 100%;
}


th {
    padding: 0 20px;

}
</style>