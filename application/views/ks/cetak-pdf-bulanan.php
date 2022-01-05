<style>
    /* @page {
        margin-top: 0.5cm;
        margin-bottom: 1.5cm;
        margin-left: 1.0cm;
        margin-right: 1.0cm;
    } */
.column {
  float: left;
  width: 33.33%;
  padding: 15px;
}
.column2 {
  float: left;
  /* width: 50%; */
  padding: 15px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<h3 align="center">
    REKAP DAFTAR HADIR<br />
    Bulan <?= bulan($this->input->get('bulan')); ?>
</h3>
<table>
    <tbody>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><?= tgl2($this->input->get('date1')); ?> s/d <?= tgl2($this->input->get('date2')); ?></td>
        </tr>
        <tr>
            <td>NBM</td>
            <td>:</td>
            <td><?= $id['no_reg']; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= $id['name']; ?></td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td>:</td>
            <td>SMK Muhammadiyah Karangmojo</td>
        </tr>
    </tbody>
</table>
<br />
<table border="1" cellspacing="1" width="100%" cellspacing="0" id="absensi">
    <thead>
        <tr>
            <th width="25px">No.</th>
            <th width="150px">Hari, Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th width="80px">Status Presensi</th>
            <th>Total (Jam)</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td align="center"><?= $i; ?></td>
                <td><?= tgl2($d['date_in']); ?></td>
                <td align="center"><?= $d['time_in']; ?></td>
                <td align="center"><?= $d['time_out']; ?></td>
                <td align="center"><?= $d['status']; ?></td>
                <td align="center">
                    <?php
                    $date_awal  = new DateTime($d['time_out']);
                    $date_akhir = new DateTime($d['time_in']);
                    $selisih = $date_akhir->diff($date_awal);

                    $jam = $selisih->format('%h');
                    $menit = $selisih->format('%i');

                    if ($menit >= 0 && $menit <= 9) {
                        $menit = "0" . $menit;
                    }

                    $hasil = $jam . "." . $menit;
                    $hasil = number_format($hasil, 2);
                    $total += (float)$hasil;
                    ?>

                    <?= $hasil; ?>

                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        <tfoot>
            <tr>
                <th colspan="5">Total Jam Kerja</th>
                <th>
                    <?= $total; ?>
                </th>
            </tr>
            <tr>
                <th colspan="5">Standar Jam Kerja</th>
                <th></th>
            </tr>
        </tfoot>
    </tbody>
</table>
<div class="row">
  <div class="column">
    <p>coba</p>
 </div>
  <div class="column2">
    <table>
        <tbody>
            <tr>
                <td width="100px">Mengetahui,</td>
            </tr>
            <tr>
                <td>Kepala Sekolah</td>
                <td>Kepala Tata Usaha</td>
            </tr>
            <tr>
                <td height="120px">Munawar, S.Pd.I</td>
                <td>Gunadi, S.IP</td>
            </tr>
        </tbody>
    </table>
  </div>
</div>