<!-- <form action="<?= base_url('admin/iduka'); ?> " method="get">
    <select name="jurusan" id="jurusan">
        <option value="">Silahkan Pilih Jurusan</option>
        <?php foreach ($data as $d) : ?>
            <option value="<?= $d['singkatan_jurusan']; ?>"><?= $d['jurusan']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary mb-2">SAVE</button>
</form> -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DAFTAR GURU PENDAMPING</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewIduka">TAMBAH GURU</a>
        <a href="<?= base_url('admin/tambahsiswa'); ?>" class="btn btn-primary mb-3">DAFTAR PENDAMPING</a>
        <?php if (validation_errors()) : ?>
            <div class=" alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NAMA GURU</th>
                        <th>NBM</th>
                        <th>TELP/HP</th>
                        <th>LOKASI IDUKA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($guru as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['nbm']; ?></td>
                            <td><?= $d['hp']; ?></td>
                            <td><?= $d['lokasi']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/editGuru/') . $d['id']; ?>" class="badge badge-success">Edit</a>
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
<!-- modal tambah guru -->
<div class="modal fade" id="NewIduka" tabindex="-1" aria-labelledby="NewMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewMenuModalLabel">TAMBAH GURU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/EditGuru'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Guru">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nbm" name="nbm" placeholder="NBM">
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