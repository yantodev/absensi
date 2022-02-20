<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">REKAP DAFTAR HADIR BULANAN <?= $level['nama'] ?>
            (<?= bulan($bulan['id']) ?>)</h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit Data |
            <i class="fa fa-trash"></i> Hapus Data
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message') ?>
        <form action="<?= base_url('ks/bln') ?> " method="get">
            <select class="form-control col-3 mb-1" name="bulan" id="bulan">
                <option value="" disabled selected>-- Pilih Bulan --</option>
                <?php foreach ($all_bulan as $bn => $bt): ?>
                <option value="<?= $bn ?>" <?= $bn == $bulan ? 'selected' : '' ?>><?= $bt ?></option>
                <?php endforeach; ?>
            </select>
            <select class="form-control col-3 mb-1" name="tahun" id="tahun">
                <option value="" disabled selected>-- Pilih Tahun --</option>
                <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--): ?>
                <option value="<?= $i ?>" <?= $i == $tahun ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>">
            </select>
            <select class="form-control col-3 mb-1" name="status_id" id="status_id">
                <option value="">-- Pilih Status --</option>
                <option value="1">Guru</option>
                <option value="2">Karyawan</option>
            </select>
            <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NBM</th>
                        <th>NAMA</th>
                        <th>EMAIL</th>
                        <th>HADIR</th>
                        <th>IZIN</th>
                        <th>ALPHA</th>
                        <th>TOTAL JAM</th>
                        <th>PROSENTASE</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $d['nbm'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td><?= $d['email'] ?></td>
                        <td align="center">
                            <?php
                                $count = $this->db
                                    ->get_where('tbl_dh', [
                                        'nbm' => $d['nbm'],
                                        'status' => 'Hadir',
                                        'bulan' => $bulan['id']
                                    ])
                                    ->result_array();
                                echo count($count);
                                ?>
                        </td>
                        <td align="center">
                            <?php
                                $count = $this->db
                                    ->get_where('tbl_dh', [
                                        'nbm' => $d['nbm'],
                                        'status' => 'Izin',
                                        'bulan' => $bulan['id'],
                                    ])
                                    ->result_array();
                                echo count($count);
                                ?>
                        </td>
                        <td align="center">
                            <?php
                                $count = $this->db
                                    ->get_where('tbl_dh', [
                                        'nbm' => $d['nbm'],
                                        'bulan' => $bulan['id'],
                                    ])
                                    ->result_array();
                                $data = count($count);
                                echo $bulan['jml'] - $data;
                                ?>
                        </td>
                        <td>
                            <?php
                                $dt = $this->db
                                    ->get_where('tbl_dh', [
                                        'bulan' => $this->input->get('bulan'),
                                        'nbm' => $d['nbm'],
                                    ])
                                    ->result_array();
                                if (!$dt) {
                                    $total = 0;
                                } else {
                                    foreach ($dt as $dt):
                                        $date_awal = new DateTime(
                                            $dt['time_out']
                                        );
                                        $date_akhir = new DateTime(
                                            $dt['time_in']
                                        );
                                        $date_default1 = new DateTime(
                                            '16:00:00'
                                        );

                                        if ($dt['time_out'] == '00:00:00') {
                                            $date_awal = $date_default1;
                                        } else {
                                            $selisih = $date_akhir->diff(
                                                $date_awal
                                            );

                                            $jam = $selisih->format('%h');
                                            $menit = $selisih->format('%i');

                                            if ($menit >= 0 && $menit <= 9) {
                                                $menit = '0' . $menit;
                                            }

                                            $hasil = $jam . '.' . $menit;
                                            $hasil = number_format($hasil, 2);
                                        }
                                        $total += (float) $hasil;
                                    endforeach;
                                }
                                ?>
                            <?= $total ?>
                        </td>
                        <td>
                            <?php
                                $mdt = $this->db
                                    ->get_where('tbl_gukar', [
                                        'nbm' => $d['nbm'],
                                    ])
                                    ->row_array();
                                $bebankerja =
                                    $mdt['senin'] +
                                    $mdt['selasa'] +
                                    $mdt['rabu'] +
                                    $mdt['kamis'] +
                                    $mdt['jumat'];
                                $res = ($total / $bebankerja) * 100;

                                if (is_infinite($res)) {
                                    echo 0 . '%';
                                } else {
                                    echo number_format($res, 2) . '%';
                                }
                                ?>
                        </td>
                        <td>
                            <a href="<?= base_url('ks/dtl_absn?nbm=') .
                                    $d['nbm'] .
                                    '&' .
                                    'bulan=' .
                                    $bulan[
                                        'id'
                                    ] ?>"><button class="btn btn-primary">DETAIL</button></i></a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?= base_url('ks/cetak_all_bln') ?>" method="get">
                <input type="hidden" name="bulan" id="bulan" value="<?= $bulan[
                    'id'
                ] ?>">
                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                <input type="hidden" name="tp" id="tp" value="<?= $this->input->get(
                    'tp'
                ) ?>">
                <button class="btn btn-google mb-2"><i class="far fa-file-pdf"> CETAK PDF</i></button>
                </a>
                <!-- <a href="">
                    <button class="btn btn-success mb-2"><i class="far fa-file-excel"> CETAK EXCEL</i></button>
                </a> -->
            </form>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Setelah data dihapus data tidak bisa dikembalikan!!!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('ks/hapus/') .
                    $d['id'] ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->