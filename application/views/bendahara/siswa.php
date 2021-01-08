<form action="<?= base_url('bendahara/siswa'); ?> " method="get">
    <select name="kelas" id="kelas">
        <option value="">Silahkan Pilih Kelas</option>
        <?php foreach ($all_kelas as $k) : ?>
            <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="mb-3">SAVE</button>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4 col-9">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA SISWA</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message');; ?>
        <div class="table">
            <table width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Kelas</th>
                        <th>Tahun Pelajaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td><?= $d['nama_siswa']; ?></td>
                            <td><?= $d['kelas']; ?></td>
                            <td><?= $d['tp']; ?></td>
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

    <!-- Begin Page Content -->