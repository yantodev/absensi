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
                                <a href="<?= base_url(); ?>admin/hapus_gukar/<?= $d['id']; ?>" target="_blank"><i class="fa fa-trash fa-fw" alt="verifikasi" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>