<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">Rekap Kehadiran <?= $user['name']; ?> Bulan <?= bulan($bln); ?></h6>
        <small>Keterangan <br />
            Hadir = <?php
                    $count = $this->db->get_where('tbl_dh', ['nbm' => $user['no_reg'], 'status' => 'Hadir', 'bulan' => $bln])->result_array();
                    echo count($count);
                    ?>
            <br />
            Izin = <?php
                    $count = $this->db->get_where('tbl_dh', ['nbm' => $user['no_reg'], 'status' => 'Izin', 'bulan' => $bln])->result_array();
                    echo count($count);
                    ?>
            <br />
            Alpha = <?php
                    $count = $this->db->get_where('tbl_dh', ['nbm' => $user['no_reg'], 'bulan' => $bln])->result_array();
                    echo $bulan2['jml'] - count($count);
                    ?>
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('guru/absensi'); ?> " method="get">
            <select name="bulan" id="bulan" required>
                <option value="">Pilih Bulan</option>
                <?php foreach ($bulan as $b) : ?>
                    <option value="<?= $b['id']; ?>"><?= $b['bulan']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="id" id="id" value="<?= $user['no_reg']; ?>">
            <!-- <input type="date" name="date" id="date" required> -->
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