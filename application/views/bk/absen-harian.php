<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">REKAP DAFTAR HADIR HARIAN KELAS <?= $kelas; ?></h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit Data |
            <i class="fa fa-trash"></i> Hapus Data
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('bk/hr'); ?> " method="get">
            <select name="kelas" id="kelas" required>
                <option value="">Pilih kelas</option>
                <?php foreach ($kls as $k) : ?>
                    <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="level" id="level" value="5">
            <input type="date" name="date" id="date" required>
            <button type="submit">VIEW</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TANGGAL</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>MASUK</th>
                        <th>TTD</th>
                        <th>PULANG</th>
                        <th>TTD</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= tgl($d['date_in']); ?></td>
                            <td><?= $d['nbm']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['time_in']; ?></td>
                            <td><img src="<?= base_url() . $d['ttd_in']; ?>" width="50px" height="50px"></td>
                            <td><?= $d['time_out']; ?></td>
                            <td><img src="<?= base_url() . $d['ttd_out']; ?>" width="50px" height="50px"></td>
                            <td>
                                <a href="<?= base_url('bk/edit_hr/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i></a>
                                <a href="<?= base_url(); ?>bk/hapus/<?= $d['id']; ?>"><i class="fa fa-trash fa-fw" alt="verifikasi" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus siswa ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Setelah data dihapus data tidak bisa dikembalikan!!!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/hapus/') . $d['id']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->