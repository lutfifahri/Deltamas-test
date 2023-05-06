<style>
    td {
        font: 11pt "Tahoma";
    }
</style>

<?php
include 'koneksi.php';

$tglawal    = $_POST['tgl1'];
$tglakhir   = $_POST['tgl2'];

function formatTanggal($dateawl)
{
    // ubah string menjadi format tanggal
    return date('d-m-Y', strtotime($dateawl));
}

$ctglaw =  formatTanggal($tglawal);
$ctglak =  formatTanggal($tglakhir);
date_default_timezone_set('Asia/Jakarta');

?>

<table width="100%" border="0">
    <tr>
        <td height="27">
            <h5>
                <center><strong>LAPORAN Retur</strong> <a href="pdf_laporanRetur.php?tgl1=<?php echo $tglawal; ?>&tgl2=<?php echo $tglakhir; ?>" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</a></center>
            </h5>
        </td>
    </tr>
    <tr>
        <td>
            <b>
                <center>Tanggal <?php echo $ctglaw; ?> s/d <?php echo $ctglak; ?> </center>
            </b>
        </td>
    </tr>
</table>

&nbsp;

<table width="100%" border="0">
    <tr style="border-top: 2px solid ; border-bottom: 2px solid ;">
        <th width="3%">No</th>
        <th width="8%">Nama Vendor</th>
        <th width="35%">Nama Barang</th>
        <th width="6%">Qty</th>
        <th width="7%">Harga</th>
    </tr>
</table>

<table width="100%" border="0">
    <?php
    if (isset($_POST['tgl1']) || isset($_POST['tgl2'])) {
        $tglawal    = $_POST['tgl1'];
        $tglakhir   = $_POST['tgl2'];
        // tampilkan data yang sesuai dengan range tanggal yang dicari 
        $data = mysqli_query($koneksi, "SELECT * FROM `po` WHERE (Tanggal BETWEEN '$tglawal' AND '$tglakhir') AND Tipe ='V' ");
    } else {
        //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh data
        $data = mysqli_query($koneksi, "SELECT * FROM `po` AND Tipe ='V' ");
    }
    // $no digunakan sebagai penomoran 
    $no = 1;
    // while digunakan sebagai perulangan data 
    while ($d = mysqli_fetch_array($data)) {
        $kode = $d['KodeVendor'];
        $sklh = mysqli_query($koneksi, "SELECT * FROM `vendor` WHERE Kode = '$kode' ");
        while ($a = mysqli_fetch_array($sklh)) {
    ?>
            <tr>
                <td width="3%"><?php echo $no++; ?></td>
                <td width="8%"><?php echo $a['Nama']; ?></td>
                <td width="35%"><?php echo $a['Barang']; ?></td>
                <td width="6%"><?php echo $a['Jumlah']; ?></td>
                <td width="7%"><?php echo $hasil_rupiah = "Rp." . number_format($a['Harga'], 2, ',', '.'); ?></td>
            </tr>
    <?php }
    } ?>
</table>

<table width="100%" border="0">
    <tr style="border-top: 2px solid ; border-bottom: 2px solid ;">
        <td align="right">
            &nbsp;
        </td>
    </tr>
</table>