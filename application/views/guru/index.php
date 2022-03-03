<?= $this->session->flashdata('message'); ?>
<h3 style="color: black" id="notif-event"></h3>

<div class="card mb-3"
    style="background-image:url(<?=base_url("assets/frontend/assets/img/bg-new.jpeg");?>);color:black">
    <div class="text-center mt-4">
        <img src="<?= base_url('assets/img/users/') . $user['image']; ?>" alt="..." width="80px">
    </div>
    <div class="card-body">
        <h4 class="card-title" style="text-align: center"><?= $user['name']; ?></h4>
        <h5 class="card-title" style="text-align: center"><?= $data['jabatan']; ?></h5>
        <p class="card-text" style="text-align: center">
            <?php 
            ini_set('date.timezone', 'Asia/Jakarta'); 
            echo format_indo(date('Y-m-d'))
            ?> </p>
        <div style="text-align: center">
            <h3 id="clock" style="font-weight: bold;"></h3>
        </div>
        <div style="text-align: center;" id="button-presensi">
            <button class="btn btn-success" style="margin:15px;padding:10px 18px"
                onclick="presensiMasuk(<?= $user['no_reg'];?>);">MASUK</button>
            <button class="btn btn-danger" style="margin:15px;padding:10px 18px"
                onclick="presensiPulang(<?= $user['no_reg']?>);">PULANG</button>
            <button class="btn btn-info" style="margin:15px;padding:10px 18px"
                onclick="maintenance(<?= $user['no_reg']?>)">AJUKAN IZIN</button>
        </div>
        <div style="text-align: center; display:flex;justify-content: center">
            <div style="text-align:center;font-size: 22px">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><span class="badge bg-success" style="color:black">MASUK</span></th>
                        <th> : </th>
                        <th id="data-presensi-masuk"></th>
                    </tr>
                    <tr>
                        <th><span class="badge bg-danger" style="color:black">PULANG</span></th>
                        <th> : </th>
                        <th id="data-presensi-pulang"></th>
                    </tr>
                </table>
            </div>
        </div>
        <div style="text-align: center; display:flex;justify-content: center">
            <a href="<?= base_url('guru/absensi') ?>" class="btn btn-primary">
                <i class="fa fa-book"> Presensi Saya</i>
            </a>
        </div>
    </div>
</div>