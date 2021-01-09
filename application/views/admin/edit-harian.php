<div class="row">
    <div class="col-lg-8">
        <div class="card-body pb-0">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Last Update</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="timestamp" id="timestamp" value="<?= format_indo($data['timestamp']); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Level</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="level" id="level" value="<?= status($data['level']); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NBM</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nbm" id="nbm" value="<?= $data['nbm']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="email" id="email" value="<?= $data['email']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="status" id="status" value="<?= $data['status']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alasan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="alasan" id="alasan" value="<?= $data['alasan']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="date_in" id="date_in" value="<?= tgl($data['date_in']); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jam Masuk</label>
                    <div class="col-sm-3">
                        <input type="time" class="form-control" name="time_in" id="time_in" value="<?= $data['time_in']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jam Pulang</label>
                    <div class="col-sm-3">
                        <input type="time" class="form-control" name="time_out" id="time_out" value="<?= $data['time_out']; ?>">
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
                <input type="hidden" name="name" id="name" value="<?= $user['name']; ?>">
                <button type="submit" class="btn btn-primary mb-3">SIMPAN</button>
            </form>
        </div>
    </div>
</div>