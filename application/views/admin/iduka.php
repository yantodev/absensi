<div class="dropdown mb-3">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Silahkan Pilih Menu
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?= base_url('admin/iduka'); ?>">DATA IDUKA</a>
        <a class="dropdown-item" href="<?= base_url('admin/pengumuman'); ?>">PENGUMUMAN</a>
    </div>
</div>
<form action="<?= base_url('admin/iduka'); ?> " method="get">
    <select name="jurusan" id="jurusan">
        <option value="">Silahkan Pilih Jurusan</option>
        <?php foreach ($data as $d) : ?>
            <option value="<?= $d['singkatan_jurusan']; ?>"><?= $d['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary mb-2">SAVE</button>
</form>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA IDUKA (Dunia Usaha Dunia Industri Dunia Kerja)</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewIduka">TAMBAH IDUKA</a>
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>IDUKA</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($iduka as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['iduka']; ?></td>
                            <td><?= $d['alamat']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/editIduka/') . $d['id']; ?>" class="badge badge-success">Edit</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="NewIduka" tabindex="-1" aria-labelledby="NewMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewMenuModalLabel">TAMBAH IDUKA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/iduka'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="jurusan" id="jurusan">
                            <option value="">Silahkan Pilih Jurusan</option>
                            <?php foreach ($data as $d) : ?>
                                <option value="<?= $d['singkatan_jurusan']; ?>"><?= $d['jurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="iduka" name="iduka" placeholder="NAMA IDUKA / Instansi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat IDUKA">
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