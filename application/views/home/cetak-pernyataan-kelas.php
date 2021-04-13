<!-- Contact-->
<style>
    h2,
    h3 {
        text-align: center;
    }

    p .belum {
        background-color: red;
        color: red;
    }
</style>
<div class="container">
    <div class="text-center">
        <h2>REKAP SURAT PERNYTAAN</h2>
        <h3>SMK MUHAMMADIYAH KARANGMOJO</h3>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <table border="1" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <th width="50px">No.</th>
                        <th width="100px">NIS</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td scope="row" align="center"><?= $i; ?></td>
                            <td align="center"><?= $d['nis']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td align="center"><?= $d['kelas']; ?></td>
                            <td align="center">
                                <?php
                                $nis = $d['nis'];
                                $count = $this->db->get_where('tbl_surat_pernyataan', ['nis' => $d['nis']])->result_array();
                                $result = count($count);
                                // echo $result;
                                if ($result < 1) {
                                    echo "Belum";
                                } elseif ($result <= 1) {
                                    echo "Sudah";
                                } else {
                                    echo "lebih 1x";
                                }
                                ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>