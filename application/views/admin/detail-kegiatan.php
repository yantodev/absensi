<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase ">daftar hadir Kegiatan</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th width="100px">NBM</th>
                        <th>NAMA</th>
                        <th>STATUS</th>
                        <th>ALASAN</th>
                        <th width="50px">TTD</th>
                        <th width="50px">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></td>
                            <td><?= $d['nbm']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['status']; ?></td>
                            <td><?= $d['alasan']; ?></td>
                            <td><img src="<?= base_url() . $d['ttd']; ?>" width="50px" height="50px"></td>
                            <td>
                                <a href="<?= base_url('admin/edit_dhkeg/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>