<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<!-- Main content -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fas fa-th"></i> &nbsp;&nbsp;
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
                        <th width='210'>
                            <center>
                                Status
                            </center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $no = 1;
                    $f4hri = mysqli_query($koneksi, "SELECT * FROM `po` WHERE Tipe!='Z' AND Tipe!='V' ");
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
                                                                                                    if ($a['Tipe'] == '') {
                                                                                                        echo '<button type="submit" id="DeleteButton1" class="btn btn-primary btn-sm" value="' . $a['id'] . '">Approved ...&nbsp; <i class="fas fa-check-square"></i></button>';
                                                                                                    }
                                                                                                    ?>
                                    <button type="submit" id="DeleteButton" class="btn btn-danger btn-sm" value="<?php echo $a['id']; ?>">Tidak Sesuai... <i class="fas  fa-times"></i></button>
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
        });
    </script>