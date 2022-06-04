<?php
require 'fpdf184/fpdf.php';

//FPDF pdf = new FPDF();
//pdf.AddPage();

//membuat objek dari class FPDF
$pdf = new FPDF();
//menambahkan halaman baru
$pdf->AddPage();
//mengatur jenis, style, dan ukuran font
$pdf->SetFont('Arial', 'B', 16);
//membuat tulisan dalam satu bari
$pdf->Cell(0, 5, 'PT. MAJU SUKSES MANDIRI', 0, 1, 'C', false);
$pdf->SetFont('Arial', 'i', 8);
$pdf->Cell(0, 5, 'Alamat Jl. Pelabuhan Laut No. 5 Banjarmasin Selatan', 0, 1, 'C', false);
$pdf->SetFont('Arial', 'i', 6);
$pdf->Cell(0, 5, 'Telp:(0511)335213, HP: 08535775699', 0, 1, 'C', false);
//membuat line break (jarak ke bawah)
$pdf->Ln(3);
$pdf->Cell(190, 0.6, '', 0, 1, 'C', true);
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 5, 'LAPORAN DATA KARYAWAN', 0, 1, 'C', false);
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(10, 6, 'No', 1, 0, 'C');
$pdf->Cell(20, 6, 'Kode Karyawan', 1, 0, 'C');
$pdf->Cell(35, 6, 'Nama', 1, 0, 'C');
$pdf->Cell(35, 6, 'Alamat', 1, 0, 'C');
$pdf->Cell(35, 6, 'Tempat Lahir', 1, 0, 'C');
$pdf->Cell(35, 6, 'Tanggal Lahir', 1, 0, 'C');
$pdf->Cell(20, 6, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Ln(2);

//mengambil file koneksi
require 'koneksi_0270.php';


//menjalankan query
$select = mysqli_query($con, "SELECT * FROM karyawan_0270");
$no = 1;

//mengambil nilai banyaknya baris
if (mysqli_num_rows($select) > 0) {
    //mengambil data baris
    while ($hasil = mysqli_fetch_array($select)) {
        $pdf->Ln(4);
        $pdf->SetFont('Arial', '', 7);
        $pdf->Cell(10, 4, $no++, 1, 0, 'C');
        $pdf->Cell(20, 4, $hasil['kd_karyawan'], 1, 0, 'C');
        $pdf->Cell(35, 4, $hasil['nama'], 1, 0, 'L');
        $pdf->Cell(35, 4, $hasil['alamat'], 1, 0, 'L');
        $pdf->Cell(35, 4, $hasil['tempat_lahir'], 1, 0, 'L');
        $pdf->Cell(35, 4, $hasil['tanggal_lahir'], 1, 0, 'C');
        $pdf->Cell(20, 4, $hasil['jk'], 1, 0, 'C');
    }
} else {
    $pdf->Ln(4);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(190, 4, 'Data Tidak Ada', 1, 0, 'C');
}

//menampilkan hasil laporannya
$pdf->Output('Laporan Karyawan.pdf', 'I');
