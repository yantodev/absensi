<div class="dropdown mb-3">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Silahkan Pilih Tingakat Kelas
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?= base_url('bendahara/x'); ?>">X</a>
        <a class="dropdown-item" href="<?= base_url('bendahara/xi'); ?>">XI</a>
        <a class="dropdown-item" href="<?= base_url('bendahara/xii'); ?>">XII</a>
    </div>
</div>
<form action="<?= base_url('bendahara/xii'); ?> " method="get">
    <select name="kelas" id="kelas">
        <option value="">Silahkan Pilih Kelas</option>
        <?php foreach ($all_kelas as $k) : ?>
            <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">SAVE</button>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA SISWA KELAS <?= $title; ?></h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message');; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Kelas</th>
                        <th>BLN</th>
                        <th>Tunggakan</th>
                        <th>SPP + Praktek</th>
                        <th>Daftar Ulang</th>
                        <th>PAS</th>
                        <th>DPP Muh</th>
                        <th>Gedung</th>
                        <th>UKK</th>
                        <th>USEK + AKM</th>
                        <th>Sukses AKM</th>
                        <th>Wisuda</th>
                        <th>Wakaf</th>
                        <th>Total</th>
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
                            <td><?= $d['bln']; ?></td>
                            <td><?= number_format($d['tunggakan']); ?></td>
                            <td><?= number_format($d['spp_praktek']); ?></td>
                            <td><?= number_format($d['daftar_ulang']); ?></td>
                            <td><?= number_format($d['pas']); ?></td>
                            <td><?= number_format($d['dpp_muh']); ?></td>
                            <td><?= number_format($d['gedung']); ?></td>
                            <td><?= number_format($d['ukk']); ?></td>
                            <td><?= number_format($d['usek_akm']); ?></td>
                            <td><?= number_format($d['sukses_akm']); ?></td>
                            <td><?= number_format($d['wisuda']); ?></td>
                            <td><?= number_format($d['wakaf']); ?></td>
                            <td><?= number_format($d['tunggakan'] + $d['spp_praktek'] + $d['daftar_ulang'] + $d['pas'] + $d['dpp_muh'] + $d['gedung'] + $d['ukk'] + $d['usek_akm'] + $d['sukses_akm'] + $d['wisuda'] + $d['wakaf']); ?></td>
                            <td>
                                <a href="<?= base_url('bendahara/cetak_xii/') . $d['id']; ?>" class="badge badge-warning">Cetak</a>
                                <a href="<?= base_url('bendahara/edit_xii/') . $d['id']; ?>" class="badge badge-success">Edit</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus siswa ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Setelah data dihapus data tidak bisa dikembalikan!!!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/hapus/') . $d['id']; ?>">Hapus</a>
            </div>
        </div>
    </div>

    <!-- Begin Page Content -->