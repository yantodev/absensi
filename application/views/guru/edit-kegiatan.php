<div class="row">
    <div class="col-lg-8">
        <div class="card-body pb-0">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="date" id="tgl" name="tgl" value="<?= $data['tgl']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="time" id="time" name="time" value="<?= $data['time']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kegiatan</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="kegiatan" name="kegiatan" value="<?= $data['kegiatan']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea name="keterangan" id="keterangan" cols="53px" rows="5"><?= $data['keterangan']; ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
                <input type="hidden" name="owner" id="owner" value="<?= $user['name']; ?>">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</div>