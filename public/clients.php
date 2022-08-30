<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// Pagination 
$jumlahDataPerhalaman = 2;
$jumlahData = count(query("SELECT * FROM pelanggan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$pelanggan = query("SELECT * FROM pelanggan LIMIT $awalData, $jumlahDataPerhalaman");

// Ketika tombol cari ditekan
if (isset($_POST["cari"])) {
    $pelanggan = cari($_POST["keyword"]);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dist/output.css">
</head>
<!-- Header -->
<?php
require 'header.php';
?>

<body>

    <!-- Clients -->

    <div class="container w-1/6 mt-8 pt-36 ">
        <h1>Daftar Pelanggan</h1>
        <a href="tambah.php">Tambah Data Pelanggan</a>
        <form action="" method="POST">
            <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian..." autocomplete="off">
            <button type="submit" name="cari">
                Cari!
            </button>
        </form>

        <?php if ($halamanAktif > 1) : ?>
            <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) :  ?>
                <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:red;"><?= $i; ?></a>
            <?php else : ?>
                <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($halamanAktif < $jumlahHalaman) : ?>
            <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
        <?php endif; ?>
    </div>


    <section class="container">
        <div>
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="py-3 px-6">No.</th>
                        <th class="py-3 px-6">Aksi</th>
                        <th class="py-3 px-6">Gambar</th>
                        <th class="py-3 px-6">Nama</th>
                        <th class="py-3 px-6">Email</th>
                        <th class="py-3 px-6">Jenis Kelamin</th>
                        <th class="py-3 px-6">KTP</th>
                        <th class="py-3 px-6">No Handphone</th>
                    <tr>
                </thead>

                <?php $i = 1; ?>
                <?php foreach ($pelanggan as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td>
                            <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin untuk dihapus?');">Hapus</a>
                        </td>
                        <td> <img src="img/<?= $row["gambar"]; ?>" width="50">
                        </td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["jenis_kelamin"]; ?></td>
                        <td><?= $row["ktp"]; ?></td>
                        <td><?= $row["no_hp"]; ?></td>

                    </tr>
                    <?= $i++ ?>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
</body>

</html>