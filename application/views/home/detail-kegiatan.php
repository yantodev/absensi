<!-- Contact-->
<section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">DETAIL KEGIATAN</h2>
            <h2 class="section-subheading">SMK MUHAMMADIYAH KARANGMOJO</h2>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Kegiatan SMK Muhammadiyah Karangmojo</h6>
                <small>Klik tombol <br />
                    <i class="fa fa-edit"></i> untuk megikuti kegiatan<br />
                    <i class="fa fa-eye"></i> untuk melihat daftar peserta</small>
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

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Warning!</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    Sign before you submit!
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-success">
                    Absensi berhasil, Terima Kasih!!!!
                </div>
            </div>
        </div>
    </div>
</div>