<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="../bootstrap/css/bootstrap.css"
    />
</head>
<body>

<form action="action.php" method="POST">

<button class="btn btn-primary " name="absen" type="submit">absen</button>

</form>

<table border="" class="table">
<tbody>
   
    <tr>
        <th class="bg-primary text-light">Tanggal</th>
        <th class="bg-primary text-light">Clock In</th>
        <th class="bg-primary text-light">Clock Out</th>
        <th class="bg-primary text-light">Keterangan</th>
    </tr>
  
</body>
</html>
   
<?php


include("../connect.php");
date_default_timezone_set('Asia/Makassar');

$user_id = $_SESSION['user_id'];
// $password = $_SESSION['password'];
$sql = "SELECT * FROM absen WHERE user_id='$user_id'";
$result = $db->query($sql);
$tgl = date('Y-m-d');
$time = date('H:i:s');
$tepat_masuk = date('07: 30: 00');
$tepat_keluar = date('15 : 40 :00');

if(isset($_POST['clockout'])){
    $sql = "UPDATE absen SET jam_keluar ='$time' WHERE user_id= '$user_id' AND tgl='$tgl'";

    $clockout = $db->query($sql);
    if($clockout==TRUE ){
       header("location:index.php?message=Berhasil Clockout, selamat berisitirahat");
    } else {
        echo "terjadi kesalahan";
    }
}

while($data = $result->fetch_assoc()){
    echo "";
   echo "<tr>";
    echo "<td>". $data['tgl'] . " </td>";
    echo "<td>". $data['jam_masuk'] . " </td>";
    if(empty($data['jam_keluar']) && !empty($data['jam_masuk']) && $data['tgl'] == $tgl){
        echo '<td>
        <form method=POST>   
        <button name="clockout" type="">Absen keluar</button>
       </form>
        </td>';
    }else {
        echo "<td>" . $data['jam_keluar'] . "</td>";
    }
    if($data['jam_masuk'] <= $tepat_masuk){
        echo "<td>Tepat waktu</td>";
    } else {
        echo "<td>Terlambat</td>";
    }
 
    echo "</tr>";
    echo "";
}
?>
</tbody>
</table>


<style> 
table {
  width: 80%!important;
  background-color: lightblue;
  margin: auto;

} 
tbody {
    height: 50vh!important;
    overflow: scroll;
}
td,
tr {
  border: 1px solid rgb(255, 255, 255);
  padding: 0 20px;
}


th {
    padding: 0 20px;
}
</style>