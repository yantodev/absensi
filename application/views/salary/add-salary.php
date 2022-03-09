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
                'year' => $year,
                 'is_deleted'=>0,
            ])->result_array();
        ?>
        <div class="card mb-3">
            <div class="card-header text-uppercase">
                <b><?= $category['name']; ?></b>
                <button class="btn btn-primary" onclick="getSubCategory(
                    <?= $category['id'];?>,
                    <?= $nbm;?>,
                    <?= $month;?>,
                    <?= $year;?>)"><i data-toggle=" modal" data-target="#update" class="fa fa-edit fa-fw" alt="detail"
                        title="Edit"></i> Add Data</button>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>NAME</th>
                    <th>QTY</th>
                    <th>PRICE</th>
                    <th>TOTAL</th>
                    <th>ACTION</th>
                </tr>
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
                    <td width="5px">
                        <?= $d['qty'] ?>
                    </td>
                    <td>
                        <?= convRupiah($d['price']) ?>
                    </td>
                    <td><?= convRupiah($d['price'] * $d['qty']); ?></td>
                    <td width="5px" align="center">
                        <badge style="cursor:pointer" class="badge badge-success"
                            onClick='updateSalary("<?= $sub['name']; ?>",<?= $d['id'];?>,<?= $d['qty'];?>,<?= $d['price'];?>)'>
                            <i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i>
                        </badge>
                        <badge style="cursor:pointer" class="badge badge-danger"
                            onClick='deleteSalary(<?= $d['id'];?>)'>
                            <i class="fa fa-trash fa-fw" alt="detail" title="Edit"></i>
                        </badge>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endforeach; ?>
    </div>
</div>