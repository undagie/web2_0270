<?php
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Karyawan.xls");
?>

<h2>PT. MAJU SUKSES MANDIRI</h2>
<h3>Alamat Jl. Pelabuhan Laut No. 5 Banjarmasin Selatan</h3>
<h5>Telp:(0511)335213, HP: 08535775699</h5>
<h3>Data Karyawan</h3>

<table border="1" cellspacing="0" width="100%">
    <tr style="background-color: #00ffff;">
        <th>No</th>
        <th>Kode Karyawan</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
    </tr>
    <?php
    //menyertakan file koneksi
    //include 'koneksi_tidak_ada.php';

    require 'koneksi_0270.php';
    //require_once 'koneksi_0270.php';

    //menjalankan query ambil data
    $select = mysqli_query($con, 'SELECT * FROM karyawan_0270');
    $no = 1;

    //mengambil nilai banyaknya jumlah baris dari query dan
    //memeriksa kondisi jika lebih dari nol maka tampilkan data
    if (mysqli_num_rows($select) > 0) {
        //perulangan untuk menampilkan data hasil dari query
        while ($hasil = mysqli_fetch_array($select)) {
    ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $hasil['kd_karyawan']; ?></td>
                <td><?= $hasil['nama']; ?></td>
                <td><?= $hasil['alamat']; ?></td>
                <td><?= $hasil['tempat_lahir']; ?></td>
                <td><?= $hasil['tanggal_lahir']; ?></td>
                <td><?= $hasil['jk']; ?></td>
            </tr>
    <?php
        }
    } else {
        echo '<tr><td style="text-align: center;" colspan="8">Data tidak ada</td></tr>';
    }
    ?>

</table>