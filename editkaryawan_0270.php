<?php
//menyertakan file koneksi
require 'koneksi_0270.php';

//memeriksa ada atau tidak nilai yang dibawa GET
if (isset($_GET['kd_karyawan'])) {
    $kd_karyawan = $_GET['kd_karyawan'];

    //menjalankan query select data
    $query = mysqli_query($con, "SELECT * FROM karyawan_0270 WHERE kd_karyawan = '$kd_karyawan'");
    $hasil = mysqli_fetch_array($query);
} else {
    header('location: karyawan_0270.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Edit Data Karyawan</title>
</head>

<body>
    <h2>Edit Data Karyawan</h2>
    <a href="karyawan_0270.php" style="padding: 0.4% 0.8%; background-color: #009900; color: #fff; border-radius: 2px; text-decoration: none">Daftar Karyawan</a>

    <br><br>

    <form action="" method="post">
        <table>
            <tr>
                <td>Kode Karyawan</td>
                <td>:</td>
                <td><input type="text" name="kd_karyawan" placeholder="Kode Karyawan" value="<?= $hasil['kd_karyawan']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><input type="text" name="nama" placeholder="Nama Lengkap" value="<?= $hasil['nama']; ?>" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" placeholder="Alamat" value="<?= $hasil['alamat']; ?>" required></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><input type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $hasil['tempat_lahir']; ?>" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $hasil['tanggal_lahir']; ?>" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <select name="jk">
                        <option value="L" <?= ($hasil['jk'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= ($hasil['jk'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
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
    $kd_lama        = $_GET['kd_karyawan'];
    $kd_karyawan    = $_POST['kd_karyawan'];
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $tempat_lahir   = $_POST['tempat_lahir'];
    $tanggal_lahir  = $_POST['tanggal_lahir'];
    $jk             = $_POST['jk'];

    require 'koneksi_0270.php';

    $update = mysqli_query($con, "UPDATE karyawan_0270 SET kd_karyawan='$kd_karyawan',nama='$nama',alamat='$alamat',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',jk='$jk' WHERE kd_karyawan='$kd_lama'");

    if ($update) {
        echo 'Berhasil diperbarui';
    } else {
        echo 'Gagal diperbarui - ' . mysqli_error($con);
    }
}
?>