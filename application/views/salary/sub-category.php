<h1><?= $title; ?></h1>
<div class="card-body">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
    <?php if($this->session->flashdata('message')) :?>
    <?php endif; ?>
    <div class="table-responsive">
        <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#add">Add
            Sub Category</button>
        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Sub Category</th>
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
                        $st = $this->db->get_where('tbl_salary_category',['id'=>$d['id_salary_category']])->row_array();
                        echo $st['name']
                        ?>

                    </td>
                    <td> <?= $d['name']; ?></td>
                    <td>
                        <a href="<?= base_url('salary/edit_salary/').$d['nbm'] ?>">
                            <i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i>
                        </a>
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
                <form action="<?= base_url('salary/sub_category') ?>" method="post">
                    <div class="form-group row">
                        <label class="col-3 form-label">Name Catagory</label>
                        <div class="col">
                            <select class="form-control" name="category" id="category">
                                <option value="">-- Pilih --</option>
                                <?php foreach($category as $cat): ?>
                                <option value="<?= $cat['id'];?>"> <?= $cat['name'];?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">Name Sub Catagory</label>
                        <div class="col">
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