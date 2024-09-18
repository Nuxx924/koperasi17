<?php
include '../../layout/header.php';
include '../../config/app.php';

// Mengambil id akun dari URL
$idakun = (int)$_GET['idakun'];

// Query SQL
$data_akun = select("SELECT * FROM akun WHERE idakun = $idakun")[0];

if (isset($_POST['ubah'])) {
    if (update_akun($_POST) > 0) {
        echo "<script>
            alert('Data akun berhasil diubah');
            document.location.href = 'dataakun.php';
        </script>";
    } else {
        echo "<script>
            alert('Data akun gagal diubah');
            document.location.href = 'dataakun.php';
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
        <marquee>UBAH DATA AKUN</marquee>
    </h1>
    <form action="" method="post">
        <input type="hidden" name="idakun" value="<?= $data_akun['idakun']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data_akun['nama']; ?>" placeholder="Nama..." required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $data_akun['username']; ?>" placeholder="Username..." required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $data_akun['email']; ?>" placeholder="Email..." required>
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
        <button type="submit" class="btn btn-primary" name="ubah">Submit</button>
    </form>
</div>

</body>
</html>
