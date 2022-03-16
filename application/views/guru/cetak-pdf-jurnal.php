<style>
@page {
    margin-top: 0.5cm;
    margin-bottom: 0.5cm;
    margin-left: 1.0cm;
    margin-right: 1.0cm;
    /* background-image: url('assets/img/pi-2020.png'); */
}
</style>
<img src="<?= base_url('assets/img/kop.png'); ?>">
<h3 style="text-align: center;">Rekap Jurnal</h3>
<table>
    <tr>
        <td>NBM</td>
        <td>:</td>
        <td><?= $data['nbm']; ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?= $data['nama']; ?></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td>
            <?php
            $result = $this->db->get_where('tbl_gukar', ['nbm' => $data['nbm']])->row_array();
            echo $result['jabatan'];
            ?>
        </td>
    </tr>
</table>
<p>Daftar kegiatan pada :<?= tgl($data['tgl']); ?></p>
<table class="table" width="100%" border="1" cellspacing="">
    <thead>
        <tr>
            <th width="25px">No.</th>
            <th width="70px">Jam</th>
            <th>Kegiatan</th>
            <th width="100px">Dokementasi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data2 as $d) : ?>
        <tr>
            <td valign="top" align="center"><?= $i; ?></td>
            <td valign="top"><?= $d['time']; ?></td>
            <td valign="top"><?= $d['kegiatan']; ?></td>
            <td><img src="<?= base_url('image/jurnal/' . $d['foto']); ?>" width="100px" height="100px"></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>