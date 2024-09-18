<?php
include '../../layout/header.php';
include '../../config/app.php';
// Membatasi halaman sebelum login
session_start();
if (!isset($_SESSION['login'])) {
    echo "<script>
    alert('Silakan login terlebih dahulu');
    document.location.href='../../login.php';
    </script>";
    exit;
}
// Membatasi halaman sesuai user login
if ($_SESSION['level'] != 3) {
    echo "<script>
    alert('Anda harus login sebagai operator akun');
    document.location.href='../../index.php';
    </script>";
    exit;
}
if (isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
        alert('Data akun berhasil ditambahkan');
        document.location.href='dataakun.php';
        </script>";
    } else {
        echo "<script>
        alert('Data akun gagal ditambahkan');
        document.location.href='dataakun.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h1>
            <marquee>TAMBAH AKUN</marquee>
        </h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama..." required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username..." required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password..." required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-control" name="level" id="level">
                    <option value="">--PILIH LEVEL--</option>
                    <option value="1">Operator Pegawai</option>
                    <option value="2">Operator Unit</option>
                    <option value="3">Operator Akun</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Submit</button>
        </form>
    </div>
</body>
</html>