<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">    
    <label for="">Nisn</label>
    <input type="number" name="nisn">
    <label for="">Nama</label>
    <input type="text" name="nama">
    <button class="btn" name="add">Tambah</button>
</form>

</body>
</html>

<?php
include("../connect.php");
if(isset($_POST['add'])){
    $result = $db->query("INSERT INTO users(id, user_id, password, nama_lengkap, role) VALUES (NULL, $_POST[nisn], 123, '$_POST[nama]', 'Siswa')");
    header("location:siswa.php");
}


?>