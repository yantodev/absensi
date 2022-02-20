<h3>Selamat datang, <?= $user['name']; ?></h3>
<p>Daftar Hadir <?= hari_ini(); ?>, <?= date('d F Y'); ?> </p>
<?= $this->session->flashdata('message'); ?>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Taggal</th>
                <th>NBM</th>
                <th>Name</th>
                <th>MASUK</th>
                <th>PULANG</th>
                <th>STATUS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $d) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $d['date_in'] ?></td>
                <td><?= $d['nbm']; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['time_in']; ?></td>
                <td><?= $d['time_out']; ?></td>
                <td><?= $d['status']; ?></td>
                <td>
                    <a href="<?= base_url('admin/edit_hr/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail"
                            title="Edit"></i></a>
                    <a href="<?= base_url(); ?>admin/hapus/<?= $d['id']; ?>"><i class="fa fa-trash fa-fw"
                            alt="verifikasi" title="Hapus" onclick="return confirm('Yakin ingin menghapus?');"></i></a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>