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
    Bulan <?= bulan($this->input->get('bulan')); ?>
</h3>
<br />
<table border="1" cellspacing="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th width="25px">No.</th>
            <th>NIP/NBM</th>
            <th>Nama</th>
            <th width="50px">Hadir</th>
            <th width="50px">Izin</th>
            <th width="50px">Alpha</th>
            <th width="100px">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td align="center"><?= $i; ?></td>
                <td><?= $d['nbm']; ?></td>
                <td><?= $d['nama']; ?></td>
                <td align="center">
                    <?php
                    $hadir = $this->db->get_where('tbl_dh', [
                        'nbm' => $d['nbm'],
                        'status' => 'Hadir',
                        'bulan' =>  $this->input->get('bulan'),
                        'tp' => $this->input->get('tp'),
                    ])->result_array();
                    echo count($hadir);
                    ?>
                </td>
                <td align="center">
                    <?php
                    $izin = $this->db->get_where('tbl_dh', ['nbm' => $d['nbm'], 'status' => 'Izin'])->result_array();
                    echo count($izin);
                    ?>
                </td>
                <td align="center">
                    <?php
                    $izin = $this->db->get_where('tbl_dh', ['nbm' => $d['nbm'], 'status' => 'Izin'])->result_array();
                    echo count($izin);
                    ?>
                </td>
                <td align="center">
                    <?php
                    $ket = 80;
                    if ($ket == 100) {
                        echo "Sangat Bagus";
                    } else if ($ket >= 90) {
                        echo "Bagus";
                    } else {
                        echo "Kurang";
                    }
                    ?>

                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>