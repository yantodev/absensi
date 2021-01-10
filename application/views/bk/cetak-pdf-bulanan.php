<style>
    @page {
        margin-top: 0.5cm;
        margin-bottom: 0.5cm;
        margin-left: 1.0cm;
        margin-right: 1.0cm;
        /* background-image: url('assets/img/pi-2020.png'); */
    }
</style>
<?php
$hadir = ($count->hadir / $efektif['jml']) * 100;
$izin = ($count->izin / $efektif['jml']) * 100;
$alpha = $efektif['jml'] - ($count->izin + $count->hadir);
?>
<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<h3 align="center">
    REKAP DAFTAR HADIR<br />
    Bulan <?= bulan($bulan); ?>
</h3>
<table>
    <tbody>
        <tr>
            <td>NIS</td>
            <td>:</td>
            <td><?= $id['nis']; ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?= ucwords(strtolower($id['nama'])); ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><?= $id['kelas']; ?></td>
        </tr>
        <tr>
            <td>jurusan</td>
            <td>:</td>
            <td><?= jurusan($id['jurusan']); ?></td>
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
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<br />
Keterangan :
<table>
    <tbody>
        <tr>
            <td>Hadir</td>
            <td>:</td>
            <td><?= $count->hadir; ?></td>
            <td> hari</td>
        </tr>
        <tr>
            <td>Izin</td>
            <td>:</td>
            <td><?= $count->izin; ?></td>
            <td> hari</td>
        </tr>
        <tr>
            <td>Alpha</td>
            <td>:</td>
            <td><?= $alpha; ?></td>
            <td> hari</td>
        </tr>
    </tbody>
</table>