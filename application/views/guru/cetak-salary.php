<img src="<?= base_url('assets/img/kop.png'); ?>">
<table width="100%">
    <tr>
        <th>
            <h3 style="text-align: center;margin:0px;padding:0px">SLIP GAJI PEGAWAI</h3>
            <h3 style="text-align: center;margin-top:0px;padding:0px">SMK Muhammadiyah Karangmojo</h3>
        </th>
        <th>

        </th>
    </tr>
</table>

<div class="card-body" style="margin-top:10px">
    <div class="col">
        <div class="kotak"></div>
        <table width="100%">
            <tbody>
                <tr>
                    <td width="80px">Nama</td>
                    <td width="330px">: <?=$user['name'];?></td>
                    <td width="120px">Bulan/Tahun</td>
                    <td>: <?=allbulan($this->input->get('bulan'))." ".$this->input->get('tahun')?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:
                        <?php
                            $getGukar=$this->db->get_where('tbl_gukar', ['nbm'=>$user['no_reg']])->row_array();
                            $status=$this->db->get_where('tbl_ref_status', ['id'=>$getGukar['status']])->row_array();
                            echo $status['name'];
                        ?>
                    </td>
                    <td>Stay Sekolah</td>
                    <td>:
                        <?php $getQty=$this->db->get_where('tbl_list_salary', [
                            'id_peg'=> $user['no_reg'],
                            'month'=> $this->input->get('bulan'),
                            'year'=> $this->input->get('tahun'),
                            'id_salary_category'=> 1,
                            'id_salary_sub_category'=>3])->row_array();
                        echo $getQty['qty']
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="kotak"></div>
        <table width="100%">
            <thead>
                <tr>
                    <th width="50px">NO</th>
                    <th width="500px" align="left">KETERANGAN</th>
                    <th align="right">JUMLAH</th>
                </tr>
            </thead>
        </table>
        <div class="kotak"></div>
        <?php $no=1; ?>
        <?php foreach($category as $category): ?>
        <?php $data=$this->db->get_where('tbl_list_salary', [ 'id_peg'=> $user['no_reg'],
                'id_salary_category'=>$category['id'],
                'month'=> $this->input->get('bulan'),
                'year'=> $this->input->get('tahun'),
                'is_deleted'=>0,
                ])->result_array();
            ?>
        <table width="100%">
            <tbody>
                <tr>
                    <td width="50px" align="center" valign="top"><?= $no++; ?></td>
                    <td>
                        <?= $category['name']; ?>
                        <table width="100%">
                            <tbody>
                                <?php foreach($data as $d): ?><?php $sub=$this->db->get_where('tbl_salary_sub_category',
                                    [ 'is_deleted'=>0,
                                    'id_salary_category'=> $d['id_salary_category'],
                                    'id'=>$d['id_salary_sub_category'],
                                    ])->row_array();
                                ?>
                                <?php $master=$this->db->get_where('tbl_master_salary', [
                                    'is_deleted'=>0,
                                    'id_salary_sub_category'=>$d['id_salary_sub_category']
                                ])->row_array();?>
                                <tr>
                                    <td width=" 500px">
                                        <ul>
                                            <li><?=$sub['name'];?></li>
                                        </ul>
                                    </td>
                                    <td align="right"><?=convRupiah($d['price'] * $d['qty']);?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php endforeach;?>
    <div class="kotak"></div>
    <?php $totalUmum=0;
                    $master=$this->db->get_where('tbl_list_salary', [ 'month'=> $this->input->get('bulan'),
                        'year'=> $this->input->get('tahun'),
                        'id_peg'=> $user['no_reg'],
                        'id_salary_category'=> 1,
                        ])->result_array();

                    if( !$master) {
                        $totalUmum=0;
                    }

                    foreach ($master as $m) {
                        $totalUmum+=$m['price'] * $m['qty'];
                    }

                    $totalJabatan=0;
                    $master=$this->db->get_where('tbl_list_salary', [ 'month'=> $this->input->get('bulan'),
                        'year'=> $this->input->get('tahun'),
                        'id_peg'=> $user['no_reg'],
                        'id_salary_category'=> 2,
                        ])->result_array();

                    if( !$master) {
                        $totalJabatan=0;
                    }

                    foreach ($master as $m) {
                        $totalJabatan+=$m['price'] * $m['qty'];
                    }

                    $totalStafsus=0;
                    $master=$this->db->get_where('tbl_list_salary', [ 'month'=> $this->input->get('bulan'),
                        'year'=> $this->input->get('tahun'),
                        'id_peg'=> $user['no_reg'],
                        'id_salary_category'=> 3,
                        ])->result_array();

                    if( !$master) {
                        $totalStafsus=0;
                    }

                    foreach ($master as $m) {
                        if( !$master) {
                            $totalStafsus=0;
                        }

                        $totalStafsus+=$m['price'] * $m['qty'];
                    }

                    $totalKeamanan=0;
                    $master=$this->db->get_where('tbl_list_salary', [ 'month'=> $this->input->get('bulan'),
                        'year'=> $this->input->get('tahun'),
                        'id_peg'=> $user['no_reg'],
                        'id_salary_category'=> 4,
                        ])->result_array();

                    if( !$master) {
                        $totalKeamanan=0;
                    }

                    foreach ($master as $m) {
                        $totalKeamanan+=$m['price'] * $m['qty'];
                    }

                    $totalPotongan=0;
                    $master=$this->db->get_where('tbl_list_salary', [ 'month'=> $this->input->get('bulan'),
                        'year'=> $this->input->get('tahun'),
                        'id_peg'=> $user['no_reg'],
                        'id_salary_category'=> 5,
                        ])->result_array();

                    if( !$master) {
                        $totalPotongan=0;
                    }

                    foreach ($master as $m) {
                        $totalPotongan+=$m['price'] * $m['qty'];
                    }
                    ?>
    <table width="100%">
        <thead>
            <tr>
                <th width="370px" align="left">
                    <?= terbilang(($totalUmum + $totalJabatan + $totalStafsus + $totalKeamanan) - $totalPotongan); ?>
                </th>
                <th width="150px" align="right">
                    TOTAL DITERIMA
                </th>
                <th align="right">
                    <?=convRupiah(($totalUmum + $totalJabatan + $totalStafsus + $totalKeamanan) - $totalPotongan);?>
                </th>
            </tr>
        </thead>
    </table>
    <div class="kotak"></div>
</div>
<div style="margin-top:15px">
    <table width="100%">
        <thead>
            <tr>
                <th width="200px" valign="top">Penerima,</th>
                <th rowspan="2" align="center" valign="center">
                    <barcode code="<?= base_url(); ?>" size="1.2" type="QR" error="M" class="barcode" />
                </th>
                <th align="center" valign="center">
                    05 <?=allbulan($this->input->get('bulan'))." ".$this->input->get('tahun')?><br>
                    Bendahara,
                </th>
            </tr>
            <tr>
                <th height="80px" valign="bottom">
                    <?=$user['name'];?>
                </th>
                <th valign="bottom">Bampang Sumpono, S.E</th>
            </tr>
        </thead>
    </table>
</div>