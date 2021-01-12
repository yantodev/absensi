<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">REKAP DAFTAR HADIR <?= $id['nama']; ?></h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit Data |
            <i class="fa fa-trash"></i> Hapus Data
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TANGGAL</th>
                        <th>NBM</th>
                        <th>NAMA</th>
                        <th>STATUS</th>
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
                            <td><?= ucwords(strtolower($d['nama'])); ?></td>
                            <td><?= $d['status']; ?></td>
                            <td><?= $d['time_in']; ?></td>
                            <td><img src="<?= base_url() . $d['ttd_in']; ?>" width="50px" height="50px"></td>
                            <td><?= $d['time_out']; ?></td>
                            <td><img src="<?= base_url() . $d['ttd_out']; ?>" width="50px" height="50px"></td>
                            <td>
                                <a href="<?= base_url('admin/edit_hr_siswa/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i></a>
                                <a href="<?= base_url(); ?>admin/hapus/<?= $d['id']; ?>" target="_blank"><i class="fa fa-trash fa-fw" alt="verifikasi" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row ml-2">
                <form action="<?= base_url('admin/cetak_pdf_bln_siswa'); ?>" method="get">
                    <input type="hidden" name="bulan" id="bulan" value="<?= $bulan; ?>">
                    <input type="hidden" name="nis" id="nis" value="<?= $id['nis']; ?>">
                    <input type="hidden" name="nama" id="nama" value="<?= $id['nama']; ?>">
                    <button class="btn btn-google ml-2 mb-2"><i class="far fa-file-pdf"> PDF</i></button>
                </form>
                <form action="" method="">
                    <input type="hidden" name="bulan" id="bulan" value="<?= $bulan; ?>">
                    <input type="hidden" name="nis" id="nis" value="<?= $id['nis']; ?>">
                    <input type="hidden" name="nama" id="nama" value="<?= $id['nama']; ?>">
                    <button class="btn btn-success ml-2 mb-2"><i class="far fa-file-excel"> EXCEL</i></button>
                </form>
            </div>
        </div>
    </div>
</div>