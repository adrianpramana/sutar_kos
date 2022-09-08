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
    <div class="flex items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 bg-gray-100">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tighter text-gray-900 md:text-2xl dark:text-white text-center">Registration Form
                </h1>
                <form class="space-y-4 md:space-y-6" action="" method="POST">
                    <div>
                        <label class="block pt-2 pr-3 mb-2 text-sm font-medium text-dark" for="username">Username</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5" type="text" name="username" id="username">
                    </div>
                    <div>
                        <label class="block pt-2 pr-3 mb-2 text-sm font-medium text-dark" for="password">Password</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5" type="password" name="password" id="password">
                    </div>
                    <div>
                        <label class="block pt-2 pr-3 mb-2 text-sm font-medium text-dark" for="password2"> Confirm Password</label>
                        <input class="shadow-sm bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5" type="password" name="password2" id="password2">
                    </div>
                    <button onclick="registrationSuccess()" class="w-full text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm py-2.5 text-center" type="submit" name="register">Register</button>
            </div>
        </div>
        </form>
    </div>
    </div>

    <script>
        function registrationSuccess() {
            alert("Registration Success!");
        }
    </script>
</body>

</html>