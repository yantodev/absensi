<div class="row">
    <div class="col-lg">
        <div class="card-body pb-0">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="date" id="tgl" name="tgl" value="<?= $data['tgl']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-2">
                        <input class="form-control" type="time" id="time" name="time" value="<?= $data['time']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label">Kegiatan</label>
                    <div class="col-sm-8">
                        <textarea name="kegiatan" id="jurnal" cols="50px" rows="50px"><?= $data['kegiatan']; ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
                <input type="hidden" name="nbm" id="nbm" value="<?= $user['no_reg']; ?>">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</div>