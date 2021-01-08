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
<!-- <form action="<?= base_url('bendahara/xii'); ?> " method="get">
    <select name="kelas" id="kelas">
        <option value="">Silahkan Pilih Kelas</option>
        <?php foreach ($all_kelas as $k) : ?>
            <option value="<?= $k['id']; ?>"><?= $k['kelas']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" class="btn btn-primary">SAVE</button>
</form> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DATA SISWA SMK MUHAMMADIYAH KARANGMOJO</h6>
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
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>