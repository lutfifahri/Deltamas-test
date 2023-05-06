<!-- Main content -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <i class="nav-icon fas fa-print"></i> &nbsp;&nbsp;
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="print_lapbeli.php" target="_blank" method="POST" autocomplete="off" id="formAdd" style="margin-bottom:0px">
                <div class="row">
                    <div class="col">
                        <label for="Nama" class="col-sm-6 col-form-label">Tanggal Awal</label>
                        <input type="date" class="form-control tglawal" name="tgl_awal" placeholder="First name" value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="col">
                        <label for="Nama" class="col-sm-6 col-form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control tglakhir" name="tgk_akhir" placeholder="Last name" value="<?php echo date('Y-m-d') ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary btn-sm modalPrint" data-toggle="modal" href="#modalPrint"><i class="fas fa-print"></i>&nbsp; Cetak</a>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- Bagan Cetak -->
<div class="modal fade modal-fullscreen" id="modalPrint">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="temp_hapus()">
                    <span aria-hidden="true" class="Kembali" :>&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalEditnya"> </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".modalPrint").click(function() {
        var tgl1 = $('.tglawal').val();
        var tgl2 = $('.tglakhir').val();
        $.ajax({
            type: "POST",
            url: "print_lapRet.php",
            data: {
                "tgl1": tgl1,
                "tgl2": tgl2,
            },
            success: function(data) {
                $("#modalEditnya").html(data);
            }
        });
    });
</script>