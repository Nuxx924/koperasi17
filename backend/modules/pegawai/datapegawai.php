<?php

include '../../layout/header.php';
include '../../config/app.php';

$stokDataPerhalaman = 5;
$stokData = count(select("SELECT * FROM pegawai"));
$stokHalaman = ceil($stokData / $stokDataPerhalaman);
$halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$awalData = ($stokDataPerhalaman * $halamanAktif) - $stokDataPerhalaman;

$dataPegawai = select("SELECT * FROM pegawai ORDER BY idpegawai DESC LIMIT $awalData, $stokDataPerhalaman");

session_start();
if (!isset($_SESSION['login'])) {
    echo "<script>
    alert('Silakan login terlebih dahulu');
    document.location.href='../../login.php';
    </script>";
    exit;
}
// Membatasi halaman sesuai user login
if ($_SESSION['level'] != 1) {
    echo "<script>
    alert('Anda harus login sebagai operator pegawai');
    document.location.href='../../index.php';
    </script>";
    exit;
}
include "../../config/database.php";

?>

<h2 class="text-center mt-3 mb-3">Data Pegawai</h2>
<div class="container">
    <a href="tambahpegawai.php"  class="btn btn-primary">Tambah</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Pegawai</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
        </tr>
            </thead>
        <tbody>
            <?php 
            $no = 1;
            ?>
            <?php foreach ($dataPegawai as $pegawai) : ?>
                <tr>
                    <td><?= $pegawai['idpegawai']; ?></td>
                    <td><?= $pegawai['namalengkap']; ?></td>
                    <td><?= $pegawai['jk']; ?></td>
                    <td><?= $pegawai['alamat']; ?></td>
                    <td><?= date('Y-m-d', strtotime($pegawai['tanggallahir'])) ; ?></td>
                    <td>
                        <a href="editpegawai.php?id=<?= $pegawai['idpegawai']; ?>" class="btn btn-warning">Edit</a>
                        <a href="hapuspegawai.php?id=<?= $pegawai['idpegawai']; ?>" class="btn btn-danger" onclick="return confirm('anda yakan akan menghapus ini')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mt2 justify-content-end d-flex">
        <nav aria-label="page navigation example">
            <ul class="pagination">
                <?php if ($halamanAktif > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Sebelumnya</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $stokHalaman; $i++) : ?>
                 <li class="page-item <?= ($i == $halamanAktif) ? 'active' : ''; ?>">
                    <a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
                </li>
                <?php endfor; ?>

                <?php if ($halamanAktif < $stokHalaman) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Selanjutnya</span>
                        </a>
                    </li>
                    <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>


