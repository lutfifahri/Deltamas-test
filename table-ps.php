<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Main content -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fas fa-th"></i> &nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#tambahData" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-plus"></i> Tambah</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped" width='100%'>
                <thead>
                    <tr class="table-primary">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th width='150'>
                            <center>
                                Status
                            </center>
                        </th>
                        <th>
                            <center>Opsi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $f4hri = mysqli_query($koneksi, "SELECT * FROM `ps` WHERE Tipe!='Z' ");
                    while ($a = mysqli_fetch_array($f4hri)) {
                        $kode = $a['KodeVendor'];
                        $isi = mysqli_query($koneksi, "SELECT * FROM `vendor` WHERE Kode = '$kode' ");
                        while ($aa = mysqli_fetch_array($isi)) {
                    ?>
                            <tr>
                                <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $no++; ?></td>
                                <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $aa['Nama']; ?></td>
                                <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $aa['Barang']; ?></td>
                                <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo  "Rp " . number_format($aa['Harga'], 2, ',', '.'); ?></td>
                                <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $aa['Jumlah']; ?></td>
                                <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $aa['Keterangan']; ?></td>
                                <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php
                                                                                                    if ($a['Status'] == '') {
                                                                                                        echo '<button type="submit" id="DeleteButton1" class="btn btn-primary btn-sm" value="' . $a['id'] . '">Ajukan Ke Manager...&nbsp; <i class="fas  fa-shopping-cart"></i></button>';
                                                                                                    } else if ($a['Status'] == 'A') {
                                                                                                        echo '<button class="btn btn-warning btn-sm" disabled="disabled">Menunggu Approved... <i class="fas fa-spinner"></i></button>';
                                                                                                    } else if ($a['Status'] == 'X') {
                                                                                                        echo '<button type="submit" id="" class="btn btn-primary btn-sm" disabled="disabled" value="' . $a['id'] . '">Retur Kembali...&nbsp; <i class="fas  fa-retweet"></i></button>';
                                                                                                    } else {
                                                                                                        echo '<button class="btn btn-success btn-sm" disabled="disabled">Berhasil Di Approved... <i class="fas fa-check-square"></i></button>';
                                                                                                    }
                                                                                                    ?></td>
                                <td style="padding-top:0; padding-bottom:0; vertical-align: middle">
                                    <center>
                                        <button type="submit" id="DeleteButton" class='btn btn-danger btn-sm' value="<?php echo $a['id']; ?>"><i class="fas fa-trash"></i></button>
                                    </center>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal -->
    <div id="tambahData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah PS (<em>Purchase Requisition</em>)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" autocomplete="off" id="formAdd" style="margin-bottom:0px">
                        <div class="form-group row" style="margin-bottom:8px">
                            <div class="col-sm-9">
                                <?php
                                $char = "ps";
                                # Mengambil data dengan kode yang paling besar
                                $query  = mysqli_query($koneksi, "SELECT max(Kode) as kodeTerbesar FROM `ps` WHERE Tipe!='Z' AND Kode LIKE '{$char}%' ORDER BY Kode DESC LIMIT 5");
                                $tampil = mysqli_fetch_array($query);
                                $KodeSiswa = $tampil['kodeTerbesar'];

                                # Mengambil angka dari Kode Siswa, Menggunakan fungsi substr
                                # dan diubah ke integer dengan (int)
                                $no =  substr($KodeSiswa, -3, 3);

                                #Bilangan yang diambil ini di tambah 1 untuk menentukan nomor urut berikutnya;
                                $no = (int) $no;

                                $no += 1;

                                # membentuk Kode Siswa baru
                                # perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                                # misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                                # angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya KDS 
                                $KodeSiswa = $char . sprintf("%03s", $no);
                                echo '<input type="hidden" class="form-control" name="Kode" value="' . $KodeSiswa . '" readonly required>';
                                ?>
                            </div>
                        </div>
                        <table id="tablecek" class="table table-bordered table-striped">
                            <thead>
                                <tr class="table-primary">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>
                                        <center><input type="checkbox" id="check-all" name=""></center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'koneksi.php';
                                $no = 1;
                                $f4hri = mysqli_query($koneksi, "SELECT * FROM `vendor` WHERE Tipe!='Z' AND Status!='V' ");
                                while ($a = mysqli_fetch_array($f4hri)) {
                                ?>
                                    <tr>
                                        <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $no++; ?></td>
                                        <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $a['Nama']; ?></td>
                                        <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $a['Barang']; ?></td>
                                        <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo  "Rp " . number_format($a['Harga'], 2, ',', '.'); ?></td>
                                        <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $a['Jumlah']; ?></td>
                                        <td style="padding-top:0; padding-bottom:0; vertical-align: middle"><?php echo $a['Keterangan']; ?></td>
                                        <td style="padding-top:0; padding-bottom:0; vertical-align: middle">
                                            <center>
                                                <input type="checkbox" class="checkbox" value="<?php echo $a['Kode']; ?>" name="KodeVendor[]">
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class=" modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary waves-effect" onclick="validation()">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal   -->

    <!-- Modal -->
    <div id="import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Import To Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="upload_aksi.php">
                        <div class="form-group row" style="margin-bottom:8px">
                            <label for="" class="col-sm-3 col-form-label">Nama File</label>
                            <div class="col-sm-9">
                                <input name="fileimport" type="file" required="required" class="form-control">
                            </div>
                        </div>
                        <div class=" modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal   -->

    <!-- Modal -->

    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>
    <!-- end Modal   -->

    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(document).ready(function() {
            $(".open_modal").click(function(e) {
                var m = $(this).attr("id");
                $.ajax({
                    url: "modal-vendor.php",
                    type: "GET",
                    data: {
                        id: m,
                    },
                    success: function(ajaxData) {
                        $("#ModalEdit").html(ajaxData);
                        $("#ModalEdit").modal('show', {
                            backdrop: 'true'
                        });
                    }
                });
            });
        });

        $(function() {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#tablecek').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function() { //Sama jika menggunakan $(document).ready(function(){

            $("#check-all").click(function() { // check all master-stok

                if ((this).checked == true) {

                    $('.checkbox').prop('checked', true);

                } else {

                    $('.checkbox').prop('checked', false);

                }

            });
        });
    </script>