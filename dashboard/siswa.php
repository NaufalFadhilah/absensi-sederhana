
<?php
include("../connect.php");
$result = $db->query("SELECT * FROM users ORDER BY nama_lengkap");
$resultAtt = $db->query("SELECT * FROM absen LIMIT 0");
if(isset($_POST['add'])){
    header("location:add.php");
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
<table class="table">
    <tr>
        <th>Nisn</th>
        <th>Nama</th>
        <th>Opsi</th>
        <th><form name="add" action="" method="POST"><button type="submit" name="add">Tambah Siswa</button></form></th>
  
    </tr>
<?php
  
while($data = $result->fetch_assoc()){
    if($data['role'] == "Siswa"){
    echo "<tr>";
    echo "<td>" .$data['user_id']."</td>";
    echo "<td>" .$data['nama_lengkap'] ."</td>";
    echo "<td><a class=me-2 href=edit.php> EDIT <a class=ms-2 href=delete.php> DELETE</td>";
    

    echo "</tr>";
    }
}

?>
</table>
    
</body>
</html>