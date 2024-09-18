<?php
include "../../config/database.php";
include '../../layout/header.php';
include '../../config/app.php';

// Periksa koneksi database
if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST['tambah'])) {
    $namalengkap = mysqli_real_escape_string($db, $_POST['namalengkap']);
    $jk = mysqli_real_escape_string($db, $_POST['jk']);
    $alamat = mysqli_real_escape_string($db, $_POST['alamat']);
    $tanggallahir = mysqli_real_escape_string($db, $_POST['tanggallahir']);
    
    $query = "INSERT INTO pegawai (namalengkap, jk, alamat, tanggallahir) VALUES ('$namalengkap', '$jk', '$alamat', '$tanggallahir')";
    
    if (mysqli_query($db, $query)) {
        echo "<script>
        alert('Data pegawai berhasil ditambahkan');
        document.location.href='datapegawai.php';
        </script>";
    } else {
        echo "<script>
        alert('Data pegawai gagal ditambahkan: " . mysqli_error($db) . "');
        </script>";
    }
}
?>

<div class="container mt-5">
    <h1>
        <marquee behavior="" direction="">Tambah Data Pegawai</marquee>
    </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="namalengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="namalengkap" name="namalengkap" placeholder="Nama Lengkap.." required>
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control" required>
                <option value="">--PILIH JENIS KELAMIN--</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat.." required>
        </div>
        <div class="mb-3">
            <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
    </form>
</div>