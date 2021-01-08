<style type="text/css">
    .left {
        text-align: left;
    }

    .right {
        text-align: right;
    }

    .center {
        text-align: center;
    }

    .justify {
        text-align: justify;
    }
</style>
<img src="<?= base_url('assets/img/kop.png'); ?>" alt="">
<table>
    <thead>
        <tr>
            <th style="text-align:left">Nomor</th>
            <th>:</th>
            <th style="text-align:left">280/III.4.AU/F/2020</th>
        </tr>
        <tr>
            <th style="text-align:left">Lampiran</th>
            <th>:</th>
            <th style="text-align:left">2 Lembar</th>
        </tr>
        <tr>
            <th style="text-align:left">Hal</th>
            <th>:</th>
            <th style="text-align:left">Permohonan Izin PKL</th>
        </tr>
    </thead>
</table>

<p>Kepada<br />
    Yth. <?= $instansi; ?> <?= $iduka; ?><br />
    <?php foreach ($alamat as $a) : ?>
        di <?= $a['alamat']; ?>
    <?php endforeach; ?>
</p>
<p class="justify">
    <i>Assalamu’alaikum wr. wb.</i><br />
    Dengan hormat, berkaitan dengan program kegiatan Praktik Kerja Lapangan yang akan dilakukan oleh siswa SMK Muhammadiyah Karangmojo, kami mohon izin untuk melakukan Praktik Kerja Lapangan di instansi / dunia usaha / dunia industri / dunia kerja (IDUKA) yang Bapak/Ibu pimpin. Kegiatan tersebut dilakukan selama 3 (tiga) bulan, yakni mulai tanggal :
</p>
<table border="1" align="center" cellspacing="0">
    <tr>
        <th>
            <h3 style="text-align:center">02 Januari 2021 sampai dengan 31 Maret 2021</h3>
        </th>
    </tr>
</table>
<p>Adapun peserta PKL adalah sebagai berikut:</p>
<table border="1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No. </th>
            <th>NIS</th>
            <th>Nama</th>
            <th>L/P</th>
            <th>Kelas</th>
            <th>Kompetensi Keahlian</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($data as $d) : ?>
            <tr>
                <td style="text-align:center"><?= $i; ?></td>
                <td><?= $d['nis']; ?></td>
                <td><?= $d['name']; ?></td>
                <td><?= $d['jk']; ?></td>
                <td><?= $d['kelas']; ?></td>
                <td><?= $d['jurusan']; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<p class="justify">
    Sebagai alat konfirmasi, bersama surat ini kami lampirkan lembar pernyataan kesanggupan. Mohon berkenan mengisi dan diserahkan kepada kami melalui peserta PKL.<br />
    Demikian surat ini kami kirimkan atas perhatian dan kerjasama Bapak/Ibu disampaikan terima kasih.
</p>
<p><i>Wassalamu’alaikum wr. wb</i></p>
<table align="right">
    <tr>
        <td>
            Karangmojo, 11 November 2020
        </td>
    </tr>
</table>
<table>
    <thead>
        <?php foreach ($kajur as $k) : ?>
            <tr>
                <td align="center">
                    <p>Mengetahui,</p>
                </td>
            <tr>
                <td align="center">
                    <p>Kepala Sekolah</p>
                </td>
                <td width="50%"></td>
                <td>Ketua Kompetensi Keahlian</td>
            </tr>
            <tr>
                <td align="center" valign="bottom" height="80px">
                    <p><u>MUNAWAR, S.Pd.I</u></p>
                </td>
                <td></td>
                <td valign="bottom" align="center">
                    <p><u><?= $k['nama_kajur']; ?></u></p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p>NBM. 1 076 230</p>
                </td>
                <td></td>
                <td align="center">
                    <p>NBM. <?= $k['nbm']; ?></p>
                </td>
            </tr>
        <?php endforeach; ?>
    </thead>
</table>

<!-- <small>
    <font color="blue"><i>Narahubung : 087839839710 (Humas IDUKA)</i></font>
</small> -->