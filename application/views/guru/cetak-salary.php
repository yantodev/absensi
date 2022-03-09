<style>
@page {
    margin-top: 0.5cm;
    margin-bottom: 0.5cm;
    margin-left: 0.5cm;
    margin-right: 0.5cm;
}
</style>
<p style="text-align: center;margin:0px;padding:0px">Struk Gaji Pegawai</p>
<p style="text-align: center;margin:0px;padding:0px">SMK Muhammadiyah Karangmojo</p>

<div class="card-body">
    <div class="col">
        <table>
            <tbody>
                <tr>
                    <td width="120px">Bulan/Tahun</td>
                    <td> : </td>
                    <td><?= allbulan($this->input->get('bulan'))." ".$this->input->get('tahun')?></td>
                </tr>
                <tr>
                    <td>Stay Sekolah</td>
                    <td> : </td>
                    <td>
                        <?php
                        $getQty = $this->db->get_where('tbl_list_salary',[
                            'id_peg' => $user['no_reg'],
                            'month' => $this->input->get('bulan'),
                            'year' => $this->input->get('tahun'),
                            'id_salary_category' => 1,
                            'id_salary_sub_category' =>3
                        ])->row_array();
                        echo $getQty['qty']
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Bp/Ibu</td>
                    <td> : </td>
                    <td><?= $user['name']; ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td> : </td>
                    <td>
                        <?php
                        $getGukar = $this->db->get_where('tbl_gukar',['nbm'=>$user['no_reg']])->row_array();
                        $status = $this->db->get_where('tbl_ref_status',['id'=>$getGukar['status']])->row_array();
                        echo $status['name'];
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
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
            <div class="card-header">
                <ul>
                    <li>
                        <b><?= $category['name']; ?></b>
                        <table>
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
                                <?php
                                $master = $this->db->get_where('tbl_master_salary',[
                                    'is_deleted'=>0,
                                    'id_salary_sub_category'=>$d['id_salary_sub_category']
                                ])->row_array();
                                ?>
                                <tr>
                                    <td width="200px">
                                        <ul>
                                            <li>
                                                <?= $sub['name']; ?>
                                            </li>
                                        </ul>
                                    </td>
                                    <td></td>
                                    <td><?= convRupiah($master['price'] * $master['qty']); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>

        </div>
        <?php endforeach; ?>
        <div class="card-body">
            <div class="card-header text-uppercase" style="margin-left:150px">
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
                <b>
                    Total Terima
                    <?= convRupiah(($totalUmum + $totalJabatan + $totalStafsus + $totalKeamanan) - $totalPotongan); ?></b>
            </div>
        </div>
    </div>
</div>