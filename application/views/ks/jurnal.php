<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">
            <?php
            $nama = $this->db->get_where('tbl_gukar', ['nbm' => $data2])->row_array();

            echo "Jurnal Kegitan Guru " . $nama['nama'];
            ?>
        </h6>
        <!-- <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit Data |
            <i class="fa fa-trash"></i> Hapus Data
        </small> -->
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('ks/jurnal'); ?> " method="get">
            <select name="nbm" id="nbm">
                <option value="">Pilih Guru</option>
                <?php foreach ($guru as $d) : ?>
                    <option value="<?= $d['nbm']; ?>"><?= $d['nama']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">VIEW</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="25px">#</th>
                        <th width="200px">TANGGAL</th>
                        <th width="100px">Waktu</th>
                        <th>Kegiatan</th>
                        <th width="50px">Dokumentasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= tgl($d['tgl']); ?></td>
                            <td><?= $d['time']; ?></td>
                            <td><?= $d['kegiatan']; ?></td>
                            <td><img src="<?= base_url('image/jurnal/') . $d['foto']; ?>" width="100px" height="100px"></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-google mb-3" data-toggle="modal" data-target="#pdf_hari">
                <i class="far fa-file-pdf"></i> Cetak Harian
            </button>
            <button type="button" class="btn btn-google mb-3" data-toggle="modal" data-target="#pdf_bulan">
                <i class="far fa-file-pdf"></i> Cetak Bulanan
            </button>
        </div>
    </div>
</div>

<!-- PDF Harian -->
<div class="modal fade" id="pdf_hari" tabindex="-1" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewRoleModalLabel">Cetak PDF Jurnal Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('ks/jurnal_harian'); ?>" method="post">
                <div class="form-group">
                    <label class="form-group col-lg">Tanggal</label>
                    <div class="col-lg">
                        <input class="form-control" type="date" id="tgl" name="tgl" required>
                    </div>
                </div>
                <input type="hidden" name="nama" id="nama" value="<?php
                                                                    $nama = $this->db->get_where('tbl_gukar', ['nbm' => $data2])->row_array();
                                                                    echo $nama['nama'];
                                                                    ?>">
                <input type="hidden" name="nbm" id="nbm" value="<?= $data2; ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-google"><i class="far fa-file-pdf"></i> CETAK PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- PDF Bulanan -->
<div class="modal fade" id="pdf_bulan" tabindex="-1" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewRoleModalLabel">Cetak PDF Jurnal Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('ks/jurnal_bulanan'); ?>" method="post">
                <div class="form-group">
                    <label class="form-group col-lg">Bulan</label>
                    <div class="col-lg">
                        <select name="bulan" id="bulan">
                            <option value="">Pilih Bulan</option>
                            <?php foreach ($data3 as $d3) : ?>
                                <option value="<?= $d3['id']; ?>"><?= $d3['bulan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="nama" id="nama" value="<?php
                                                                    $nama = $this->db->get_where('tbl_gukar', ['nbm' => $data2])->row_array();
                                                                    echo $nama['nama'];
                                                                    ?>">
                <input type="hidden" name="nbm" id="nbm" value="<?= $data2; ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-google"><i class="far fa-file-pdf"></i> CETAK PDF</button>
                </div>
            </form>
        </div>
    </div>
</div>