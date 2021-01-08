<!-- Team-->
<?php
$tgl = date('Y-m-d');
?>
<section class="page-section " id="absen">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">FORM DAFTAR HADIR</h2>
            <h2 class="section-subheading">SMK Muh Karangmojo</h2>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="<?= base_url(); ?>">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="<?= base_url(); ?>/assets/frontend/assets/img/team/student.png" alt="" />
                        <h4>Siswa</h4>
                        <a href="<?= base_url('home/absen_guru'); ?>">
                            <button class="btn btn-primary">MASUK</button>
                        </a>
                        <a href="<?= base_url('home/absen_guru'); ?>">
                            <button class="btn btn-danger">PULANG</button>
                        </a>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">

                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="<?= base_url(); ?>/assets/frontend/assets/img/team/teacher.png" alt="" />
                    <h4>Guru</h4>
                    <a href="<?= base_url('home/absen_gukar_masuk'); ?>">
                        <button class="btn btn-primary">MASUK</button>
                    </a>
                    <a href="<?= base_url('home/absen_gukar_pulang'); ?>">
                        <button class="btn btn-danger">PULANG</button>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="<?= base_url(); ?>/assets/frontend/assets/img/team/karyawan.png" alt="" />
                    <h4>Karyawan</h4>
                    <a href="<?= base_url('home/absen_gukar_masuk'); ?>">
                        <button class="btn btn-primary">MASUK</button>
                    </a>
                    <a href="<?= base_url('home/absen_gukar_pulang'); ?>">
                        <button class="btn btn-danger">PULANG</button>
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div> -->
    </div>
</section>