<?php foreach ($data as $d) : ?>
    <table border="1" cellspacing="0" width="520px">
        <thead>
            <tr>
                <th rowspan="3"><img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt=""></th>
                <th>
                    <h2>
                        <?= $d['kode_lokasi']; ?>
                    </h2>
                </th>
            </tr>
            <tr>
                <th>
                    <?php
                    require 'vendor/autoload.php';
                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($d['no_inv'], $generator::TYPE_CODE_128)) . '">';
                    ?><br />
                    <?= $d['no_inv']; ?>

                </th>
            </tr>
            <tr>
                <th>
                    <?= $d['nama']; ?>
                </th>
            </tr>
        </thead>
    </table>
    <br />
<?php endforeach; ?>