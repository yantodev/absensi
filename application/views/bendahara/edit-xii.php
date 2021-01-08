<form action="" method="post">
    <div class="form-group row">
        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nis" name="nis" value="<?= $siswa['nis']; ?>">
            <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Siswa</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $siswa['nama_siswa']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="bln" class="col-sm-2 col-form-label">BLN</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="bln" name="bln" value="<?= $siswa['bln']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="tunggakan" class="col-sm-2 col-form-label">Tunggakan</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="tunggakan" name="tunggakan" value="<?= $siswa['tunggakan']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="spp_praktek" class="col-sm-2 col-form-label">SPP + Praktek</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="spp_praktek" name="spp_praktek" value="<?= $siswa['spp_praktek']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="daftar_ulang" class="col-sm-2 col-form-label">Daftar Ulang</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="daftar_ulang" name="daftar_ulang" value="<?= $siswa['daftar_ulang']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="pas" class="col-sm-2 col-form-label">PAS</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="pas" name="pas" value="<?= $siswa['pas']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="dpp_muh" class="col-sm-2 col-form-label">DPP Muhammadiyah</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="dpp_muh" name="dpp_muh" value="<?= $siswa['dpp_muh']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="gedung" class="col-sm-2 col-form-label">Gedung</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="gedung" name="gedung" value="<?= $siswa['gedung']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="ukk" class="col-sm-2 col-form-label">UKK</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="ukk" name="ukk" value="<?= $siswa['ukk']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="usek_akm" class="col-sm-2 col-form-label">USEK + AKM</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="usek_akm" name="usek_akm" value="<?= $siswa['usek_akm']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="sukses_akm" class="col-sm-2 col-form-label">SUKSES AKM</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="sukses_akm" name="sukses_akm" value="<?= $siswa['sukses_akm']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="wisuda" class="col-sm-2 col-form-label">Wisuda</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="wisuda" name="wisuda" value="<?= $siswa['wisuda']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="wakaf" class="col-sm-2 col-form-label">Wakaf</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" id="wakaf" name="wakaf" value="<?= $siswa['wakaf']; ?>">
        </div>
    </div>
    <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
    <div class=" form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </div>
</form>