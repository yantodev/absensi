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
            <form action="<?= base_url('admin/cetak_pdf_kegiatan'); ?>" method="get">
                <input type="hidden" name="id" id="id" value="<?= $id; ?>">
                <input type="hidden" name="kegiatan" id="kegiatan" value="<?= $data2['kegiatan']; ?>">
                <button class="btn btn-google mb-2"><i class="far fa-file-pdf"> CETAK PDF</i></button>
                </a>
                <!-- <a href="">
                    <button class="btn btn-success mb-2"><i class="far fa-file-excel"> CETAK EXCEL</i></button>
                </a> -->
            </form>
        </div>
    </div>
</div>