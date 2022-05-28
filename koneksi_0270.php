<?php
//menghubungkan web dengan basis data
$con = mysqli_connect('127.0.0.1', 'root', '', 'web2');

//memeriksa apakah ada kesalahan pada koneksi basis data dan menampilkan kesalahannya
if (mysqli_connect_errno() > 0) {
    echo 'Koneksi gagal, ada kesalahan: ' . mysqli_connect_error();
    exit();
}
