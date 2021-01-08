<form action="" method="post">
    <div class="form-group col-6">
        <label for="">Kode Ruang</label>
        <input type="text" name="kode_lokasi" id="kode_lokasi" class="form-control" value="<?= $data['kode_lokasi']; ?>">
    </div>
    <div class="form-group col-6">
        <label for="">Kategori</label>
        <select name="kategori" id="kategori" class="form-control">
            <option value=""><?= $data['kategori']; ?></option>
        </select>
    </div>
    <div class="form-group col-6">
        <label for="">Jenis</label>
        <select name="jenis" id="jenis" class="form-control">
            <option value=""><?= $data['jenis']; ?></option>
        </select>
    </div>
    <div class="form-group col-6">
        <label for="">Nomor Inventaris</label>
        <input type="text" name="no_inv" id="no_inv" class="form-control" value="<?= $data['no_inv']; ?>">
    </div>
    <div class="form-group col-6">
        <label for="">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama']; ?>">
    </div>
    <div class="form-group col-6">
        <button type="submit" class="btn btn-primary">Edit</button>
    </div>

</form>