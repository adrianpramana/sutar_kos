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
    header("Location: index.php");
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

            header("Location: index.php");
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
</head>

<body>
    <?php if (isset($error)) :  ?>
        <p style="color: red; font-style:italic;">Username / Password salah!</p>
    <?php endif; ?>

    <h1>Please Login</h1>

    <form action="" method="POST">

        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </li>

            <li>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </li>

            <li>
                <label for="remember">Remember</label>
                <input type="checkbox" name="remember" id="remember">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>

            <li>
                <a href="registrasi.php">Register Now</a>
            </li>
        </ul>
    </form>
</body>

</html>