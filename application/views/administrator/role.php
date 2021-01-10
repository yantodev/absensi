<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">DAFTAR HAK AKSES</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NBM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Status</th>
                        <th scope="col">Status Admin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <form action="<?= base_url('administrator/role_edit'); ?>" methode="POST">
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $r['no_reg']; ?></td>
                                <td><?= $r['name']; ?></td>
                                <td><?= akun($r['role_id']); ?></td>
                                <td>
                                    <select name="status_id" id="status_id">
                                        <option value="<?= $r['status_id']; ?>"><?= akun($r['status_id']); ?></option>
                                        <option value="0">Non Aktif</option>
                                        <option value="2">Admin Absensi</option>
                                        <option value="6">Admin BK</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" id="id" name="id" value="<?= $r['id']; ?>">
                                    <button type="submit" class="btn btn-primary">SAVE</button>
                                </td>
                            </form>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="NewRoleModal" tabindex="-1" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('administrator/role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>