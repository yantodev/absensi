<form class="form-group" action="" method="post">
    <div class="form-group">
        <div class="col-sm-8">
            <input class="form-control" type="text" name="nis" id="nis" value="<?= $data['nis']; ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8">
            <input class="form-control" type="text" name="nama" id="nama" value="<?= $data['nama']; ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8">
            <input class="form-control" type="text" name="kelas" id="kelas" value="<?= $data['kelas']; ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8">
            <input class="form-control" type="date" name="tgl" id="tgl" value="<?= $tgl; ?>" readonly>
        </div>
    </div>
    <div class="form-group">
        <label class="container">Jam Masuk</label>
        <div class="col-sm-8">
            <input class="form-control" type="time" name="time" id="time">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8">
            <select name="status" id="status">
                <option value="">Pilih Status Kehadiran</option>
                <Option value="Hadir">Hadir</Option>
                <Option value="Izin">Izin</Option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8">
            <textarea class="form-control" name="alasan" id="alasan" placeholder="Input alasan siswa" cols="auto" rows="5"></textarea>
        </div>
        <small class="container" style="color: red;"><i>*Diisi jika siswa izin saja</i></small>
    </div>
    <input type="hidden" name="user" id="user" value="<?= $user['name']; ?>">
    <input type="hidden" name="kelas" id="kelas" value="<?= $data['kelas']; ?>">
    <input type="hidden" name="tgl" id="tgl" value="<?= $tgl; ?>">
    <button type="submit" class="btn btn-primary">SIMPAN</button>
</form>