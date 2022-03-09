<h3><?= $title; ?> bulan <?= allbulan($this->input->get('bulan')); ?> Tahun
    <?= $this->input->get('tahun');?></h3>

<form action="<?= base_url('guru/salary') ?> " method="get">
    <select class="mb-1" name="bulan" id="bulan">
        <option value="" disabled selected>-- Pilih Bulan --</option>
        <?php foreach ($all_bulan as $bn => $bt): ?>
        <option value="<?= $bn ?>" <?= $bn == $bulan ? 'selected' : '' ?>><?= $bt ?></option>
        <?php endforeach; ?>
    </select>
    <select class="mb-1" name="tahun" id="tahun">
        <option value="" disabled selected>-- Pilih Tahun --</option>
        <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--): ?>
        <option value="<?= $i ?>" <?= $i == $tahun ? 'selected' : '' ?>><?= $i ?></option>
        <?php endfor; ?>">
    </select>
    <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
</form>

<div class="card-body">
    <div class="col">
        <?php foreach($category as $category): ?>
        <?php
            $data = $this->db->get_where('tbl_list_salary',[
                'id_peg' => $user['no_reg'],
                'id_salary_category'=>$category['id'],
                'month' => $this->input->get('bulan'),
                'year' => $this->input->get('tahun'),
                'is_deleted'=>0,
            ])->result_array();
        ?>
        <div class="card mb-3">
            <div class="card-header text-uppercase">
                <b><?= $category['name']; ?></b>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>QTY</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $d): ?>
                    <?php
                    $sub = $this->db->get_where('tbl_salary_sub_category',
                    [
                        'is_deleted'=>0,
                        'id_salary_category' => $d['id_salary_category'],
                        'id'=>$d['id_salary_sub_category'],
                    ])->row_array();
                    ?>
                    <tr>
                        <td><?= $sub['name']; ?></td>
                        <td>
                            <?php
                        $master = $this->db->get_where('tbl_master_salary',[
                            'is_deleted'=>0,
                            'id_salary_sub_category'=>$d['id_salary_sub_category']
                        ])->row_array(); 
                        echo convRupiah($master['price'])
                        ?>
                        </td>
                        <td><?= $d['qty']; ?></td>
                        <td><?= convRupiah($d['price'] * $d['qty']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>
                            <?php
                            $total = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $user['no_reg'],
                                'id_salary_category' => $category['id'],
                            ])->result_array();
                            
                            if(!$master){
                                $total = 0;
                            }
                            
                            foreach ($master as $m){
                                $total += $m['price'] * $m['qty'];
                            }
                            echo convRupiah($total);
                            ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php endforeach; ?>
        <div class="card-body float-right">
            <div class="row">
                <div class="card-header text-uppercase">Total Gaji</div>
                <div class="card-header text-uppercase">
                    <?php
                            $totalUmum = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $user['no_reg'],
                                'id_salary_category' => 1,
                            ])->result_array();
                            
                            if(!$master){
                                $totalUmum = 0;
                            }
                            
                            foreach ($master as $m){
                                $totalUmum += $m['price'] * $m['qty'];
                            }

                            $totalJabatan = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $user['no_reg'],
                                'id_salary_category' => 2,
                            ])->result_array();
                            
                            if(!$master){
                                $totalJabatan = 0;
                            }
                            
                            foreach ($master as $m){
                                $totalJabatan += $m['price'] * $m['qty'];
                            }

                            $totalStafsus = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $user['no_reg'],
                                'id_salary_category' => 3,
                            ])->result_array();
                            
                            if(!$master){
                                $totalStafsus = 0;
                            }
                            
                            foreach ($master as $m){
                                if(!$master){
                                $totalStafsus = 0;
                            }
                                $totalStafsus += $m['price'] * $m['qty'];
                            }
                            $totalKeamanan = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $user['no_reg'],
                                'id_salary_category' => 4,
                            ])->result_array();
                            
                            if(!$master){
                                $totalKeamanan = 0;
                            }
                            
                            foreach ($master as $m){
                                $totalKeamanan += $m['price'] * $m['qty'];
                            }
                            $totalPotongan = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $user['no_reg'],
                                'id_salary_category' => 5,
                            ])->result_array();
                            
                            if(!$master){
                                $totalPotongan = 0;
                            }
                            
                            foreach ($master as $m){
                                $totalPotongan += $m['price'] * $m['qty'];
                            }
                            ?>
                    <b><?= convRupiah(($totalUmum + $totalJabatan + $totalStafsus + $totalKeamanan) - $totalPotongan); ?></b>
                </div>
            </div>
            <form action="<?= base_url('guru/cetak_salary') ?>" method="get">
                <input type="hidden" name="bulan" id="bulan" value="<?= $this->input->get('bulan') ?>">
                <input type="hidden" name="tahun" id="tahun" value="<?= $this->input->get('tahun') ?>">
                <button class="btn btn-google mt-2"><i class="far fa-file-pdf"> CETAK PDF</i></button>
                </a>
            </form>
        </div>
    </div>
</div>