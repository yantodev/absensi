<h4 style="text-align: center"><?= $title; ?></h4>
<?php foreach($data as $d): ?>
<div class="card mt-3">
    <table class="table table-bordered">
        <tr>
            <th width="25%">Nama Kegiatan</th>
            <th width="1%">:</th>
            <th><?= $d['kegiatan']; ?></th>
        </tr>
        <tr>
            <th>Hari, Tanggal</th>
            <th>:</th>
            <th><?= format_indo($d['tgl']); ?></th>
        </tr>
        <tr>
            <th>Jam</th>
            <th>:</th>
            <th><?= $d['time']; ?></th>
        </tr>
        <tr>
            <th>Catatan Kegiatan</th>
            <th>:</th>
            <th><?= $d['keterangan']; ?></th>
        </tr>
        <tr>
            <th colspan="3" style="vertical-align: middle; text-align: center">
                <button class="btn btn-success" onclick="cekEvent(<?= $d['id']; ?>, <?= $user['no_reg']; ?>)">
                    <i class="fa fa-edit fa-fw" alt="detail" title="Detail"></i>
                    PRESENSI</button>
            </th>
        </tr>
    </table>
</div>
<?php endforeach; ?>