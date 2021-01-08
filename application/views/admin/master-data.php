<div class="dropdown mb-3">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Silahkan Pilih Menu
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="<?= base_url('admin/iduka'); ?>">DATA IDUKA</a>
        <a class="dropdown-item" href="<?= base_url('admin/pengumuman'); ?>">PENGUMUMAN</a>
    </div>
</div>

<table>
    <thead>
        <th>
        <td>
            <a href="<?= base_url('admin/iduka'); ?>">
                <img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="DATA" class="img-thumbnail">
            </a><br />
            <p>DATA IDUKA</p>
        </td>
        <td>
            <a href="<?= base_url('admin/pengumuman'); ?>">
                <img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="DATA" class="img-thumbnail">
            </a><br />
            <p>PENGUMUMAN</p>
        </td>
        </th>
    </thead>
</table>