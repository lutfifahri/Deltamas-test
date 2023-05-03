<link href="css/style.css" rel="stylesheet">
<!-- Main Content -->
<div id="content">
    <?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM vendor WHERE id='$id' AND Tipe!='Z' ") or die(mysqli_error($koneksi));
    $result = mysqli_fetch_array($query);
    ?>
    <!-- Begin Page Content -->
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEdit" method="POST" autocomplete="off">
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Kode" class="col-sm-3 col-form-label">Kode</label>
                        <div class="col-sm-9">
                            <input type="hidden" class="form-control" id="id" name="id" id="myclass" value="<?php echo $result['id']; ?>">
                            <input type="text" class="form-control" id="" name="" value="<?php echo $result['Kode']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo $result['Nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="" class="col-sm-3 col-form-label">Barang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Barang" name="Barang" value="<?php echo $result['Barang']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Harga" class="col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="Harga" name="Harga" value="<?php echo $result['Harga']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Jumlah" class="col-sm-3 col-form-label">Qty</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="Jumlah" value="<?php echo $result['Jumlah']; ?>">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="Keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                        <div class="col-sm-9">
                            <textarea name="Keterangan" id="Keterangan" cols="2" rows="2" class="form-control"><?php echo $result['Keterangan']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom:8px">
                        <label for="" class="col-sm-3 col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="Tanggal" value="<?php echo $result['Tanggal']; ?>">
                        </div>
                    </div>
                    <div class=" modal-footer justify-content-between">
                        <button type="submit" class="btn btn-primary waves-effect">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>