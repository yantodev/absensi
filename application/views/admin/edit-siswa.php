<div class="row">
    <div class="col-lg-8">
        <div class="card-body pb-0">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="nis" name="nis" value="<?= $data['nis']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="nama" name="nama" value="<?= $data['nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="email" name="email" value="<?= $data['email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="text" id="jk" name="jk" value="<?= $data['jk']; ?>">
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
                <input type="hidden" name="user" id="user" value="<?= $user['name']; ?>">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</div>