<?php
include("../connect.php");
session_start();
date_default_timezone_set("Asia/Makassar");

$user_id = $_SESSION['user_id'];
$tgl = date('Y-m-d');
$time= date('H:i:s');
$cek_absen = "SELECT * FROM absen WHERE user_id='$user_id'";
$cek = $db->query($cek_absen);


$sql = "INSERT INTO absen (`id`, `user_id`,`tgl`, `jam_masuk`, `jam_keluar`) VALUES (NULL, '$user_id', '$tgl', '$time', NULL)";



$result = $db->query($sql);


if($result === TRUE){
    echo "berhasil";
} else {
    echo "gagal";
}

?>