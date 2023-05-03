<?php
include "koneksi.php";
switch ($_GET['action']) {
    case 'save':

        $Kode             = $_POST['Kode'];
        $KodeVendor       = $_POST['KodeVendor'];
        $Tanggal            = date('Y-m-d');

        $cekkode    = mysqli_num_rows(mysqli_query($koneksi, "SELECT Kode FROM `ps` WHERE Kode='$_POST[Kode]'AND Tipe!='Z' "));
        if ($cekkode > 0) {
            echo 1;       # MAAF JIKA KODE ADA YANG SAMA TIDAK BISA TERSIMPAN 
        } else {
            # melakukan perulangan sebanyak yang di inginkan
            for ($i = 0; $i <= count($KodeVendor) - 1; $i++) {
                # insert data yang di inginkan
                $query = mysqli_query($koneksi, "INSERT INTO `ps` (`id`, `Kode`, `KodeVendor`, `Tanggal`, `Tipe`) VALUES ('','$Kode','$KodeVendor[$i]','$Tanggal', '')");

                $updt  = mysqli_query($koneksi, "UPDATE `vendor` SET Status = 'V' WHERE Kode = '$KodeVendor[$i]' ");
                // echo "UPDATE `vendor` SET Tipe = 'Z' WHERE Kode = '$KodeVendor[$i]' ";
                // echo "INSERT INTO `ps` (`id`, `Kode`, `KodeVendor`, `Tipe`) VALUES ('','$Kode','$KodeVendor[$i]', '')";
            }
        };


        break;


    case 'edit':
        $id         = $_POST['id'];
        # update
        $query = mysqli_query($koneksi, "UPDATE `ps` SET Status = 'A' WHERE id='$id'");

        $ps     = mysqli_query($koneksi, "SELECT * FROM `ps` WHERE Tipe!='Z' AND id='$id' ");
        $aa     = mysqli_fetch_array($ps);
        $kode   = $aa['KodeVendor'];
        $Tanggal            = date('Y-m-d');

        $querySanz = mysqli_query($koneksi, "INSERT INTO `po` (`id`, `KodeVendor`, `Tanggal`, `Tipe`) VALUES ('', '$kode', '$Tanggal', '') ");
        // echo "INSERT INTO `po` (`id`, `KodeVendor`, `Tipe`) VALUES ('', '$kode', '') ";
        echo 'success';
        break;

    case 'delete':
        $id = $_POST['id'];

        $ps     = mysqli_query($koneksi, "SELECT * FROM `ps` WHERE Tipe!='Z' AND id='$id' ");
        $aa     = mysqli_fetch_array($ps);
        $kode   = $aa['KodeVendor'];

        $query  = mysqli_query($koneksi, "UPDATE `ps` SET  Tipe = 'Z' WHERE  id='$id'");
        $query1 = mysqli_query($koneksi, "UPDATE `po` SET  Tipe = 'Z' WHERE  KodeVendor='$kode'");

        echo 'success';
        break;
}
