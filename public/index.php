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
  <!-- Header -->
  <?php
  require 'header.php';
  ?>

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

</body>

</html>