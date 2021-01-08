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
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA SISWA JURUSAN AKL</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/sertifikatAKL'); ?> " method="get">
            <select name="tp" id="tp">
                <option value="">Pilih Tahun Pelajaran</option>
                <?php foreach ($tp as $d) : ?>
                    <option value="<?= $d['tp']; ?>"><?= $d['tp']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-primary mb-2">SAVE</button>
        </form>
        <?= $this->session->flashdata('message'); ?>
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
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['verifikasi']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/CetakDepanakl/') . $d['id']; ?>" class="badge badge-warning">Depan</a>
                                <a href="<?= base_url('admin/CetakBelakangakl/') . $d['id']; ?>" class="badge badge-success">Belakang</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>