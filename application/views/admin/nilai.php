<div class="dropdown mb-3">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Silahkan Pilih Jurusan
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?= base_url('admin/nilaitkro'); ?>">Teknik Kendaraan Ringan Otomotif</a>
        <a class="dropdown-item" href="<?= base_url('admin/nilaitbsm'); ?>">Teknik Bisnis Sepeda Motor</a>
        <a class="dropdown-item" href="<?= base_url('admin/nilaiakl'); ?>">Akuntansi dan Keuangan Lembaga</a>
        <a class="dropdown-item" href="<?= base_url('admin/nilaiotkp'); ?>">Otomatisasi dan Tata Kelola Perkantoran</a>
        <a class="dropdown-item" href="<?= base_url('admin/nilaibdp'); ?>">Bisnis Daring dan Pemasaran</a>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA NILAI SISWA JURUSAN TKRO</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>N1</th>
                        <th>N2</th>
                        <th>N3</th>
                        <th>N4</th>
                        <th>N5</th>
                        <th>N6</th>
                        <th>N7</th>
                        <th>N8</th>
                        <th>N9</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['nilai_1']; ?></td>
                            <td><?= $d['nilai_2']; ?></td>
                            <td><?= $d['nilai_3']; ?></td>
                            <td><?= $d['nilai_4']; ?></td>
                            <td><?= $d['nilai_5']; ?></td>
                            <td><?= $d['nilai_6']; ?></td>
                            <td><?= $d['nilai_7']; ?></td>
                            <td><?= $d['nilai_8']; ?></td>
                            <td><?= $d['nilai_9']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/detailtkro/') . $d['id']; ?>" class="badge badge-warning">view</a>
                                <a href="<?= base_url('admin/edittkro/') . $d['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#hapusModal">Hapus</a>
                </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
            </tbody> -->
            </table>
        </div>
    </div>
</div>