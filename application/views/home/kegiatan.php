<!-- Contact-->
<section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Daftar Kegiatan</h2>
            <h2 class="section-subheading">SMK MUHAMMADIYAH KARANGMOJO</h2>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Kegiatan SMK Muhammadiyah Karangmojo</h6>
                <small>Klik <b>ABSEN</b> untuk megikuti kegiatan</small>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="50px">#</th>
                                <th width="230px">TANGGAL</th>
                                <th width="100px">JAM</th>
                                <th>KEGIATAN</th>
                                <th width="120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $d) : ?>
                                <tr>
                                    <td scope="row"><?= $i; ?></td>
                                    <td><?= tgl($d['tgl']); ?></td>
                                    <td><?= $d['time']; ?></td>
                                    <td><?= $d['kegiatan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('home/absen_kegiatan/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Absen Sekarang"></i></a>
                                        <a href="<?= base_url('home/absen_kegiatan/') . $d['id']; ?>"><i class="fa fa-eye fa-fw" alt="detail" title="View Detail"></i></a>
                                    </td>
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