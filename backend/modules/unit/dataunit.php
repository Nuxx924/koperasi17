<?php

include '../../layout/header.php';

    session_start();
    if (!isset($_SESSION['login'])) {
        echo "<script>
        alert('Silakan login terlebih dahulu');
        document.location.href='../../login.php';
        </script>";
        exit;
    }
    // Membatasi halaman sesuai user login
    if ($_SESSION['level'] != 2) {
        echo "<script>
        alert('Anda harus login sebagai operator unit');
        document.location.href='../../index.php';
        </script>";
        exit;
    }
    include "../../config/database.php";

?>

<h2 class="text-center mt-3 mb-3">Data Unit</h2>