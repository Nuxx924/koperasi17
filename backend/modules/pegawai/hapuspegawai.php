<?php 
include "../../config/app.php"; 

    $idpegawai = (int)$_GET['idpegawai'];

    if (!hapus_pegawai($idpegawai) > 0) {
        echo "<script>
            alert('Data pegawai berhasil dihapus');
            document.location.href = 'datapegawai.php';
        </script>";
    } else {
        echo "<script>
            alert('Data pegawai gagal dihapus');
            document.location.href = 'datapegawai.php';
        </script>";
    }

?>