    <?php
    require 'koneksi.php';
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Reader\Csv;
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

    $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    if (isset($_FILES['fileimport']['name']) && in_array($_FILES['fileimport']['type'], $file_mimes)) {

        $arr_file = explode('.', $_FILES['fileimport']['name']);
        $extension = end($arr_file);

        if ('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($_FILES['fileimport']['tmp_name']);

        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        for ($i = 1; $i < count($sheetData); $i++) {
            $Kode       = $sheetData[$i]['1'];
            $Nama       = $sheetData[$i]['2'];
            $Barang     = $sheetData[$i]['3'];
            $Harga      = $sheetData[$i]['4'];
            $Jumlah     = $sheetData[$i]['5'];
            $Keterangan = $sheetData[$i]['6'];
            $Tanggal    = $sheetData[$i]['7'];

            mysqli_query($koneksi, "INSERT INTO `vendor` (`id`, `Kode`, `Nama`, `Barang`, `Harga`, `Jumlah`, `Keterangan`, `Tanggal`, `Tipe`) values ('','$Kode','$Nama','$Barang', '$Harga', '$Jumlah', '$Keterangan', '$Tanggal', '')");
        }
        header("Location: barang");
    }
    ?>