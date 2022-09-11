<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

$id = $_GET["id"];
$pelanggan = query("SELECT * FROM pelanggan WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil diubah!');
        window.location.replace('clients.php');
        </script>
        ";
    } else {
        echo "<script>
        alert('Data gagal diubah!');
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
    <title>Ubah Data Pelanggan</title>
    <link rel="stylesheet" href="dist/output.css">
</head>

<body>
    <?php
    require 'adminDashboard.php';
    ?>

    <h1 class="text-primary flex justify-center font-semibold text-3xl mt-40">Ubah Data Pelanggan</h1>
    <div class="flex justify-center my-12">
        <div class="block mb-12">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $pelanggan["id"]; ?>" class="block w-[500px] text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 cursor-pointer focus:outline-none">
                <input type="hidden" name="gambarLama" value="<?= $pelanggan["gambar"]; ?>" class="block w-[500px] text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 cursor-pointer focus:outline-none">

                <label for="nama" class="text-sm font-medium text-gray-900">Nama</label>
                <input type="text" name="nama" id="nama" required value="<?= $pelanggan["nama"]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">

                <label for="email" class="text-sm font-medium text-gray-900">Email</label>
                <input type="text" name="email" id="email" required value="<?= $pelanggan["email"]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">

                <label for="jenis_kelamin" class="text-sm font-medium text-gray-900">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" required value="<?= $pelanggan["jenis_kelamin"]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">

                <label for="ktp" class="text-sm font-medium text-gray-900">KTP</label>
                <input type="text" name="ktp" id="ktp" required value="<?= $pelanggan["ktp"]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">

                <label for="no_hp" class="text-sm font-medium text-gray-900">No.Hp </label>
                <input type="text" name="no_hp" id="no_hp" required value="<?= $pelanggan["no_hp"]; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5">


                <label for="gambar" class="text-sm font-medium text-gray-900">Gambar</label> <br>
                <img src="img/<?= $pelanggan['gambar']; ?>" width="125"> <br>
                <input type="file" name="gambar" id="gambar" class="block w-[500px] text-sm text-gray-900 bg-gray-50 rounded-md border border-gray-300 cursor-pointer focus:outline-none">

                <button type="submit" name="submit" class="w-full my-4 rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-500 hover:opacity-80 hover:shadow-lg">
                    Ubah Data
                </button>
            </form>
        </div>
    </div>
</body>

</html>