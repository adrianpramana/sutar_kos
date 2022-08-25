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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sutar Kos</title>
  <link href="dist/output.css" rel="stylesheet">
</head>

<body>
  <!-- Header Start -->
  <header class="absolute top-0 left-0 z-10 flex w-full items-center bg-transparent">
    <div class="container">
      <div class="relative flex items-center justify-between">
        <div class="px-4">
          <a href="#home" class="block py-6 text-lg font-bold text-primary">Sutar Kos</a>
        </div>
        <div class="flex items-center px-4">
          <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block lg:hidden">
            <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
            <span class="hamburger-line transition duration-300 ease-in-out"> </span>
            <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"> </span>
          </button>

          <nav id="nav-menu" class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none">
            <ul class="block lg:flex">
              <li class="group">
                <a href="#home" class="mx-8 flex py-2 text-base text-slate-800 group-hover:text-sky-500">Home</a>
              </li>
              <li class="group">
                <a href="#home" class="mx-8 flex py-2 text-base text-slate-800 group-hover:text-sky-500">About</a>
              </li>
              <li class="group">
                <a href="#home" class="mx-8 flex py-2 text-base text-slate-800 group-hover:text-sky-500">Clients</a>
              </li>
              <li class="group">
                <a href="#home" class="mx-8 flex py-2 text-base text-slate-800 group-hover:text-sky-500">Contact</a>
              </li>
              <li class="group">
                <a href="logout.php" class="mx-8 flex py-2 text-base text-slate-800 group-hover:text-sky-500">Logout</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- Header End -->

  <!-- Hero Section -->
  <section id="home" class="pt-36">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="w-full self-center px-4 lg:w-1/2">
          <h1 class="text-base font-semibold text-teal-500 md:text-xl">
            Hello
          </h1>
          <h2 class="mb-5 text-lg font-medium text-slate-400 lg:text-2xl"> Lorem ipsum dolor sit amet.
          </h2>
          <p class="mb-10 font-medium leading-relaxed text-slate-400">
            We offer the best facilities.
          </p>

          <a href="#contact" class="rounded-full bg-teal-500 py-3 px-8 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">Contact Me</a>
        </div>
      </div>
    </div>
  </section>

  <div class="container m-auto">
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

  <div class="container mt-4">
    <table class="table-fixed">
      <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jenis Kelamin</th>
        <th>KTP</th>
        <th>No Handphone</th>
      </tr>

      <tr>
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
</body>

</html>