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
    <link rel="stylesheet" href="absensi.css">
</head>
<body>

<form action="action.php" method="POST">

<button class="btn btn-primary " name="absen" type="submit">absen</button>

</form>

<table border="1" class="">
   
    <tr>
        <th>Tanggal</th>
        <th>Clock In</th>
        <th>Clock Out</th>
        <th>Keterangan</th>
    </tr>
  
</body>
</html>
   
<?php


include("../connect.php");

$user_id = $_SESSION['user_id'];
// $password = $_SESSION['password'];
$sql = "SELECT * FROM absen WHERE user_id='$user_id'";
$result = $db->query($sql);

while($data = $result->fetch_assoc()){
   echo "<tr>";
    echo "<td>". $data['tgl'] . " </td>";
    echo "<td>". $data['jam_masuk'] . " </td>";
    echo "<td>". $data['jam_keluar'] . " </td>";
    echo "<td>-</td>";
   echo "</tr>";
}
?>
</table>


