<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase ">daftar hadir Kegiatan</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <table class="table table-bordered dataTab" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th width="100px">NBM</th>
                        <th>NAMA</th>
                        <th>STATUS</th>
                        <th>ALASAN</th>
                        <th width="50px">TTD</th>
                        <th width="50px">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $d['nbm']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['status']; ?></td>
                            <td><?= $d['alasan']; ?></td>
                            <td><img src="<?= base_url() . $d['ttd']; ?>" width="50px" height="50px"></td>
                            <td>
                                <button class="badge btn-primary" data-toggle="modal" data-target="#EditModal<?= $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i> Edit</button>
                                <a href="<?= base_url(); ?>admin/hapus_dhkeg?id=<?= $d['id']; ?>&idkeg=<?= $id; ?>"><button class="badge btn-warning" onclick="return confirm('Yakin ingin menghapus?');"><i class="fa fa-trash fa-fw" alt="verifikasi" title="Hapus"></i> Hapus</button></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?= base_url('admin/cetak_pdf_kegiatan'); ?>" method="get">
                <input type="hidden" name="id" id="id" value="<?= $id; ?>">
                <input type="hidden" name="kegiatan" id="kegiatan" value="<?= $data2['kegiatan']; ?>">
                <button class="btn btn-google mb-2"><i class="far fa-file-pdf"> CETAK PDF</i></button>
                </a>
                <!-- <a href="">
                    <button class="btn btn-success mb-2"><i class="far fa-file-excel"> CETAK EXCEL</i></button>
                </a> -->
            </form>
        </div>
    </div>
</div>

<!-- modal -->
<?php $i = 0;
foreach ($data as $d) : $i++; ?>
    <div class="modal fade" id="EditModal<?= $d['id']; ?>" tabindex="-1" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NewRoleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/edit_dhkeg'); ?>" method="POST">
                    <div class="form-group">
                        <label class="form-group col-lg">NBM</label>
                        <div class="col-lg">
                            <input class="form-control" type="text" id="kegiatan" name="kegiatan" value="<?= $d['nbm']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-group col-lg">Nama</label>
                        <div class="col-lg">
                            <input class="form-control" type="text" id="kegiatan" name="kegiatan" value="<?= $d['nama']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-group col-lg">Status</label>
                        <div class="col-lg">
                            <select class="form-control" name="status" id="status">
                                <option value="<?= $d['status']; ?>"><?= $d['status']; ?></option>
                                <option value="Hadir">Hadir</option>
                                <option value="Izin">Izin</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?= $d['id']; ?>">
                    <input type="hidden" name="owner" id="owner" value="<?= $id; ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>