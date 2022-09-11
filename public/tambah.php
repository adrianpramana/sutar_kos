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
        alert('Data berhasil ditambahkan!');
        window.location.replace('clients.php');
        </script>
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
    <link rel="stylesheet" href="dist/output.css">
</head>

<body>
    <?php
    require 'adminDashboard.php';
    ?>
    <h1 class="text-primary flex justify-center font-semibold text-3xl mt-40">Tambah Data Pelanggan</h1>
    <div class="flex justify-center my-12">
        <div class="block mb-2">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="nama" class="text-sm font-medium text-gray-900">Nama</label>
                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">

                <label for="email" class="text-sm font-medium text-gray-900">Email</label>
                <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">


                <label for="jenis_kelamin" class="text-sm font-medium text-gray-900">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">


                <label for="ktp" class="text-sm font-medium text-gray-900">KTP</label>
                <input type="text" name="ktp" id="ktp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">


                <label for="no_hp" class="text-sm font-medium text-gray-900">No Hp</label>
                <input type="text" name="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">

                <label for="gambar" class="text-sm font-medium text-gray-900">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="block w-[500px] text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 cursor-pointer focus:outline-none">

                <button type="submit" name="submit" class="w-full my-4 rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-500 hover:opacity-80 hover:shadow-lg">Tambah Data
                </button>

            </form>
        </div>
    </div>
</body>

</html>