<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');</script>
        ";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan!');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pelanggan</title>
</head>

<body>
    <h1>Tambah Data Pelanggan</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin">
            </li>
            <li>
                <label for="ktp">KTP:</label>
                <input type="text" name="ktp" id="ktp">
            </li>
            <li>
                <label for="no_hp">No Hp:</label>
                <input type="text" name="no_hp" id="no_hp">
            </li>
            <li>
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!
                </button>
            </li>
        </ul>
    </form>
</body>

</html>