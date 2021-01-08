<div class="dropdown mb-3">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Silahkan Pilih Jurusan
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?= base_url('admin/sertifikatTKRO'); ?>">Teknik Kendaraan Ringan Otomotif</a>
        <a class="dropdown-item" href="<?= base_url('admin/sertifikatTBSM'); ?>">Teknik Bisnis Sepeda Motor</a>
        <a class="dropdown-item" href="<?= base_url('admin/sertifikatAKL'); ?>">Akuntansi dan Keuangan Lembaga</a>
        <a class="dropdown-item" href="<?= base_url('admin/sertifikatOTKP'); ?>">Otomatisasi dan Tata Kelola Perkantoran</a>
        <a class="dropdown-item" href="<?= base_url('admin/sertifikatBDP'); ?>">Bisnis Daring dan Pemasaran</a>
    </div>
</div>
<!-- <form action="<?= base_url('admin/nilaitkro/'); ?>" method="GET">
    <select for="jurusan" name="jurusan" id="jurusan">
        <option value="">Silahkan Pilih Jurusan</option>
        <?php foreach ($jurusan as $j) : ?>
            <option value="<?= $j['id_jurusan']; ?>"><?= $j['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">SAVE</button>
<a href="<?= base_url('admin/nilaitkro/') . $j['id_jurusan']; ?>" class="btn btn-success">SAVE</a>
</form> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA NILAI SISWA</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message');; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Cetak Sertifikat</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>