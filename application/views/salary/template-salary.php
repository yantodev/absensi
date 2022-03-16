<h3><?= $title; ?></h3>

<form action="<?= base_url('salary/template_salary') ?> " method="get">
    <select class="form-control col-2 mb-1" name="status_id" id="status_id">
        <option value="">-- Pilih status --</option>
        <option value="1">Guru</option>
        <option value="2">Karyawan</option>
    </select>
    <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
</form>
<div>
    <table class="table table-bordered" width="100" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>#</th>
                <th>NBM</th>
                <th>NAMA</th>
                <th width="150px">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $d): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $d['nbm'] ?></td>
                <td><?= $d['nama'] ?></td>
                <td>
                    <a href="<?= base_url('salary/add_template/').$d['nbm']; ?>">
                        <button class="btn btn-success">
                            <i class="fa fa-credit-card fa-fw" alt="detail" title="Detail"></i> Template
                        </button>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>