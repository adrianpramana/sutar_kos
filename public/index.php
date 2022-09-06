<?php
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

  <!-- Hero Section Start -->
  <section id="home" class="pt-36">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="w-full self-center px-4 lg:w-1/2">
          <h1 class="text-base font-semibold text-primary md:text-xl">
            Hello
          </h1>
          <h2 class="mb-5 text-lg font-medium text-secondary lg:text-2xl"> Lorem ipsum dolor sit amet.
          </h2>
          <p class="mb-10 font-medium leading-relaxed text-secondary">
            We offer the best facilities.
          </p>

          <a href="#contact" class="rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-300 ease-in-out hover:opacity-80 hover:shadow-lg">Contact Me</a>
        </div>
        <div class="w-full self-end px-4 lg:w-1/2">
          <div class="relative mt-10 lg:right-0 lg:mt-9">
            <img src="img/house.jpg" alt="My House" class="relative z-10 mx-auto max-w-full rounded-full">
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- Hero Section End -->

  <!-- About Section Start -->
  <section id="about" class="pt-36 pb-32">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="mb-10 w-full px-4 lg:w-1/2">
          <h4 class="mb-3 text-lg font-bold uppercase text-primary">About Me
          </h4>
          <h2 class="mb-5 max-w-md text-3xl font-bold text-dark lg:text-4xl"> Lorem ipsum dolor sit amet.
          </h2>
          <p class="max-w-xl text-base font-medium text-secondary lg:text-lg">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum, enim? Aspernatur vel inventore nam, deserunt dicta fugiat eius excepturi eaque eveniet itaque quaerat, magnam, libero quam tempore quisquam fugit! Natus quos provident nesciunt rerum magnam.</p>
        </div>
        <div class="w-full px-4 lg:w-1/2">
          <h3 class="mb-4 text-2xl font-semibold text-dark lg:pt-10 lg:text-3xl">
            Follow Me
          </h3>
          <p class="mb-6 text-base font-medium text-secondary lg:text-lg">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate, explicabo.
          </p>
          <div class="flex items-center">
            <!-- Instagram -->
            <a href="https://www.instagram.com/adrianpramanaa_/" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Instagram</title>
                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
              </svg>
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/adrian.a.pramana.5" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Facebook</title>
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
              </svg>
            </a>

            <!-- Github -->
            <a href="https://github.com/adrianpramana" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>GitHub</title>
                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
              </svg>
            </a>

            <!-- Twitter -->
            <a href="https://twitter.com/Adrian_Pramanaa" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Twitter</title>
                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
              </svg>
            </a>

            <!-- WhatsApp -->
            <a href="#" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
              <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>WhatsApp</title>
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About Section End -->

  <!-- Facility Section Start -->
  <section id="facility" class="bg-slate-100 pt-36 pb-6">
    <div class="container">
      <div class="w-full px-4">
        <div class="mx-auto mb-16 max-w-xl text-center">
          <h4 class="mb-2 text-lg font-semibold">Facility</h4>
          <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl lg:text-5xl">Our Service</h2>
          <p class="text-md font-medium text-secondary md:text-lg">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quam saepe modi blanditiis neque dolorum enim ipsa debitis dolore at nobis, natus libero alias! Vitae, maxime.
          </p>
        </div>
      </div>

      <div class="flex w-full flex-wrap justify-center px-4 xl:mx-auto xl:w-10/12">
        <div class="mb-12 p-4 md:w-1/2">
          <div class="shadow-md overflow-hidden rounded-md">
            <img src="img/facility/room_1.jpg" alt="Room 1" width="w-full">
          </div>
          <h3 class="mt-5 mb-3 text-xl font-semibold text-dark">
            Living Room
          </h3>
          <p class="text-base font-medium text-secondary">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet sit eaque eum sapiente, nobis eius.
          </p>
        </div>
        <div class="mb-12 p-4 md:w-1/2">
          <div class="shadow-md rounded-md overflow-hidden">
            <img src="img/facility/room_1.jpg" alt="Room 2" width="w-full">
          </div>
          <h3 class="mt-5 mb-3 text-xl font-semibold text-dark">
            Bedrooom
          </h3>
          <p class="text-base font-medium text-secondary">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum minus eum laboriosam harum architecto esse?
          </p>
        </div>

      </div>
    </div>

  </section>
  <!-- Facility Section End -->

  <!-- Location Section Start -->
  <section id="location" class="bg-slate-800 pt-36 pb-32">
    <div class="container">
      <div class="w-full px-4">
        <div class="mx-auto mb-16 text-center">
          <h4 class="mb-2 text-lg font-semibold text-teal-400">
            Location
          </h4>
          <h2 class="mb-4 text-3xl font-bold text-white sm:text-4xl lg:text-5xl">Sutar Kos Est. 2020</h2>
          <p class="text-md font-medium text-secondary md:text-lg">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos ut quam tenetur, praesentium quod officia?
          </p>
        </div>
      </div>

      <div class="w-full">
        <div class="flex items-center justify-center">
          <iframe class="rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d586.2911420803532!2d115.24120723021345!3d-8.683851421837419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240541955ad53%3A0x364fc375f326c547!2sJl.%20Tukad%20Oos%20No.5%2C%20Renon%2C%20Denpasar%20Selatan%2C%20Kota%20Denpasar%2C%20Bali%2080226!5e0!3m2!1sid!2sid!4v1662100585285!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

    </div>

  </section>
  <!-- Location Section End -->

  <!-- Contact Section Start -->
  <section id="contact" class="pt-36 pb-32">
    <div class="container">
      <div class="w-full px-4">
        <div class="mx-auto mb-16 max-w-xl text-center">
          <h4 class="mb-2 text-lg font-semibold text-primary">
            Contact
          </h4>
          <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl lg:text-5xl"> Contact Us
          </h2>
          <p class="text-md font-medium text-secondary md:text-lg">
            Please contact us by filling out the form below, thank you.
          </p>
        </div>
      </div>
      <form>
        <div class="w-full lg:mx-auto lg:w-2/3">
          <div class="mb-8 w-full px-4">
            <label for="name" class="text-base font-bold">Name</label>
            <input type="text" name="name" id="name" class="w-full rounded-md bg-slate-200 p-3 text-dark focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
          </div>
          <div class="mb-8 w-full px-4">
            <label for="email" class="text-base font-bold">Email</label>
            <input type="text" email="email" id="email" class="w-full rounded-md bg-slate-200 p-3 text-dark focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
          </div>
          <div class="mb-8 w-full px-4">
            <label for="message" class="text-base font-bold text-primary">Message</label>
            <textarea type="textarea" id="message" name="message" class="h-32 w-full rounded-md bg-slate-200 p-3 text-dark focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
            </textarea>
          </div>
          <div class="w-full px-4">
            <button type="submit" class="w-full rounded-full bg-primary py-3 px-8 text-base font-semibold text-white transition duration-500 hover:opacity-80 hover:shadow-lg">
              Send
            </button>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- Contact Section End -->

  <!-- Footer Start -->
  <footer class="bg-dark pt-24 pb-12">
    <div class="container">
      <div class="flex flex-wrap">
        <div class="mb-12 w-full px-4 font-medium text-slate-300 md:w-1/3">
          <h2 class="mb-5 text-4xl font-bold text-white">Sutar Kos
          </h2>
          <h3 class="mb-2 text-2xl font-bold">Contact Us
          </h3>
          <p>sutarkos@gmail.com</p>
          <p>Jl. Tukad Oos Barat No. 5</p>
          <p>Bali</p>
        </div>
        <div class="mb-1 w-full px-4 md:w-1/3">
          <h3 class="mb-5 text-xl font-semibold text-white">Category
          </h3>
          <ul class="text-slate-300">
            <li>
              <a href="#facility" class="mb-3 inline-block text-base hover:text-teal-400">Facility</a>
            </li>
            <li>
              <a href="#facility" class="mb-3 inline-block text-base hover:text-teal-400">Room</a>
            </li>
          </ul>
        </div>
        <div class="mb-12 w-full px-4 md:w-1/3">
          <h3 class="mb-5 text-xl font-semibold text-white">Link
          </h3>
          <ul>
            <li>
              <a href="#home" class="mb-3 inline-block text-white hover:text-teal-400">Home</a>
            </li>
            <li>
              <a href="#clients" class="mb-3 inline-block text-white hover:text-teal-400">Clients</a>
            </li>
            <li>
              <a href="#contact" class="mb-3 inline-block text-white hover:text-teal-400">Contact</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="w-full border-t border-slate-700 pt-10">
        <div class="mb-5 flex items-center justify-center">
          <!-- Instagram -->
          <a href="https://www.instagram.com/adrianpramanaa_/" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Instagram</title>
              <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
            </svg>
          </a>

          <!-- Facebook -->
          <a href="https://www.facebook.com/adrian.a.pramana.5" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Facebook</title>
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
            </svg>
          </a>

          <!-- Github -->
          <a href="https://github.com/adrianpramana" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>GitHub</title>
              <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
            </svg>
          </a>

          <!-- Twitter -->
          <a href="https://twitter.com/Adrian_Pramanaa" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>Twitter</title>
              <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
            </svg>
          </a>

          <!-- WhatsApp -->
          <a href="#" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-full border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <title>WhatsApp</title>
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
          </a>
        </div>

        <p class="text-center text-xs font-medium text-slate-500">Create with <span class="text-pink-500">❤</span> by <a href="#about" class="font-bold text-teal-400">Sutar Kos</a>, using <a href="https://tailwindcss.com" target="_blank" class="font-bold text-sky-500">Tailwind CSS & PHP Native</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- Footer End -->
</body>

</html>