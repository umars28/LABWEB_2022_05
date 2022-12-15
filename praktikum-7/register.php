<?php
require 'koneksi.php';
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query_sql = "INSERT INTO tb_users(fullname, username, email, password)
                values('$fullname','$username', '$email', '$password')";
if(mysqli_query($koneksi, $query_sql)){
    header("Location: index.html");
}else{
    echo "Pendaftaran Gagal : ". mysqli_error($koneksi);
}
?>