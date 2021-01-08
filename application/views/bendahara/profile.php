<div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="<?= base_url('assets/img/') . $user['image']; ?>" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $user['name']; ?></h5>
                <p class="card-text"><?= $user['email']; ?></p>
                <p class="card-text"><small class="text-muted">Tanggal pendaftaran akun : <?= date('d F Y', $user['date_created']); ?></small></p>
            </div>
        </div>
    </div>
</div>