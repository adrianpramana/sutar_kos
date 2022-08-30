<?php
require 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('User baru berhasil ditambahkan!');
        window.location.replace('login.php');
        </script>";
    } else {
        mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="dist/output.css">
</head>

<body>

    <!-- Header -->
    <h1 class="text-4xl mb-16 font-bold flex justify-center pt-16">Halaman Registrasi</h1>
    <form action="" method="POST">
        <div class="mb-6 flex justify-center">
            <label class="block pt-2 pr-3 mb-2 text-sm font-medium text-dark" for="username">Username</label>
            <input class="shadow-sm bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5" type="text" name="username" id="username">
        </div>
        <div class="mb-6 flex justify-center">
            <label class="block pt-2 pr-3 mb-2 text-sm font-medium text-dark" for="password">Password</label>
            <input class="shadow-sm bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5" type="password" name="password" id="password">
        </div>
        <div class="mb-6 flex justify-center">
            <label class="block pt-2 pr-16 -mx-[52px] mb-2 text-sm font-medium text-dark" for="password2"> Confirm Password</label>
            <input class="shadow-sm bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5" type="password" name="password2" id="password2">
        </div>

        <div class="flex justify-center mr-[365px]">
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit" name="register">Register</button>
        </div>
    </form>
</body>

</html>