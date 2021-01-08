<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">PROGRAM KERJA KEPALA LABORATORIUM</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message');; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kegiatan</th>
                        <th>Target</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($proker as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['kegiatan']; ?></td>
                            <td><?= $d['target']; ?></td>
                            <td><?= $d['waktu']; ?></td>
                            <td><?= $d['status']; ?></td>
                            <td>
                                <a href="<?= base_url('adminlab/editProker/') . $d['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#hapusModal">Hapus</a>
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
                <a class="btn btn-primary" href="<?= base_url('adminlab/hapusproker/') . $d['id']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->