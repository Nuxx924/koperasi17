<?php

include '../../layout/header.php';
include '../../config/app.php';
include '../../config/database.php';

$idpegawai = (int)$_GET['id'];

$dataPegawai = select("SELECT * FROM pegawai WHERE idpegawai = $idpegawai")[0];

if (isset($_POST['ubah'])) {
    if (update_pegawai($_POST) > 0) {
        echo "<script>
            alert('Data pegawai berhasil diubah');
            document.location.href = 'datapegawai.php';
        </script>";
    } else {
        echo "<script>
            alert('Data pegawai gagal diubah');
            document.location.href = 'datapegawai.php';
        </script>";
    }
}

?>

<div class="container mt-5">
    <h1>
        <marquee behavior="" direction="">Edit Data Pegawai</marquee>
    </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="idpegawai" value="<?= $dataPegawai['idpegawai']; ?>">
        <div class="mb-3">
            <label for="namalengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="namalengkap" name="namalengkap" placeholder="Nama Lengkap.." value="<?= $dataPegawai['namalengkap']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="jk" class="form-label">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control" required>
                <option value="">--PILIH JENIS KELAMIN--</option>
                <option value="Laki-laki" <?php if ($dataPegawai['jk'] == 'Laki-laki') echo "selected"; ?>>Laki-laki</option>
                <option value="Perempuan" <?php if ($dataPegawai['jk'] == 'Perempuan') echo "selected"; ?>>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $dataPegawai['alamat']; ?>" placeholder="Alamat.." required>
        </div>
        <div class="mb-3">
            <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggallahir" value="<?= $dataPegawai['tanggallahir']; ?>" name="tanggallahir" required>
        </div>
        <button type="submit" name="ubah" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>