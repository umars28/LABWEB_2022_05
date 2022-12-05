<?php
    require 'koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(isset($_POST['signin'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query_sql = "SELECT * FROM tb_users WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($koneksi, $query_sql);

    if(mysqli_num_rows($result) > 0){
        header("Location: tugas6.php");
    }else {
        echo "<center><h1>Kembali Ke Halaman <a href = 'index.html'>Login<h></a></h1></center>";
    }
    }
?>