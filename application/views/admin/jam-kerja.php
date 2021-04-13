<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">DAFTAR Guru dan karyawan</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/jam_kerja'); ?> " method="get">
            <select class="form-control col-2 mb-1" name="status_id" id="status_id" required>
                <option value="">Pilih status</option>
                <option value="3">Guru</option>
                <option value="4">Karyawan</option>
            </select>
            <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
        </form>
        <div class="table-responsive">
            <form action="<?= base_url('admin/jam_kerja'); ?>" method="POST">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="15px">#</th>
                            <th width="25px">NBM</th>
                            <th width="200px">Nama</th>
                            <th width="50px">Senin</th>
                            <th width="50px">Selasa</th>
                            <th width="50px">Rabu</th>
                            <th width="50px">Kamis</th>
                            <th width="50px">Jumat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $d) : ?>
                            <tr>
                                <td><?= $i; ?>
                                    <input type="hidden" name="id[]" id="id" value="<?= $d['id']; ?>">
                                </td>
                                <td><?= $d['nbm']; ?></td>
                                <td>
                                    <?php
                                    $result = $this->db->get_where('tbl_gukar', ['nbm' => $d['nbm']])->row_array();
                                    echo $result['nama'];
                                    ?>
                                </td>
                                <td>
                                    <input class="col" type="number" name="senin[]" id="senin" value="<?= $d['senin']; ?>">
                                </td>
                                <td>
                                    <input class="col" type="number" name="selasa[]" id="selasa" value="<?= $d['selasa']; ?>">
                                </td>
                                <td>
                                    <input class="col" type="number" name="rabu[]" id="rabu" value="<?= $d['rabu']; ?>">
                                </td>
                                <td>
                                    <input class="col" type="number" name="kamis[]" id="kamis" value="<?= $d['kamis']; ?>">
                                </td>
                                <td>
                                    <input class="col" type="number" name="jumat[]" id="jumat" value="<?= $d['jumat']; ?>">
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="hidden" name="status" value="<?= $sts; ?>">
                <button type="submit" class="btn btn-facebook">SIMPAN</button>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#EditModal">
    Tambah Pegawai
</button>

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
            <form action="<?= base_url('admin/tbh_pgw'); ?>" method="POST">
                <div class="form-group">
                    <label class="form-group col-lg">Status Pegawai</label>
                    <div class="col-lg">
                        <select class="form-control" name="status" id="status">
                            <option value="">Pilih Status</option>
                            <option value="3">Guru</option>
                            <option value="4">Karyawan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-group col-lg">Nama Pegawai</label>
                    <div class="col-lg">
                        <select class="form-control" name="nama" id="nama">
                            <option value="">Pilih Pegawai</option>
                            <?php foreach ($gukar as $g) : ?>
                                <option value="<?= $g['nbm']; ?>"><?= $g['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
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