<?php
    // echo "Halo Kak Lev";

    // $nama = "Lev";
    // $umur = 19;
    // var_dump($nama);
    // echo "<br />";
    // var_dump($umur);
    // echo "<br />";

    // $num1 = 100;
    // $num2 = 200;
    // echo $num1 + $num2;

    // $_SERVER['PHP_SELF'], "<br />";
    // $_SERVER['SERVER_ADDR'], "<br />";
    // $_SERVER['SERVER_NAME'], "<br />";
    // $_SERVER['SERVER_PROTOCOL'], "<br />";
    // $_SERVER['REQUEST_METHOD'], "<br />";
    // $_SERVER['QUERY_STRING'], "<br />";
    // $_SERVER['DOCUMENT_ROOT'], "<br />";
    // $_SERVER['HTTP_HOST'], "<br />";
    // $_SERVER['HTTP_REFERER'], "<br />";
    // $_SERVER['HTTP_USER_AGENT'], "<br />";
    // $_SERVER['REMOTE_ADDR'], "<br />";
    // $_SERVER['SCRIPT_FILENAME'], "<br />";
    // $_SERVER['REQUEST_URI'], "<br />";

?>

<?php
    if ($_GET) {
        echo "Nama :", $_GET['nama'], "<br/>";
        echo "Umur :", $_GET['umur'];
    }
    if ($_POST) {
        echo "Nama :", $_POST['NIM'], "<br/>";
        echo "Umur :", $_POST['password'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lev Computer</title>
</head>
<body>
    <form action="welcome.php" method="GET">
        <input type="text" name="nama" placeholder="Masukkan Nama Anda">
        <input type="number" name="umur" placeholder="Umur Anda...">
        <input type="submit" name="submit" value="OKE">
    </form>

    <form action="" method="POST">
        <input type="text" name="NIM" placeholder="NIM Anda...">
        <input type="text" name="password" placeholder="Password Anda...">
        <input type="submit" name="submit" value="OKE">
    </form>
    <br>
</body>
</html>