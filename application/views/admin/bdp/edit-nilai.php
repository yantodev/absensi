<div class="row">
    <div class="col-lg-8">
        <div class="card-body pb-0">
            <!-- <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?> -->
            <form action="" method="POST">
                <h5><b>IDENTITAS SISWA</b></h5>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Nama Siswa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" value="<?= $siswa['name']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Email Siswa</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $siswa['email']; ?>" readonly>
                    </div>
                </div>
                <h5><b>DATA NILAI</b></h5>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Disiplin</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_1" name="nilai_1" value="<?= $siswa['nilai_1']; ?>">
                    </div>
                    <?= form_error('nilai_2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Kerjasama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_2" name="nilai_2" value="<?= $siswa['nilai_2']; ?>">
                    </div>
                    <?= form_error('nilai_2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Inisiatif</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_3" name="nilai_3" value="<?= $siswa['nilai_3']; ?>">
                    </div>
                    <?= form_error('nilai_3', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Tanggungjawab</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_4" name="nilai_4" value="<?= $siswa['nilai_4']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">K3</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_5" name="nilai_5" value="<?= $siswa['nilai_5']; ?>">
                    </div>
                    <?= form_error('nilai_5', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Stok Barang</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_6" name="nilai_6" value="<?= $siswa['nilai_6']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Penataan Produk</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_7" name="nilai_7" value="<?= $siswa['nilai_7']; ?>">
                    </div>
                    <?= form_error('nilai_7', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Pelayanan Prima</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_8" name="nilai_8" value="<?= $siswa['nilai_8']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Komunikasi Bisnis</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_9" name="nilai_9" value="<?= $siswa['nilai_9']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Mengoperasikan Alat Transaksi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_10" name="nilai_10" value="<?= $siswa['nilai_10']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-sm-4 col-form-label">Laporan Penjualan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nilai_11" name="nilai_11" value="<?= $siswa['nilai_11']; ?>">
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
                <button type="submit" class="btn btn-primary float-right">SIMPAN</button>
            </form>
        </div>
    </div>
</div>