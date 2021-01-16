<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">DAFTAR Jurnal <?= $user['name']; ?></h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit |
            <i class="fa fa-eye"></i> Detail |
            <i class="fa fa-trash"></i> Hapus
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahJurnal">
            Tambah Jurnal
        </button>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25px">#</th>
                        <th width="180px">Tanggal</th>
                        <th width="50px">Waktu</th>
                        <th>Kegiatan</th>
                        <th width="80px">Foto</th>
                        <th width="25px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= tgl($d['tgl']); ?></td>
                            <td><?= $d['time']; ?></td>
                            <td><?= $d['kegiatan']; ?></td>
                            <td><img src="<?= base_url('image/jurnal/') . $d['foto']; ?>" width="80px" height="80px"></td>
                            <td>
                                <a href="<?= base_url('guru/edit_jurnal/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i></a>
                                <a href="<?= base_url('guru/detail_jurnal/') . $d['id']; ?>"><i class="fa fa-eye fa-fw" alt="detail" title="Detail"></i></a>
                                <a href="<?= base_url(); ?>guru/hapus_jurnal/<?= $d['id']; ?>" target="_blank"><i class="fa fa-trash fa-fw" alt="verifikasi" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="tambahJurnal" tabindex="-1" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewRoleModalLabel">Tambah Jurnal-ku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('guru/jurnal'); ?>" method="post">
                <div class="form-group">
                    <label class="form-group col-lg">Tanggal</label>
                    <div class="col-lg">
                        <input class="form-control" type="date" id="tgl" name="tgl">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-group col-lg">Waktu</label>
                    <div class="col-lg">
                        <input class="form-control" type="time" id="time" name="time">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-group col-lg">Kegiatan</label>
                    <div class="col-lg">
                        <textarea name="kegiatan" id="jurnal" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <input type="hidden" name="name" id="name" value="<?= $user['name']; ?>">
                <input type="hidden" name="nbm" id="nbm" value="<?= $user['no_reg']; ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    function copy_text() {
        document.getElementById("pilih").select();
        document.execCommand("copy");
        alert("Text berhasil dicopy");
    }
</script> -->