<form action="" method="POST">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Rekap</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" id="tgl_rekap" name="tgl_rekap" value="<?= $data['tgl_rekap']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Terlambat</label>
        <div class="col-sm-4">
            <input type="date" class="form-control" id="tgl_terlambat" name="tgl_terlambat" value="<?= $data['tgl_terlambat']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nomor Surat</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $data['no_surat']; ?>">
        </div>
    </div>
    <input type="hidden" id="id" name="id" value="<?= $data['id']; ?>">
    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </div>
</form>