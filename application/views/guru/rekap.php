<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">REKAP DAFTAR HADIR <?= $user['name']; ?></h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('guru/rekap'); ?> " method="get">
            <select name="tp" id="tp" required>
                <option value="">Tahun Pelajaran</option>
                <?php foreach ($tp as $b) : ?>
                    <option value="<?= $b['tp']; ?>"><?= $b['tp']; ?></option>
                <?php endforeach; ?>
            </select>
            <select name="semester" id="semester" required>
                <option value="">Semester</option>
                <?php foreach ($semester as $b) : ?>
                    <option value="<?= $b['semester']; ?>"><?= $b['semester']; ?></option>
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
                        <th>Bulan</th>
                        <th width="100px">Hadir</th>
                        <th width="100px">Izin</th>
                        <th width="100px">Alpha</th>
                        <th width="100px">%</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['bulan']; ?></td>
                            <td>
                                <?php
                                $count = $this->db->get_where('tbl_dh', ['nbm' => $user['no_reg'], 'status' => 'Hadir', 'bulan' => $d['id']])->result_array();
                                echo count($count);
                                ?>
                            </td>
                            <td>
                                <?php
                                $count = $this->db->get_where('tbl_dh', ['nbm' => $user['no_reg'], 'status' => 'Izin', 'bulan' => $d['id']])->result_array();
                                echo count($count);
                                ?>
                            </td>
                            <td>
                                <?php
                                $count = $this->db->get_where('tbl_dh', ['nbm' => $user['no_reg'], 'bulan' => $d['id']])->result_array();
                                echo $d['jml'] - count($count);
                                ?>
                            </td>
                            <td>
                                <?php
                                $count = $this->db->get_where('tbl_dh', ['nbm' => $user['no_reg'], 'status' => 'Hadir', 'bulan' => $d['id']])->result_array();
                                echo (count($count) / $d['jml']) * 100, ' %';
                                ?>
                            </td>
                            <td>
                                <?php
                                $count = $this->db->get_where('tbl_dh', ['nbm' => $user['no_reg'], 'status' => 'Hadir', 'bulan' => $d['id']])->result_array();
                                $hasil = (count($count) / $d['jml']) * 100;
                                // $hasil = 79;

                                if ($hasil > 100) {
                                    echo "Sangat Bagus";
                                } else if ($hasil > 90) {
                                    echo "Bagus";
                                } else if ($hasil >= 80) {
                                    echo "Kurang";
                                } else if ($hasil < 80) {
                                    echo "Sangat Kurang";
                                }
                                ?>
                            </td>
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