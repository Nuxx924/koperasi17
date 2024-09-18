<?php
session_start();

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Alihkan ke halaman login
echo "<script>
    alert('Anda telah berhasil logout');
    document.location.href='login.php';
    </script>";
exit;
