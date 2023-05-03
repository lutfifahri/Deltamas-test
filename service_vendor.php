<?php
include "koneksi.php";
switch ($_GET['action']) {
    case 'save':
        $Kode       = $_POST['Kode'];
        $Nama       = $_POST['Nama'];
        $Barang     = $_POST['Barang'];
        $Harga      = $_POST['Harga'];
        $Jumlah     = $_POST['Jumlah'];
        $Keterangan = $_POST['Keterangan'];
        $Tanggal    = $_POST['Tanggal'];

        $cekkode    = mysqli_num_rows(mysqli_query($koneksi, "SELECT Kode FROM vendor WHERE Kode='$_POST[Kode]'AND Tipe!='Z' "));
        if ($cekkode > 0) {
            echo 1;       # MAAF JIKA KODE ADA YANG SAMA TIDAK BISA TERSIMPAN 
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO vendor (`id`, `Kode`, `Nama`, `Barang`, `Harga`, `Jumlah`, `Keterangan`, `Tanggal`, `Tipe`) VALUES ('','$Kode','$Nama', '$Barang', '$Harga', '$Jumlah', '$Keterangan', '$Tanggal', '')");
        }
        break;


    case 'edit':
        $id         = $_POST['id'];
        $Nama       = $_POST['Nama'];
        $Barang     = $_POST['Barang'];
        $Harga      = $_POST['Harga'];
        $Jumlah     = $_POST['Jumlah'];
        $Keterangan = $_POST['Keterangan'];
        $Tanggal    = $_POST['Tanggal'];

        # update
        $query = mysqli_query($koneksi, "UPDATE `vendor` SET Nama='$Nama', Barang='$Barang', Harga='$Harga', Jumlah='$Jumlah', Keterangan = '$Keterangan', Tanggal='$Tanggal' WHERE id='$id'");

        break;

    case 'delete':
        $id = $_POST['id'];

        $query = mysqli_query($koneksi, "UPDATE `vendor` SET  Tipe = 'Z' WHERE  id='$id'");

        echo 'success';
        break;
}
