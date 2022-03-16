<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
<div class="container">
    <!-- Nested Row within Card Body -->
    <div class="form-login">
        <div class="user">
            <div class="header">
                <img src="<?= base_url('assets/img/logo/logo-login.png'); ?>" alt="logo smk muhkarangmojo">
                <h3>
                    <br>FORM BK</br>
                    PRESENSI ONLINE<br />
                    SMK MUHAMMADIYAH KARANGMOJO</b>
                </h3>
            </div>
            <div class="flash-data" data-flashauth="<?= $this->session->flashdata('message');?>"></div>
            <?php if($this->session->flashdata('message')) :?>
            <?php endif; ?>
            <form method="POST" action="<?= base_url('auth/bk'); ?>">
                <div class="form-group">
                    <label class="label" for="username">Username</label>
                    <input type="text" id="email" name="email" placeholder="Email Resmi Sekolah"
                        value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label class="label" for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Nomor Baku Muhammadiyah">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div style="text-align: center; display:flex;justify-content: center">
                    <button type="submit" class="btn-login">
                        LOGIN
                    </button>
                </div>
            </form>
            <!-- <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                                    </div> -->
        </div>
    </div>
</div>