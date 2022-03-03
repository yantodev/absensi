<h1><?= $title; ?></h1>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
<?php if($this->session->flashdata('message')) :?>
<?php endif; ?>
<div class="card-body">
    <div class="table-responsive">
        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#add">Add
            Master Salary</button>
        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>CATEGORY</th>
                    <th>SUB CATEGORY</th>
                    <th>QTY</th>
                    <th>PRICE</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($data as $d): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <?php
                        $cat = $this->db->get_where('tbl_salary_category',['id' =>$d['id_salary_category']])->row_array();
                        echo $cat['name']
                        ?>
                    </td>
                    <td>
                        <?php
                        $sub = $this->db->get_where('tbl_salary_sub_category',['id' =>$d['id_salary_sub_category']])->row_array();
                        echo $sub['name']
                        ?>
                    </td>
                    <td><?= $d['qty']; ?></td>
                    <td><?= convRupiah($d['price']); ?></td>
                    <td>
                        <!-- <button type="button" class="btn btn-info" onclick="updateCategory(<?= $d['id'];?>)">
                            <i class="fa fa-edit fa-fw" alt="edit" title="Edit"></i>Edit
                        </button> -->
                        <!-- <a href="#update" data-toggle="modal" data-id="<?= $d['id'];?>" data-name="<?= $d['name'];?>">
                            <i data-toggle=" modal" data-target="#update" class="fa fa-edit fa-fw" alt="detail"
                                title="Edit"></i>
                        </a> -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- add modal -->
<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('salary/master_salary') ?>" method="post">
                    <div class="form-group row">
                        <label class="col-3 form-label">Name Catagory</label>
                        <div class="col">
                            <select class="form-control" name="sub-category" id="sub-category">
                                <option value="">-- Pilih Category --</option>
                                <?php foreach($category as $cat): ?>
                                <option value="<?= $cat['id'];?>"> <?= $cat['name'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">Name Sub Catagory</label>
                        <div class="col">
                            <select class="form-control" name="sub-category" id="sub-category">
                                <option value="">-- Pilih Sub Category --</option>
                                <?php foreach($subcategory as $sub): ?>
                                <option value="<?= $sub['id'];?>"> <?= $sub['name'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">QTY</label>
                        <div class="col">
                            <input type="number" class="form-control" name="qty" id="qty">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">PRICE</label>
                        <div class="col">
                            <input type="number" class="form-control" name="price" id="price">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- edit modal -->
<div id="update" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="<?= base_url('salary/edit_category') ?>" method="post"
                    enctype="multipart/form-data" role="form">
                    <div class="form-group row">
                        <label class="col-3 form-label">Name Catagory</label>
                        <div class="col">
                            <input type="text" class="form-control" name="id" id="id" hidden>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    // Untuk sunting
    $('#update').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)
        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
        modal.find('#name').attr("value", div.data('name'));
    });
});
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>