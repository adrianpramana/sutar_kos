<?php
// Database Connection
$conn = mysqli_connect("localhost", "root", "", "sutar_kos");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $ktp = htmlspecialchars($data["ktp"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    // Upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Insert Data
    $query = "INSERT INTO pelanggan VALUES
    ('', '$nama', '$email', '$jenis_kelamin', '$ktp', '$no_hp', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // Pengecekan gambar
    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu');
        </script>
        ";
        return false;
    }

    // Mengecek tipe gambar yang diupload
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Yang Anda upload bukan gambar!')
        </script>
        ";
        return false;
    }

    // Pengecekan jika ukuran gambar terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('Ukuran gambar terlalu besar!');
        </script>
        ";
        return false;
    }

    // Pengecekan gambar jika sudah memenuhi ketentuan dan aturan

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pelanggan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $ktp = htmlspecialchars($data["ktp"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // Mengecek apakah gambar baru atau lama.
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }



    $query = "UPDATE pelanggan SET 
    nama = '$nama',
    email = '$email',
    jenis_kelamin = '$jenis_kelamin',
    ktp = '$ktp',
    no_hp = '$no_hp',
    gambar = '$gambar'

    WHERE id = $id
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{

    $query = "SELECT * FROM pelanggan 
        WHERE
        nama LIKE '%$keyword%' OR
        email LIKE '%$keyword%' OR
        jenis_kelamin LIKE '%$keyword%' OR
        ktp LIKE '%$keyword%' OR
        no_hp LIKE '%$keyword%' 
        ";
    return query($query);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Mengecek username if exist
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username =
    '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert('Username sudah terdaftar!');
        </script>
        ";
        return false;
    }

    // Mengecek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('Konfirmasi password tidak sesuai!');
        </script>
        ";
        return false;
    }

    // Encryption Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Menambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
