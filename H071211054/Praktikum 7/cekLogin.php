<?php
include 'koneksi.php';
if (isset($_POST['btnLogin'])) {
  $email            = $_POST['email'];
  $password         = $_POST['password'];

  $sql5          = "select * from tb_login where email = '$email'";
  $q5            = mysqli_query($koneksi, $sql5);
  $r5            = mysqli_fetch_array($q5);

  if (mysqli_num_rows($q5) == 1) {
    if (password_verify($password, $r5['password'])) {
      // Login Valid
      session_start();
      $_SESSION['email'] = $r5 ['email'];
      header('location:index.php');
    } else {
      // Password Salah
      header('location:login.php?pesan=Password Salah');
    }
  } else {
    // Username Salah
    header('location:login.php?pesan=Tidak terdapat akun dengan email yang anda masukkan');
  }
}

?>