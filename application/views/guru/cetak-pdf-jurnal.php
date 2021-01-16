<!-- <style>
    @page {
        margin-top: 0.5cm;
        margin-bottom: 0.5cm;
        margin-left: 1.0cm;
        margin-right: 1.0cm;
        /* background-image: url('assets/img/pi-2020.png'); */
    }
</style> -->
<img src="<?= base_url('assets/img/kop.png'); ?>">
<h3 style="text-align: center;">Jurnal-Ku</h3>
<?php foreach ($data as $d) : ?>
    <p><?= $d['nbm']; ?></p>
<?php endforeach; ?>