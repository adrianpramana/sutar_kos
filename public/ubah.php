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
</head>

<body>
    <a href="index.php">Admin</a>

    <h1>Ubah Data Pelanggan</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $pelanggan["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $pelanggan["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama"></label>
                <input type="text" name="nama" id="nama" required value="<?= $pelanggan["nama"]; ?>">
            </li>
            <li>
                <label for="email"></label>
                <input type="text" name="email" id="email" required value="<?= $pelanggan["email"]; ?>">
            </li>
            <li>
                <label for="jenis_kelamin"></label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" required value="<?= $pelanggan["jenis_kelamin"]; ?>">
            </li>
            <li>
                <label for="ktp"></label>
                <input type="text" name="ktp" id="ktp" required value="<?= $pelanggan["ktp"]; ?>">
            </li>
            <li>
                <label for="no_hp"></label>
                <input type="text" name="no_hp" id="no_hp" required value="<?= $pelanggan["no_hp"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar</label> <br>
                <img src="img/<?= $pelanggan['gambar']; ?>" width="40"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">
                    Ubah Data!
                </button>
            </li>
        </ul>

    </form>

    </button>
</body>

</html>