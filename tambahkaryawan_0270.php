<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Input Data Karyawan</title>
</head>

<body>
    <h2>Input Data Karyawan</h2>
    <a href="karyawan_0270.php" style="padding: 0.4% 0.8%; background-color: #009900; color: #fff; border-radius: 2px; text-decoration: none">Daftar Karyawan</a>

    <br><br>

    <form action="" method="post">
        <table>
            <tr>
                <td>Kode Karyawan</td>
                <td>:</td>
                <td><input type="text" name="kd_karyawan" placeholder="Kode Karyawan" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama" placeholder="Nama Lengkap" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" placeholder="Alamat" required></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="jk">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan" name="simpan"></td>
            </tr>
        </table>
    </form>

</body>

</html>

<?php
if (isset($_POST['simpan'])) {
    $kd_karyawan    = $_POST['kd_karyawan'];
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $jk             = $_POST['jk'];

    require 'koneksi_0270.php';

    $insert = mysqli_query($con, "INSERT INTO karyawan_0270(kd_karyawan, nama, alamat, tempat_lahir, tanggal_lahir, jk) VALUES ('$kd_karyawan','$nama',' $alamat','$tempat_lahir','$tanggal_lahir','$jk')");

    if ($insert) {
        echo 'Berhasil disimpan';
    } else {
        echo 'Gagal disimpan - ' . mysqli_error($con);
    }
}
?>