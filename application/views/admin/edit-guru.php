<div class="col-6">
    <form action="" method="POST">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $guru['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="">NBM</label>
            <input type="text" class="form-control" id="nbm" name="nbm" value="<?= $guru['nbm']; ?>">
        </div>
        <div class="form-group">
            <label for="">Telp/HP</label>
            <input type="text" class="form-control" id="hp" name="hp" value="<?= $guru['hp']; ?>">
        </div>
        <label for="">Lokasi Pendamping</label>
        <div class=" form-group">
            <select name="jurusan" id="jurusan">
                <option value="">Silahkan Pilih Jurusan</option>
                <?php foreach ($data as $d) : ?>
                    <option value="<?= $d['singkatan_jurusan']; ?>"><?= $d['jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="lokasi" id="lokasi" style="width: 300px;">
                <option value="<?= $guru['lokasi']; ?>"><?= $guru['lokasi']; ?></option>
            </select>
            <div id="loading" style="margin-top: 15px;">
                <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
            </div>
            </select>
        </div>
        <input type="hidden" id="id" name="id" value="<?= $guru['id']; ?>">
        <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>
</div>