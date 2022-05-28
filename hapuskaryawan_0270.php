<?php
//menyertakan file koneksi
include 'koneksi_0270.php';

//memeriksa ada atau tidak nilai yang dibawa GET
if (isset($_GET['kd_karyawan'])) {
    $kd_karyawan = $_GET['kd_karyawan'];

    //menjalankan query hapus data
    mysqli_query($con, "DELETE FROM karyawan_0270 WHERE kd_karyawan = '$kd_karyawan'");
}

//mengarahkan/pindah ke halaman sesuai nilai location
header('location: karyawan_0270.php');
