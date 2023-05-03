<?php
// memanggil library FPDF
require('library/fpdf.php');
include 'koneksi.php';

class Pdf extends FPDF
{
    function letak($gambar)
    {
        //memasukkan gambar untuk header
        $this->Image($gambar, 10, 10, 50, 25);
        //menggeser posisi sekarang
    }

    function judul($teks1, $teks2, $teks3, $teks4, $teks5)
    {
        $this->Cell(25);
        $this->SetFont('Times', 'B', '12');
        $this->Cell(0, 5, $teks1, 0, 1, 'C');
        $this->Cell(25);
        $this->Cell(0, 5, $teks2, 0, 1, 'C');
        $this->Cell(25);
        $this->SetFont('Times', 'B', '8');
        $this->Cell(0, 5, $teks3, 0, 1, 'C');
        $this->Cell(25);
        $this->SetFont('Times', 'I', '8');
        $this->Cell(0, 5, $teks4, 0, 1, 'C');
        $this->Cell(25);
        $this->Cell(0, 2, $teks5, 0, 1, 'C');
    }

    function garis()
    {
        $this->SetLineWidth(1);
        $this->Line(10, 36, 200, 36);
        $this->SetLineWidth(0);
        $this->Line(10, 37, 200, 37);
    }
}

//instantisasi objek

$pdf = new Pdf();

//Mulai dokumen

$pdf->AddPage('P', 'A4');

//meletakkan gambar
$pdf->letak('LOGO-DELTA-MAS.png');

//meletakkan judul disamping logo diatas
$pdf->judul('DELTAMAS', 'Toyota Authorized', 'Jl. Balaikota No. 2A Medan, Sumatera Utara, Indonesia 20111', ' Phone: 061-4525555. Fax: 061-4520085. Kategori: Bengkel, Bengkel Toyota', '');

//membuat garis ganda tebal dan tipis
$pdf->garis();

$tglawal    = $_GET['tgl1'];
$tglakhir   = $_GET['tgl2'];

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(10, 7, 'NO', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nama Vendor', 1, 0, 'C');
$pdf->Cell(70, 7, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(35, 7, 'Qty', 1, 0, 'C');
$pdf->Cell(35, 7, 'Harga', 1, 0, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$no = 1;
if (isset($_GET['tgl1']) || isset($_GET['tgl2'])) {
    $tglawal    = $_GET['tgl1'];
    $tglakhir   = $_GET['tgl2'];
    // tampilkan data yang sesuai dengan range tanggal yang dicari 
    $data = mysqli_query($koneksi, "SELECT * FROM `po` WHERE (Tanggal BETWEEN '$tglawal' AND '$tglakhir') AND Tipe ='Z' ");
} else {
    //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
    $data = mysqli_query($koneksi, "SELECT * FROM `po` AND Tipe ='Z' ");
}
// while digunakan sebagai perulangan data 
while ($d = mysqli_fetch_array($data)) {
    $kode = $d['KodeVendor'];
    $sklh = mysqli_query($koneksi, "SELECT * FROM `vendor` WHERE Kode = '$kode' ");
    while ($a = mysqli_fetch_array($sklh)) {
        $pdf->Cell(10, 6, $no++, 1, 0, 'C');
        $pdf->Cell(40, 6, $a['Nama'], 1, 0, 'C');
        $pdf->Cell(70, 6, $a['Barang'], 1, 0, '');
        $pdf->Cell(35, 6, $a['Jumlah'], 1, 0, '');
        $pdf->Cell(35, 6,  "Rp " . number_format($a['Harga'], 2, ',', '.'), 1, 1);
    }
}

# meletakan ttd
$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(45, 7, 'Admin ,', 0, 0, 'C');
$pdf->Cell(105, 7, '', 0, 0, 'C');
$pdf->Cell(40, 7, 'Manager ,', 0, 0, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(45, 7, '', 0, 0, 'C');
$pdf->Cell(105, 7, '', 0, 0, 'C');
$pdf->Cell(40, 7, '', 0, 0, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(45, 7, '(                                )', 0, 0, 'C');
$pdf->Cell(105, 7, '', 0, 0, 'C');
$pdf->Cell(40, 7, '(                                )', 0, 0, 'C');

// $pdf->Output();
$pdf->Output('kopsurat.pdf', 'I');
