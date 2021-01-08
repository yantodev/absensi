<div class="row">
    <div class="col-lg-4">

        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('administrator/changepassword'); ?>" method="POST">
            <div class="form-group">
                <label for="current_password">Password Lama</label>
                <input type="password" class="form-control" id="current_password" name="current_password">
                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="password1">Password Baru</label>
                <input type="password" class="form-control" id="password1" name="password1">
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="password2">Ulangi Password</label>
                <input type="password" class="form-control" id="password2" name="password2">
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Change Password</button>
            </div>
        </form>
    </div>
</div>