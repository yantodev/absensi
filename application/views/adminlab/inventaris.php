<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA INVENTARIS LABORATORIUM</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Lokasi</th>
                        <th>No. Inventaris</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['kode_lokasi']; ?></td>
                            <td><?= $d['no_inv']; ?></td>
                            <td><?= $d['jenis']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td>
                                <a href="<?= base_url('adminlab/detailinventaris/') . $d['id']; ?>" class="badge badge-warning">view</a>
                                <a href="<?= base_url('admin/edit/') . $d['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#hapusModal">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>