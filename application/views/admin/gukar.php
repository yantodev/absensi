<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">DAFTAR Guru dan karyawan</h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit Data |
            <i class="fa fa-trash"></i> Hapus Data
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/gukar'); ?> " method="get">
            <select class="form-control col-2 mb-1" name="status_id" id="status_id">
                <option value="">Pilih status</option>
                <option value="3">Guru</option>
                <option value="4">Karyawan</option>
            </select>
            <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NBM</th>
                        <th>NAMA</th>
                        <th>EMAIL</th>
                        <th>JABATAN</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nbm']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['email']; ?></td>
                            <td><?= $d['jabatan']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_gukar/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i></a>
                                <!-- <a href="<?= base_url(); ?>admin/hapus_gukar/<?= $d['id']; ?>" target="_blank"><i class="fa fa-trash fa-fw" alt="verifikasi" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');"></i></a> -->
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambah">Tambah Pegawai</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pegawai</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/gukar'); ?>" method="post">
                    <div class="form-group row">
                        <label class="col-3 form-label">Status</label>
                        <div class="col">
                            <select class="form-control" name="status" id="status" required>
                                <option value="">Pilih Status</option>
                                <option value="3">Guru</option>
                                <option value="4">Karyawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">NIP/NBM</label>
                        <div class="col">
                            <input class="form-control" type="text" id="nbm" name="nbm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">Nama</label>
                        <div class="col">
                            <input class="form-control" type="text" id="nama" name="nama" required>
                            <small>Nama lengkap dan gelar</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">Email</label>
                        <div class="col">
                            <input class="form-control" type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">No. HP</label>
                        <div class="col">
                            <input class="form-control" type="number" id="hp" name="hp" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">Jabatan</label>
                        <div class="col">
                            <input class="form-control" type="text" id="jabatan" name="jabatan" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user" id="user" value="<?= $user['name']; ?>">
                <button type="submit" class="btn btn-info">Tambah</button>
                <!-- <button type=" button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
            </form>
        </div>

    </div>
</div>