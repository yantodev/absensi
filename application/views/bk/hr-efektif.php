<!-- DataTales Example -->
<div class="card shadow mb-4 col-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">tabel hari efektif</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <form action="<?= base_url('admin/hr_efektif'); ?>" method="POST">
                <table class="table table-bordered" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="25px">#</th>
                            <th>Bulan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $d) : ?>
                            <tr>
                                <td><?= $i; ?>
                                    <input type="hidden" name="id[]" id="id" value="<?= $d['id']; ?>">
                                </td>
                                <td><?= $d['bulan']; ?></td>
                                <td><input class="col" type="number" name="jml[]" id="jml" value="<?= $d['jml']; ?>"></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-facebook">SIMPAN</button>
            </form>
        </div>
    </div>
</div>