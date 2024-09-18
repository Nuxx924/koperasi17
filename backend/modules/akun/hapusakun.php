<?php
include "../../config/app.php";

// Memilih idakun
$idakun = (int)$_GET['idakun'];

if (delete_akun($idakun) > 0) {
    echo "<script>
    alert('Data akun berhasil dihapus');
    document.location.href='dataakun.php';
    </script>";
} else {
    echo "<script>
    alert('Data akun gagal dihapus');
    document.location.href='dataakun.php';
    </script>";
}
