<?php $employee = $this->db->get_where('tbl_gukar',['nbm'=>$nbm])->row_array(); ?>
<h2><?= $title; ?> <?= $employee['nama']; ?></h2>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
<?php if($this->session->flashdata('message')) :?>
<?php endif; ?>
<div class="card-body">
    <div class="col">
        <?php foreach($category as $category): ?>
        <?php 
            $data = $this->db->get_where('tbl_list_salary',[
                'id_peg' => $nbm,
                'id_salary_category'=>$category['id'],
                'month' => $month,
                'year' => $year
            ])->result_array();
        ?>
        <div class="card mb-3">
            <div class="card-header text-uppercase">
                <b><?= $category['name']; ?></b>
                <button class="btn btn-primary" onclick="alert(<?= $category['id'];?>)">Add Data</button>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>TOTAL</th>
                </tr>
                <?php foreach($data as $d): ?>
                <?php
                    $sub = $this->db->get_where('tbl_salary_sub_category',
                    [
                        'is_deleted'=>0,
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
                    <td><?= $master['qty']; ?></td>
                    <td><?= convRupiah($master['price'] * $master['qty']); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endforeach; ?>
    </div>
</div>