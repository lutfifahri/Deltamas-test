<?php
include "koneksi.php";
switch ($_GET['action']) {
    case 'edit':
        $id         = $_POST['id'];
        # update
        $ps         = mysqli_query($koneksi, "SELECT * FROM `po` WHERE Tipe!='Z' AND id='$id' ");
        $aa         = mysqli_fetch_array($ps);
        $kode       = $aa['KodeVendor'];
        $Tanggal    = date('Y-m-d');

        $querySanz = mysqli_query($koneksi, "UPDATE `ps` SET Tanggal='$Tanggal', Status ='B' WHERE KodeVendor='$kode'");
        $query = mysqli_query($koneksi, "UPDATE `po` SET Tanggal='$Tanggal', Tipe = 'Z' WHERE KodeVendor='$kode'");

        // echo "UPDATE `ps` SET Tipe = 'B' WHERE KodeVendor='$kode'";
        // echo "UPDATE `po` SET Tipe = 'Z' WHERE id='$id'";
        echo 'success';
        break;

    case 'edit1':
        $id         = $_POST['id'];
        # update
        $ps         = mysqli_query($koneksi, "SELECT * FROM `po` WHERE Tipe!='Z' AND id='$id' ");
        $aa         = mysqli_fetch_array($ps);
        $kode       = $aa['KodeVendor'];
        $Tanggal    = date('Y-m-d');

        $querySanz = mysqli_query($koneksi, "UPDATE `ps` SET Tanggal='$Tanggal', Status ='X' WHERE KodeVendor='$kode'");
        $query = mysqli_query($koneksi, "UPDATE `po` SET Tanggal='$Tanggal', Tipe = 'V' WHERE KodeVendor='$kode'");

        // echo "UPDATE `ps` SET Tipe = 'B' WHERE KodeVendor='$kode'";
        // echo "UPDATE `po` SET Tipe = 'Z' WHERE id='$id'";
        echo 'success';
        break;

    case 'delete':
        $id = $_POST['id'];

        $query = mysqli_query($koneksi, "UPDATE `ps` SET  Tipe = 'Z' WHERE  id='$id'");

        echo 'success';
        break;
}
