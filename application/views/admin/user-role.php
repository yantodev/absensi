<h3><?= $title; ?></h3>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">Daftar User Role</h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit Data |
            <i class="fa fa-trash"></i> Hapus Data
        </small>
    </div>
    <div class="card-body">
        <?php if($this->session->flashdata('message')) :?>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NAMA</th>
                        <th>ADMIN</th>
                        <th>KEPALA SEKOLAH</th>
                        <th>PIKET</th>
                        <th>BENDAHARA</th>
                        <th>ACCESS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $d['name'] ?></td>
                        <td align="center">
                            <?php
                            if ($d['is_admin'] == 1){
                                echo "✅";
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php
                            if ($d['is_ks'] == 1){
                                echo "✅";
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php
                            if ($d['is_piket'] == 1){
                                echo "✅";
                            }
                            ?>
                        </td>
                        <td align="center">
                            <?php
                            if ($d['is_bendahara'] == 1){
                                echo "✅";
                            }
                            ?>
                        </td>
                        <td>
                            <badge style="cursor:pointer" class="badge badge-warning"
                                onclick="userAccess(<?= $d['id'] ?>)">
                                <i class="fa fa-user fa-fw" alt="detail" title="Edit"></i>
                                Access
                            </badge>
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
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pegawai</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/gukar') ?>" method="post">
                    <div class="form-group row">
                        <label class="col-3 form-label">Status</label>
                        <div class="col">
                            <select class="form-control" name="status" id="status" required>
                                <option value="">Pilih Status</option>
                                <option value="1">Guru</option>
                                <option value="2">Karyawan</option>
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
                <input type="hidden" name="user" id="user" value="<?= $user[
                    'name'
                ] ?>">
                <button type="submit" class="btn btn-info">Tambah</button>
                <!-- <button type=" button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
            </form>
        </div>

    </div>
</div>