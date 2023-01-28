<?php
include("../connect.php");
session_start();
date_default_timezone_set("Asia/Makassar");

$user_id = $_SESSION['user_id'];
$tgl = date('Y-m-d');
$time= date('H:i:s');
$cek_absen = "SELECT * FROM absen WHERE user_id='$user_id' AND tgl='$tgl'";
$cek = $db->query($cek_absen);

if($cek->num_rows > 0){
    // Jika user sudah absen
header('location:index.php?message=maaf anda sudah absen hari ini!');
} else {
    // Jika belum absen hari itu
$sql = "INSERT INTO absen (`id`, `user_id`,`tgl`, `jam_masuk`, `jam_keluar`) VALUES (NULL, '$user_id', '$tgl', '$time', NULL)";
$result = $db->query($sql);
if($result === TRUE){
    header('location:index.php?message=anda berhasil absen');   
} else {
    echo "gagal absen";
}
}

?>