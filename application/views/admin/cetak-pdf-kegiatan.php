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
    <?= $data['kegiatan']; ?>
</h3>
<p style="text-align:right"><?= tgl($tgl['tgl']); ?></p>
<table border="1" cellspacing="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th width="25px">No.</th>
            <th width="25px">NBM</th>
            <th>NAMA</th>
            <th>JABATAN</th>
            <th>STATUS</th>
            <th>TTD</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data2 as $d) : ?>
            <tr>
                <td align="center"><?= $i; ?></td>
                <td><?= $d['no_id']; ?></td>
                <td>
                    <?php
                    $data = $this->db->get_where('tbl_gukar', ['nbm' => $d['no_id']])->row_array();
                    echo $data['nama'];
                    ?>
                </td>
                <td>
                    <?php
                    $data = $this->db->get_where('tbl_gukar', ['nbm' => $d['no_id']])->row_array();
                    echo $data['jabatan'];
                    ?>
                </td>
                <td align="center"><?= $d['status']; ?></td>
                <td align="center"><img src="<?= base_url() . $d['ttd']; ?>" width="50px" height="50px"></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>