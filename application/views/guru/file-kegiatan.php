<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">DAFTAR kegiatann</h6>
        <small>Keterangan <br />
            <i class="fa fa-trash"></i> Hapus
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="" method="get">
            <select class="form-control mb-3 col-4" name="id" id="id">
                <option value="">Pilih Kegiatan</option>
                <?php foreach ($dt as $dt) : ?>
                    <option value="<?= $dt['id']; ?>"><?= $dt['kegiatan']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="owner" value="<?= $dt2['owner']; ?>">
            <button class="btn btn-facebook mb-3">VIEWS</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25px">#</th>
                        <th>FILE</th>
                        <th width="50px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td>
                                <a href="<?= base_url('home/file/' . $d['file']); ?>"><?= $d['file']; ?></a>
                            </td>
                            <td>
                                <a href="<?= base_url('guru/hapus_file?id=' . $d['id'] . '&owner=' . $dt2['owner'] . '&id_keg=' . $dt['id']); ?>"><i class="fa fa-trash fa-fw" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');"></i></a>
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
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewRoleModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('guru/kegiatan'); ?>" method="POST">
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
                    <label class="form-group col-lg">Nama Kegiatan</label>
                    <div class="col-lg">
                        <input class="form-control" type="text" id="kegiatan" name="kegiatan">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-group col-lg">Keterangan</label>
                    <div class="col-lg">
                        <textarea class="form-control" id="keterangan" name="keterangan" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <input type="hidden" name="owner" id="owner" value="<?= $user['name']; ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function copy_text() {
        document.getElementById("pilih").select();
        document.execCommand("copy");
        alert("Text berhasil dicopy");
    }
</script>