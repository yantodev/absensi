<form action="<?= base_url('bendahara/pembayaran'); ?> " method="get">
    <select name="kelas" id="kelas">
        <option value="">Silahkan Pilih Kelas</option>
        <?php foreach ($all_kelas as $k) : ?>
            <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="mb-3">SAVE</button>
</form>
<!-- DataTales Example -->
<?= $this->session->flashdata('message'); ?>
<div class="card shadow mb-4 col-9">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA SISWA</h6>
    </div>
    <div class="card-body">
        <div class="table">
            <table width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($siswa as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td><?= $d['nama_siswa']; ?></td>
                            <td><?= $d['kelas']; ?></td>
                            <td><a href="<?= base_url('bendahara/kelas/') . $k['id']; ?>" class="badge badge-warning fas fa-edit" data-toggle="modal" data-target="#bayarModal"> Bayar</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bayar Modal-->
<?php foreach ($siswa as $d) : ?>
    <div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content col-8">
                <h5 class="modal-title" id="exampleModalLabel">Pembayaran <b><?= $d['nama_siswa']; ?></b></h5>
                <form action="<?= base_url('bendahara/pembayaran'); ?>" method="POST">
                    <div class="form-group">
                        <label>Bayar Tunggakan</label>
                        <input type="number" class="form-control" id="bayar_tunggakan" name="bayar_tunggakan" value="0">
                    </div>
                    <div class="form-group">
                        <label>Bayar SPP & Praktek</label>
                        <input type="number" class="form-control" id="bayar_spp_praktek" name="bayar_spp_praktek" value="0">
                    </div>
                    <div class="form-group">
                        <label>Daftar Ulang</label>
                        <input type="number" class="form-control" id="bayar_daftar_ulang" name="bayar_daftar_ulang" value="0">
                    </div>
                    <div class="form-group">
                        <label>PAS</label>
                        <input type="number" class="form-control" id="bayar_pas" name="bayar_pas" value="0">
                    </div>
                    <div class="form-group">
                        <label>DPP Muh</label>
                        <input type="number" class="form-control" id="bayar_dpp_muh" name="bayar_dpp_muh" value="0">
                    </div>
                    <div class="form-group">
                        <label>Gedung</label>
                        <input type="number" class="form-control" id="bayar_gedung" name="bayar_gedung" value="0">
                    </div>
                    <div class="form-group">
                        <label>UKK</label>
                        <input type="number" class="form-control" id="bayar_ukk" name="bayar_ukk" value="0">
                    </div>
                    <div class="form-group">
                        <label>USEK & AKM</label>
                        <input type="number" class="form-control" id="bayar_usek_akm" name="bayar_usek_akm" value="0">
                    </div>
                    <div class="form-group">
                        <label>Sukses AKM</label>
                        <input type="number" class="form-control" id="bayar_wisuda" name="bayar_sukses_akm" value="0">
                    </div>
                    <div class="form-group">
                        <label>Wisuda</label>
                        <input type="number" class="form-control" id="bayar_wisuda" name="bayar_wisuda" value="0">
                    </div>
                    <div class="form-group">
                        <label>Wakaf</label>
                        <input type="number" class="form-control" id="bayar_wakaf" name="bayar_wakaf" value="0">
                    </div>
                    <div class="form-group">
                        <label>PKL</label>
                        <input type="number" class="form-control" id="bayar_pkl" name="bayar_pkl" value="0">
                    </div>
                    <div class="form-group">
                        <label>Seragam</label>
                        <input type="number" class="form-control" id="bayar_seragam" name="bayar_seragam" value="0">
                    </div>
                    <div class="form-group">
                        <label>PAT</label>
                        <input type="number" class="form-control" id="bayar_pat" name="bayar_pat" value="0">
                    </div>
                    <input type="hidden" name="id" id="id" value="<?= $d['id']; ?>">
                    <input type="hidden" name="nis" id="nis" value="<?= $d['nis']; ?>">
                    <input type="hidden" name="nama_siswa" id="nama_siswa" value="<?= $d['nama_siswa']; ?>">
                    <input type="hidden" name="tunggakan" id="tunggakan" value="<?= $d['tunggakan']; ?>">
                    <input type="hidden" name="spp_praktek" id="spp_praktek" value="<?= $d['spp_praktek']; ?>">
                    <input type="hidden" name="daftar_ulang" id="daftar_ulang" value="<?= $d['daftar_ulang']; ?>">
                    <input type="hidden" name="pas" id="pas" value="<?= $d['pas']; ?>">
                    <input type="hidden" name="dpp_muh" id="dpp_muh" value="<?= $d['dpp_muh']; ?>">
                    <input type="hidden" name="gedung" id="gedung" value="<?= $d['gedung']; ?>">
                    <input type="hidden" name="ukk" id="ukk" value="<?= $d['ukk']; ?>">
                    <input type="hidden" name="usek_akm" id="usek_akm" value="<?= $d['usek_akm']; ?>">
                    <input type="hidden" name="sukses_akm" id="sukses_akm" value="<?= $d['sukses_akm']; ?>">
                    <input type="hidden" name="wisuda" id="wisuda" value="<?= $d['wisuda']; ?>">
                    <input type="hidden" name="wakaf" id="wakaf" value="<?= $d['wakaf']; ?>">
                    <input type="hidden" name="pkl" id="pkl" value="<?= $d['pkl']; ?>">
                    <input type="hidden" name="seragam" id="seragam" value="<?= $d['seragam']; ?>">
                    <input type="hidden" name="pat" id="pat" value="<?= $d['pat']; ?>">
                    <div>
                        <button type="submit" class="btn btn-primary mb-3">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Begin Page Content -->