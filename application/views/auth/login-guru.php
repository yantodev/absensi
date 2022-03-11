<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
<div class="container">
    <!-- Nested Row within Card Body -->
    <div class="form-login">
        <div class="user">
            <div class="header">
                <img src="<?= base_url('assets/img/logo/logo-login.png'); ?>" alt="logo smk muhkarangmojo">
                <h3>
                    <b> PRESENSI ONLINE<br />
                        SMK MUHAMMADIYAH KARANGMOJO</b>
                </h3>
            </div>
            <div class="flash-data" data-flashauth="<?= $this->session->flashdata('message');?>"></div>
            <?php if($this->session->flashdata('message')) :?>
            <?php endif; ?>
            <form method="POST" action="<?= base_url('auth/guru'); ?>">
                <div class="form-group">
                    <label class="label" for="username">Username</label>
                    <input type="text" id="email" name="email" placeholder="Email Resmi Sekolah"
                        value="<?= set_value('email'); ?>">
                </div>
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                <div class="form-group">
                    <label class="label" for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Nomor Baku Muhammadiyah">
                </div>
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                <div style="text-align: center; display:flex;justify-content: center">
                    <button type="submit" class="btn-login">
                        LOGIN
                    </button>
                </div>
            </form>
            <div>
                <a href="<?= base_url('auth'); ?>">
                    <button class="button-auth">
                        <i class="fa fa-users fa-fw" alt="admin" title="admin"></i> Admin
                    </button>
                </a>
                <a href="<?= base_url('auth/ks'); ?>">
                    <button class="button-auth" onclick=(<?= base_url('auth/ks'); ?>)>
                        <i class="fa fa-user fa-fw" alt="kepala sekolah" title="kepala sekolah"></i> Kepala Sekolah
                    </button>
                </a>
                <a href="<?= base_url('auth/salary'); ?>">
                    <button class="button-auth">
                        <i class="fa fa-credit-card fa-fw" alt="Bendahara" title="Bendahara"></i> Bendahara
                    </button>
                </a>
                <a href="<?= base_url('auth/piket'); ?>">
                    <button class="button-auth">
                        <i class="fa fa-calendar-check"></i> Guru Piket
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>