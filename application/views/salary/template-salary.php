<h3><?= $title; ?></h3>

<form action="<?= base_url('guru/salary') ?> " method="get">
    <select class="mb-1" name="bulan" id="bulan">
        <option value="" disabled selected>-- Pilih Bulan --</option>
        <?php foreach ($all_bulan as $bn => $bt): ?>
        <option value="<?= $bn ?>" <?= $bn == $bulan ? 'selected' : '' ?>><?= $bt ?></option>
        <?php endforeach; ?>
    </select>
    <select class="mb-1" name="tahun" id="tahun">
        <option value="" disabled selected>-- Pilih Tahun --</option>
        <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--): ?>
        <option value="<?= $i ?>" <?= $i == $tahun ? 'selected' : '' ?>><?= $i ?></option>
        <?php endfor; ?>">
    </select>
    <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
</form>