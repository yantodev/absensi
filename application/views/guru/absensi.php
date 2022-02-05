<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">
            REKAP DAFTAR HADIR 
            <?= $user['name'] ?>
        </h6>
        <small>
            Keterangan <br />
            <ol>
                <li><span class="badge badge-warning">TPD</span> (Tidak Presensi Datang)</li>
                <li><span class="badge badge-warning">TPP</span> (Tidak Presensi Pulang)</li>
                <li><span class="badge badge-danger">TK</span> (Tidak Masuk Kerja Tanpa Keterangan)</li>
                <li><span class="badge badge-info">D</span> (Libur)</li>
            </ol>
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message') ?>
     <form action="" method="get">
        <select class="form-control col-3 mb-1" name="bulan" id="bulan">
            <option value="" disabled selected>-- Pilih Bulan --</option>
            <?php foreach ($all_bulan as $bn => $bt): ?>
                <option value="<?= $bn ?>" <?= $bn == $bulan
    ? 'selected'
    : '' ?>><?= $bt ?></option>
                <?php endforeach; ?>
            </select>
             <select class="form-control col-3 mb-1" name="tahun" id="tahun">
                 <option value="" disabled selected>-- Pilih Tahun --</option>
                <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--): ?>
                    <option value="<?= $i ?>" <?= $i == $tahun
    ? 'selected'
    : '' ?>><?= $i ?></option>
                <?php endfor; ?>">
            </select>
            <input type="hidden" name="nbm" id="nbm" value="<?= $user[
                'no_reg'
            ] ?>">
            <!-- <select class="form-control col-3 mb-1" name="status_id" id="status_id">
                <option value="">-- Pilih Status --</option>
                <option value="1">Guru</option>
                <option value="2">Karyawan</option>
            </select> -->
            <select class="form-control col-3 mb-1" name="tp" id="tp">
                <option value="">-- Pilih Tahun Pelajaran --</option>
                <?php foreach ($tp as $tp): ?>
                <option value="<?= $tp['id'] ?>"><?= $tp['tp'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TANGGAL</th>
                        <th>MASUK</th>
                        <th>PULANG</th>
                        <th>TOTAL JAM</th>
                        <th>STATUS PRESENSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($hari as $j => $h): ?>
                        <?php $d = $this->db
                            ->get_where('tbl_dh', [
                                'date_in' => $h['tgl'],
                                'nbm' => $this->input->get('nbm'),
                            ])
                            ->row_array(); ?>
                       <tr>
                        <td align="center"><?= $i ?></td>
                        <td><?= tgl2($h['tgl']) ?></td>
                        <td style="text-align:center"><?= $d['time_in'] ?></td>
                        <td style="text-align:center"><?= $d['time_out'] ?></td>
                        <td style="text-align:center">
                            <?php
                            $date_awal = new DateTime($d['time_out']);
                            $date_akhir = new DateTime($d['time_in']);

                            if ($d['time_out'] == 0) {
                                echo $hasil = 0;
                            } else {
                                $selisih = $date_akhir->diff($date_awal);

                                $jam = $selisih->format('%h');
                                $menit = $selisih->format('%i');

                                if ($menit >= 0 && $menit <= 9) {
                                    $menit = '0' . $menit;
                                }

                                $hasil = $jam . '.' . $menit;
                                $hasil = number_format($hasil, 2);
                            }
                            echo $hasil;
                            ?>
                        </td>
                        <td style="text-align:center">
                            <?= is_weekend($h['tgl'])
                                ? '<span class="badge badge-info">D</span>'
                                : (!$d['date_in']
                                    ? '<span class="badge badge-danger">TK</span>'
                                    : ($d['time_in'] == 0
                                        ? '<span class="badge badge-warning">TPD</span>'
                                        : ($d['time_out'] == 0
                                            ? '<span class="badge badge-warning">TPP</span>'
                                            : ''))) ?>
                        </td>
                    </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?= base_url('ks/cetak_pdf_bln') ?>" method="get">
                <label for="">From</label>
                <input type="date" name="date1" id="date1">
                <label for="">To</label>
                <input type="date" name="date2" id="date2">
                <input type="hidden" name="bulan" id="bulan" value="<?= $bulan[
                    'id'
                ] ?>">
                <input type="hidden" name="nbm" id="nbm" value="<?= $id[
                    'no_reg'
                ] ?>">
                <input type="hidden" name="nama" id="nama" value="<?= $id[
                    'name'
                ] ?>">
                <button class="btn btn-google mb-2"><i class="far fa-file-pdf"> CETAK PDF</i></button>
                </a>
                <!-- <a href="">
                    <button class="btn btn-success mb-2"><i class="far fa-file-excel"> CETAK EXCEL</i></button>
                </a> -->
            </form>
        </div>
    </div>
</div>