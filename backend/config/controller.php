<?php

include "database.php";


function select($query) 
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function create_akun($post) 
{
    global $db;
    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $pass = strip_tags($post['password']);
    $level = strip_tags($post['level']);
    
    // Enkripsi password
    $password = password_hash($pass, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO akun 
              VALUES (null, '$nama', '$username', '$email', '$password', '$level')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function update_akun($post) {
    global $db;
    $idakun = strip_tags($post['idakun']);
    $nama = strip_tags($post['nama']);
    $username = strip_tags($post['username']);
    $email = strip_tags($post['email']);
    $level = strip_tags($post['level']);

    // Query update akun
    $query = "UPDATE akun SET nama='$nama', username='$username', email='$email', level='$level' WHERE idakun=$idakun";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function delete_akun($idakun)
{
    global $db;
    // Query hapus data
    $query = "DELETE FROM akun WHERE idakun=$idakun";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function create_pegawai($post) 
{
    global $db;
    $namalengkap = strip_tags($post['namalengkap']);
    $jk = strip_tags($post['jk']);
    $alamat = strip_tags($post['alamat']);
    $tanggallahir = strip_tags($post['tanggallahir']);
    
    
    $query = "INSERT INTO pegawai VALUES (null, '$namalengkap', '$jk', '$alamat', '$tanggallahir')";
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}


function update_pegawai($post) {
    global $db;
    $idpegawai = strip_tags($post['idpegawai']);
    $namalengkap = strip_tags($post['namalengkap']);
    $jk = strip_tags($post['jk']);
    $alamat = strip_tags($post['alamat']);
    $tanggallahir = strip_tags($post['tanggallahir']);


    $query = "UPDATE pegawai SET namalengkap='$namalengkap', jk='$jk', alamat='$alamat', tanggallahir='$tanggallahir' WHERE idpegawai=$idpegawai";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function hapus_pegawai($idpegawai)
{
    global $db;
  
    $query = "DELETE FROM pegawai WHERE idpegawai=$idpegawai";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}