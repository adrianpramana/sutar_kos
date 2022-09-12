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
                <td class="flex justify-evenly">
                    <a href="ubah.php?id=<?= $row["id"]; ?>"><svg class="hover:bg-gray-100" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                        </svg></a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin untuk dihapus?');"><svg class="hover:bg-gray-100" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                            <path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                        </svg></a>
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
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    <?php if ($halamanAktif > 1) : ?>
                        <a class="block py-2 px-3 ml-0 leadiing-tracking-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100hover:text-gray-700" href="?halaman=<?= $halamanAktif - 1; ?>">
                            <span class="sr-only">Previous</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) :  ?>
                    <a class="-m-1 py-2 px-4 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                <?php else : ?>
                    <a class="-m-1 py-2 px-4 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>
            <li>
                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                    <a class="block mr-2 py-2 px-2 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700" href="?halaman=<?= $halamanAktif + 1; ?>">
                        <span class="sr-only">Next</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>

                    </a>
            </li>
        <?php endif; ?>
            </ul>
        </div>
    </section>
</body>

</html>