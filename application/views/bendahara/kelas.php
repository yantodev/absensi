<table class="table col-5">
    <thead>
        <tr>
            <th>#</th>
            <th>Kelas</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kelas as $k) : ?>
            <tr>
                <td scope="row"><?= $i; ?></td>
                <td><?= $k['kelas']; ?></td>
                <td>
                    <a href="<?= base_url('bendahara/kelas/') . $k['id']; ?>" class="badge badge-warning fas fa-edit"> Edit</a>
                    <a href="<?= base_url('bendahara/kelas/') . $k['id']; ?>" class="badge badge-danger fas fa-trash" data-toggle="modal" data-target="#hapusModal"> Hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- modal -->
<!-- hapus Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus kelas ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Setelah data dihapus data tidak bisa dikembalikan!!!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('bendahara/hapus_kelas/') . $k['id']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->