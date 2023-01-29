<?php
echo "hai admin";

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
</head>
<body>
    <div>
        <?php
        if(isset($_GET['message'])){
            echo $_GET['message'];
        }
        ?>
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
        session_start();
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users JOIN absen ON users.user_id = absen.user_id";
        
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