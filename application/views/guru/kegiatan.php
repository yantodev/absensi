<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">DAFTAR kegiatann</h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit |
            <i class="fa fa-eye"></i> Detail |
            <i class="fa fa-trash"></i> Hapus |
            <i class="fa fa-image"></i> Upload Dokumentasi |
            <i class="fa fa-file"></i> Upload File
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#EditModal">
            Tambah Kegiatan
        </button>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th width="180px">Tanggal</th>
                        <th>Waktu</th>
                        <th>Kegiatan</th>
                        <th>Keterangan</th>
                        <th>Kategori</th>
                        <th>Peserta</th>
                        <th>Upload</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= tanggal($d['tgl']); ?></td>
                            <td><?= $d['time']; ?></td>
                            <td><?= $d['kegiatan']; ?></td>
                            <td><?= $d['keterangan']; ?></td>
                            <td>
                                <?php
                                $ktg = $this->db->get_where('tbl_kategori', ['id' => $d['status_id']])->row_array();
                                echo $ktg['nama'];
                                ?>
                            </td>
                            <td>
                                <?php
                                $count = $this->db->get_where('tbl_dh_kegiatan', ['id_kegiatan' => $d['id']])->result_array();
                                echo count($count);
                                ?>
                            </td>
                            <td>
                                <a href="<?= base_url('guru/foto_kegiatan?id=') . $d['id']; ?>"><i class="fa fa-image fa-fw" alt="detail" title="Upload Dokumentasi"></i></a>
                                <a href="<?= base_url('guru/file_kegiatan?id=') . $d['id']; ?>"><i class="fa fa-file fa-fw" alt="detail" title="Upload File"></i></a>
                            </td>
                            <td>
                                <a href="<?= base_url('guru/edit_kegiatan/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i></a>
                                <a href="<?= base_url('guru/detail_kegiatan/') . $d['id']; ?>"><i class="fa fa-eye fa-fw" alt="detail" title="Detail"></i></a>
                                <a href="<?= base_url(); ?>guru/hapus_kegiatan/<?= $d['id']; ?>" target="_blank"><i class="fa fa-trash fa-fw" alt="verifikasi" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');"></i></a>
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
                    <label class="form-group col-lg">Kategori</label>
                    <div class="col-lg">
                        <select class="form-control" name="status_id" id="status_id">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($status as $s) : ?>
                                <option value="<?= $s['id']; ?>"><?= $s['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
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