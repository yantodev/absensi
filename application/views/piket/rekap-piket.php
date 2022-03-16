<h3><?= $title; ?></h3>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
<?php if($this->session->flashdata('message')) :?>
<?php endif; ?>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?= base_url('piket/rekap_piket_hr') ?> " method="get">
            <input type="hidden" name="status_id" id="status_id" value="1">
            <input class="form-control col-2 mb-1" type="date" id="date" name="date" required>
            <button type=" submit" class="btn btn-facebook mb-2">VIEW</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align: middle;text-align: center">NO</th>
                        <th rowspan=" 2" style="vertical-align: middle;text-align: center">NAMA</th>
                        <th colspan="12" style="vertical-align: middle;text-align: center">JAM MENGAJAR</th>
                        <th rowspan="2" style="vertical-align: middle;text-align: center">ACTION</th>
                    </tr>
                    <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($data as $d): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['nama']; ?></td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(1, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=1 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(2, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=2 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(3, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=3 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(4, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=4 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(5, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=5 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(6, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=6 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(7, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=7 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(8, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=8 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(9, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=9 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(10, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=10 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(11, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=11 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-kbm" type="checkbox"
                                    <?= check_kbm(12, $d['nbm'], $this->input->get('date')); ?>
                                    data-nbm="<?= $d['nbm'];?>" data-jam=12 data-date="<?= $this->input->get('date');?>"
                                    data-created_by="<?= $user['name'];?>">
                            </div>
                        </td>
                        <td>
                            <!-- <badge style="cursor:pointer" class="badge badge-primary"
                                onClick="addkbm('<?= $d['nama']; ?>' , <?= $d['nbm']; ?>, '<?= $this->input->get('date'); ?>', '<?= $user['name']; ?>')">
                                <i class="fa fa-edit fa-fw" alt="add" title="add"></i>
                            </badge> -->
                            <a href="<?= base_url('piket/detail_kbm/'.$d['nbm']."/". $this->input->get('date'));?>">
                                <badge style="cursor:pointer" class="badge badge-info">
                                    <i class="fa fa-eye fa-fw" alt="detail" title="detail"></i>
                                </badge>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>