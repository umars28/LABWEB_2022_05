<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "db_users";
    
$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}else{
    $host = "localhost";
    $user       = "root";
    $pass       = "";
    $db         = "db_users";
}
?>