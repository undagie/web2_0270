<?php
function jenis_kelamin($jk)
{
    if ($jk == 'L') {
        $namajk = 'Laki-laki';
    } else {
        $namajk = 'Perempuan';
    }

    return $namajk;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Karyawan</title>
    <style>
        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <h2>Data Karyawan</h2>
    <a href="tambahkaryawan_0270.php" class="no-print" style="padding: 0.4% 0.8%; background-color: #009900; color: #fff; border-radius: 2px; text-decoration: none">Tambah Data</a>

    <br><br>

    <table border="1" cellspacing="0" width="100%">
        <tr style="background-color: #00ffff;">
            <th>No</th>
            <th>Kode Karyawan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th class="no-print">Opsi</th>
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
                    <td><?= date('d-m-Y', strtotime($hasil['tanggal_lahir'])); ?></td>
                    <td><?= jenis_kelamin($hasil['jk']); ?></td>
                    <td class="no-print">
                        <a href="editkaryawan_0270.php?kd_karyawan=<?= $hasil['kd_karyawan']; ?>">Edit</a> ||
                        <a href="hapuskaryawan_0270.php?kd_karyawan=<?= $hasil['kd_karyawan']; ?>" onclick="javacript: return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo '<tr><td style="text-align: center;" colspan="8">Data tidak ada</td></tr>';
        }
        ?>

    </table>

    <br>

    <a href="#" class="no-print" onclick="window.print()" style="padding: 0.4% 0.8%; background-color: #0000FF; color: #fff; border-radius: 2px; text-decoration: none">Cetak</a>
    <a href="cetakkaryawan_0270.php" class="no-print" style="padding: 0.4% 0.8%; background-color: #0000FF; color: #fff; border-radius: 2px; text-decoration: none" target="_blank">Cetak PDF</a>
    <a href="cetakexcelkaryawan_0270.php" class="no-print" style="padding: 0.4% 0.8%; background-color: #0000FF; color: #fff; border-radius: 2px; text-decoration: none" target="_blank">Cetak EXCEL</a>
</body>

</html>