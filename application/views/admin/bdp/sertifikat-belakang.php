<div class="container">
    <h1 align="center">DAFTAR NILAI PRAKTIK KERJA LAPANGAN</h1>
    <table align="center">
        <thead>
            <tr>
                <td>
                    <h3>Nama</h3>
                </td>
                <td>
                    <h3>: <?= $siswa['name']; ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>NIS</h3>
                </td>
                <td>
                    <h3>: <?= $siswa['nis']; ?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Jurusan</h3>
                </td>
                <td>
                    <h3>: Bisnis Daring dan Pemasaran</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3>Nama Sekolah</h3>
                </td>
                <td>
                    <h3>: SMK Muhammadiyah Karangmojo</h3>
                </td>
            </tr>
        </thead>
    </table><br />
    <table border="1" align="center" cellspacing="0">
        <tbody>
            <tr>
                <td align="center">
                    <h4>NO</h4>
                </td>
                <td align="center" width="50%">
                    <h4>KOMPONEN YANG DI NILAI</h4>
                </td>
                <td align="center">
                    <h4>NILAI</h4>
                </td>
                <td align="center" colspan="">
                    <h4>KETERANGAN</h4>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <h4>I. Aspek Non Teknis</h4>
                </td>
                <td rowspan="13" rules="none">
                    <img src="<?= base_url('assets/img/keterengan.png'); ?>" width="400px" height="250" alt="">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>1</h5>
                </td>
                <td>
                    <h5>Disiplin</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_1']; ?></h5>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>2</h5>
                </td>
                <td>
                    <h5>Kerjasama</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_2']; ?></h5>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>3</h5>
                </td>
                <td>
                    <h5>Inisiatif</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_3']; ?></h5>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>4</h5>
                </td>
                <td>
                    <h5>Tanggungjawab</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_4']; ?></h5>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <h4>II. Aspek Teknis (Kemampuan Utama)</h4>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>1</h5>
                </td>
                <td>
                    <h5>K3</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_5']; ?></h5>
                </td>
            </tr>
            <tr>
                <td align=" center">
                    <h5>2</h5>
                </td>
                <td>
                    <h5>Stok Barang</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_6']; ?></h5>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>3</h5>
                </td>
                <td>
                    <h5>Penataan Produk</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_7']; ?></h5>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>4</h5>
                </td>
                <td>
                    <h5>Pelayanan Prima</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_8']; ?></h5>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>5</h5>
                </td>
                <td>
                    <h5>Komunikasi Bisnis</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_9']; ?></h5>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>6</h5>
                </td>
                <td>
                    <h5>Mengoperasikan Alat Transakasi</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_10']; ?></h5>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <h5>7</h5>
                </td>
                <td>
                    <h5>Laporan Penjualan</h5>
                </td>
                <td align="center">
                    <h5><?= $siswa['nilai_11']; ?></h5>
                </td>
            </tr>
        </tbody>
    </table>
    <br />
</div>
<div class="row">
    <table border="" align="center">
        <thead>
            <tr>
                <td width="500px">

                </td>
                <td>
                    <h4>
                        <b>
                            <?= $siswa['tgl_cetak']; ?><br />
                            <?= $siswa['jabatan']; ?><br /><br /><br /><br />
                            <?= $siswa['nama_pejabat']; ?><br />
                            NIP/NRP. <?= $siswa['no_pejabat']; ?>
                        </b>
                    </h4>

                </td>
            </tr>
        </thead>
    </table>
</div>