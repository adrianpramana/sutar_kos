<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// Pagination 
$jumlahDataPerhalaman = 4;
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
    <title>Clients</title>
    <link rel="stylesheet" href="dist/output.css">
</head>

<body>
    <?php
    require 'adminDashboard.php';
    ?>
    <section class=" container w-full pt-36 pr-36 mx-auto">
        <!-- Clients -->
        <h1 class="font-bold text-3xl flex justify-center pb-11 font-serif">Daftar Pelanggan</h1>
        <div class="flex justify-between items-center pb-4">
            <button class="p-1 border border-sky-700 rounded-md bg-primary text-white font-semibold focus:outline-none focus:ring-2 hover:bg-blue-900"><a href="tambah.php">Tambah Data Pelanggan</a></button>

            <form action="" method="POST">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-1 pointer-events-none">
                        <button type="submit" name="cari">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <input type="text" name="keyword" id="table-search" class="block p-2 pl-10 w-[360px] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Masukan keyword pencarian...">
                </div>
        </div>
        </form>

        <table class="w-full text-sm text-left text-slate-600 my-4">
            <thead class="text-xs text-slate-600 uppercase bg-gray-50">
                <tr class="text-center">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Aksi</th>
                    <th class="py-3 px-6">Gambar</th>
                    <th class="py-3 px-6">Nama</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Jenis Kelamin</th>
                    <th class="py-3 px-6">KTP</th>
                    <th class="py-3 px-6">No Handphone</th>
                <tr>
            </thead>

            <tr>
                <?php $i = 1; ?>
                <?php foreach ($pelanggan as $row) : ?>
            <tr>
                <td class="text-center"><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin untuk dihapus?');">Hapus</a>
                </td>
                <td> <img class="m-auto" src="img/<?= $row["gambar"]; ?>" width="55">
                </td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jenis_kelamin"]; ?></td>
                <td><?= $row["ktp"]; ?></td>
                <td><?= $row["no_hp"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        </table>

        <div class="pt-3 flex justify-end m-2">
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
    </section>
</body>

</html>