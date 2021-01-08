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
        <h6 class="m-0 font-weight-bold text-primary">DATA NILAI SISWA JURUSAN BDP</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('admin/nilaibdp'); ?> " method="get">
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
                        <th>Tahun Pelajaran</th>
                        <th>N1</th>
                        <th>N2</th>
                        <th>N3</th>
                        <th>N4</th>
                        <th>N5</th>
                        <th>N6</th>
                        <th>N7</th>
                        <th>N8</th>
                        <th>N9</th>
                        <th>N10</th>
                        <th>N11</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['tp']; ?></td>
                            <td><?= $d['nilai_1']; ?></td>
                            <td><?= $d['nilai_2']; ?></td>
                            <td><?= $d['nilai_3']; ?></td>
                            <td><?= $d['nilai_4']; ?></td>
                            <td><?= $d['nilai_5']; ?></td>
                            <td><?= $d['nilai_6']; ?></td>
                            <td><?= $d['nilai_7']; ?></td>
                            <td><?= $d['nilai_8']; ?></td>
                            <td><?= $d['nilai_9']; ?></td>
                            <td><?= $d['nilai_10']; ?></td>
                            <td><?= $d['nilai_11']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/detailbdp/') . $d['id']; ?>" class="badge badge-warning">view</a>
                                <a href="<?= base_url('admin/editbdp/') . $d['id']; ?>" class="badge badge-success">Edit</a>
                                <!-- <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#hapusModal">Hapus</a> -->
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus siswa ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Setelah data dihapus data tidak bisa dikembalikan!!!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/hapus/') . $d['id']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->