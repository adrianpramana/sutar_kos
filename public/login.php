<?php
session_start();
require 'function.php';

// Mengecek Cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // Mengambil username berdasarkan ID
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    // Mengecek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

// Mengecek Session
if (isset($_SESSION["login"])) {
    header("Location: clients.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;

            if (isset($_POST["remember"])) {
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: clients.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="dist/output.css">
</head>

<body>
    <?php if (isset($error)) :  ?>
        <div id="close-alert" class="flex w-1/2 mx-auto p-4 my-3 bg-red-100 border-t-4 border-red-500 dark:bg-red-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-red-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
            </svg>
            <div class="ml-3 text-sm font-medium text-red-700">
                Mohon maaf <a href="#" class="font-semibold hover:text-red-800">Username atau Password</a> Anda salah!
            </div>
            <button type="button" class="alert-del ml-auto -mx-1.5 -my-1.5 bg-red-100 dark:bg-red-200 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 dark:hover:bg-red-300 inline-flex h-8 w-8" data-dismiss-target="#alert-border-2" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    <?php endif; ?>

    <!-- Header -->
    <div class="flex items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 bg-gray-100">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-700 dark:border-gray-800">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">Please Login</h1>
                <form class="space-y-4 md:space-y-6" action="" method="POST">
                    <div class="">
                        <label for="username" class="block mb-2 pt-2 pr-3 text-sm font-medium text-dark">Username</label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5" name="username" id="username">
                    </div>

                    <div class="">
                        <label for="password" class="block pt-2 pr-3 mb-2 text-sm font-medium text-dark ">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5">
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input type="checkbox" name="remember" id="remember" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary dark:ring-offset-gray-800">
                            </div>
                            <div class="ml-3 text-sm">
                                <label class="text-gray-500 dark:text-gray-300" for="remember">Remember</label>
                            </div>
                        </div>
                        <a href="#" class="text-sm font-medium text-primary hover:underline">Forgot Password?</a>
                    </div>
                    <button onclick="loginSuccess()" type="submit" class="w-full text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary font-medium rounded-lg text-sm py-2.5 text-center" name="login">Login</button>
            </div>
            <p class="p-3 text-center  text-sm text-gray-500 font-light">If you haven't registered yet, please register first
                <a class="font-medium text-primary hover:underline" href="registrasi.php">Register Now</a>
            </p>
            </form>
        </div>
    </div>
    </div>
    <script>
        const closeAlert = document.querySelector('#close-alert');
        var alertDel = document.querySelectorAll('.alert-del');
        alertDel.forEach((x) => x.addEventListener('click', function() {
            x.parentElement.classList.add('hidden');
        }));
    </script>
    <script>
        function loginSuccess() {
            alert("Login Success!");
        }
    </script>

</body>

</html>