<style>
    @page {
        margin-top: 0.5cm;
        margin-bottom: 0.5cm;
        margin-left: 1.0cm;
        margin-right: 1.0cm;
        /* background-image: url('assets/img/pi-2020.png'); */
    }
</style>
<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<h3 align="center">
    REKAP DAFTAR HADIR<br />
    Bulan <?= bulan($bulan); ?>
</h3>
<table>
    <tbody>
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
    </tbody>
</table>
<br />
<table border="1" cellspacing="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th width="25px">No.</th>
            <th width="180px">Hari, Tanggal</th>
            <th>Status</th>
            <th width="80px">Jam Masuk</th>
            <th>TTD</th>
            <th width="80px">Jam Pulang</th>
            <th>TTD</th>
            <th width="50px">TOTAL JAM</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td align="center"><?= $i; ?></td>
                <td><?= tgl($d['date_in']); ?></td>
                <td align="center"><?= $d['status']; ?></td>
                <td align="center"><?= $d['time_in']; ?></td>
                <td align="center"><img src="<?= base_url() . $d['ttd_in']; ?>" width="50px" height="50px"></td>
                <td align="center"><?= $d['time_out']; ?></td>
                <td align="center"><img src="<?= base_url() . $d['ttd_out']; ?>" width="50px" height="50px"></td>
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
                    ?>

                    <?= $hasil; ?>

                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>