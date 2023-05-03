<?php
include 'koneksi.php';
$sql = 'CREATE TABLE ps ( ' .
    'id int NOT NULL AUTO_INCREMENT, ' .
    'Kode char(120) NOT NULL, ' .
    'KodeVendor char(120) NOT NULL, ' .
    'Tipe char(1) NOT NULL, ' .
    'primary key ( id ))';
$buattabel = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Inventori || Deltamas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include 'menu.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Purchase Requisition</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Purchase Requisition</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div id="contentData"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- ini untuk memanggil swetalert  -->
    <script src="data/jquery.min.js"></script>
    <script src="data/bootstrap.min.js"></script>
    <script src="data/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //load data mahasiswa saat aplikasi dijalankan 
            loadData();

            //simpan data mahasiswa
            $("#contentData").on("submit", "#formAdd", function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'service_ps.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data == 1) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            Toast.fire({
                                type: 'error',
                                title: 'Maaf Kode Sudah tersimpan !',
                            })
                            return false;
                        } else {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            Toast.fire({
                                    type: 'success',
                                    title: 'Data Berhasil Disimpan !',
                                })
                                .then(function() {
                                    location.reload();
                                });
                        }
                        // alert(data);
                        // location.reload();
                    }
                });
            });

            //hapus data  berdasarkan id
            $("#contentData").on("click", "#DeleteButton1", function() {
                var id = $(this).attr("value");
                // alert(id);
                $.ajax({
                    url: 'service_ps.php?action=edit',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data == 'success') {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            Toast.fire({
                                    type: 'success',
                                    title: 'Data Berhasil Di Ajukan Ke Manager !',
                                })
                                .then(function() {
                                    // location.reload();
                                    $('#contentData').load("table-ps.php");
                                });
                        }
                    }
                });
            });

            $("#contentData").on("click", "#DeleteButton", function() {
                if (confirm('Apakah anda yakin ingin Menghapus data ini ?')) {
                    var id = $(this).attr("value");
                    $.ajax({
                        url: 'service_ps.php?action=delete',
                        type: 'post',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            if (data == 'success') {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                Toast.fire({
                                        type: 'success',
                                        title: 'Data Berhasil Dihapus !',
                                    })
                                    .then(function() {
                                        // location.reload();
                                        $('#contentData').load("table-ps.php");
                                    });
                            }
                        }
                    });
                } else {
                    return false;
                }
            });

        })

        function loadData() {
            $.ajax({
                url: 'table-ps.php',
                type: 'post',
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }

        $('body').on('keydown', 'input, select', function(e) {
            if (e.key === "Enter") {
                var self = $(this),
                    form = self.parents('form:eq(0)'),
                    focusable, next;
                focusable = form.find('input,a,select,button,textarea').filter(':visible');
                next = focusable.eq(focusable.index(this) + 1);
                if (next.length) {
                    next.focus();
                } else {
                    form.submit();
                }
                return false;
            }
        });
    </script>
</body>

</html>