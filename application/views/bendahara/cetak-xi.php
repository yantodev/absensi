<?php foreach ($data as $d) : ?>
    <p align="right">Karangmojo, <?= date('d F Y', strtotime($d['tgl_rekap'])); ?></p>
    <table border="" cellspacing="" cellpadding="">
        <thead>
            <tr>
                <td>Nomor</td>
                <td>: <?= $d['no_surat']; ?></td>
            </tr>
            <tr>
                <td>Lamp.</td>
                <td>: -</td>
            </tr>
            <tr>
                <td>hal</td>
                <td>: <b>Pemberitahuan Kekurangan Pembayaran</b></td>
            </tr>
        </thead>
    </table>

    <table>
        <thead>
            <tr>
                <td height="40px" valign="bottom">Yth. Bapak/ Ibu Orang Tua/Wali Murid</td>
            </tr>
            <tr>
                <td>SMK Muhammadiyah Karangmojo</td>
            </tr>
        </thead>
    </table>

    <table>
        <thead>
            <tr>
                <td height="30px" valign="bottom">Nama</td>
                <td valign="bottom"> : <b><?= $siswa['nama_siswa']; ?></b></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: <b><?= $siswa['kelas']; ?> / <?= $siswa['nis']; ?></b></td>
            </tr>
            <tr>
                <td>di tempat</td>
            </tr>
        </thead>
    </table>
    <p><b>Assalamu'alaikum wr.wb.</b></p>
    <p>Berdasarkan catatan yang ada di sekolah, kami sampaikan bahwa sampai tanggal <?= date('d F Y', strtotime($d['tgl_rekap'])); ?><br />
        Bapak/Ibu masih mempunyai tanggungan biaya sekolah.</p>
    <p><b>Adapun catatan keuangan sbb:</b></p>

    <table border="1" cellspacing="" align="center">
        <thead>
            <tr>
                <td width="10%" align="center">No</td>
                <td width="50%" align="center">Jenis Pembayaran</td>
                <td width="30%" align="center">Besar</td>
                <td width="20%" align="center">Keterangan</td>
            </tr>
            <tr>
                <td align="center">1</td>
                <td>Tunggakan</td>
                <td>Rp. <?= number_format($siswa['tunggakan']); ?></td>
                <td></td>
            </tr>
            <tr>
                <td align="center">2</td>
                <td>SPP + Praktek</td>
                <td>Rp. <?= number_format($siswa['spp_praktek']); ?></td>
                <td></td>
            </tr>
            <tr>
                <td align="center">3</td>
                <td>Daftar Ulang</td>
                <td>Rp. <?= number_format($siswa['daftar_ulang']); ?></td>
                <td></td>
            </tr>
            <tr>
                <td align="center">4</td>
                <td>PAS (Penilaian Akhir Semester)</td>
                <td>Rp. <?= number_format($siswa['pas']); ?></td>
                <td></td>
            </tr>
            <tr>
                <td align="center">5</td>
                <td>DPP Muh</td>
                <td>Rp. <?= number_format($siswa['dpp_muh']); ?></td>
                <td></td>
            </tr>
            <tr>
                <td align="center">6</td>
                <td>Gedung</td>
                <td>Rp. <?= number_format($siswa['gedung']); ?></td>
                <td></td>
            </tr>
            <tr>
                <td align="center">7</td>
                <td>PKL (Praktek Kerja Lapangan)</td>
                <td>Rp. <?= number_format($siswa['pkl']); ?></td>
                <td></td>
            </tr>
            <tr>
                <td align="center">8</td>
                <td>Wakaf</td>
                <td>Rp. <?= number_format($siswa['wakaf']); ?></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> Total</td>
                <td colspan="2">Rp. <?= number_format($siswa['tunggakan'] + $siswa['spp_praktek'] + $siswa['daftar_ulang'] + $siswa['pas'] + $siswa['dpp_muh'] + $siswa['gedung'] + $siswa['ukk'] + $siswa['usek_akm'] + $siswa['sukses_akm'] + $siswa['wisuda'] + $siswa['wakaf']); ?></td>
            </tr>
        </thead>
    </table>
    <p>Kepada Bapak /Ibu yang belum melunasi kewajiban, dimohon segera menyelesaikan administrasi
        keuangan tersebut sesuai matrik pembayaran sebelum tanggal <b><?= date('d F Y', strtotime($d['tgl_terlambat'])); ?></b>.<br />
        Apabila ada kekeliruan administrasi dimohon Bapak/Ibu konfirmasi ke sekolah/bendahara
        dengan membawa kartu SPP dan bukti lainnya.
    </p>

    <p>Demikian pemberitahuan ini kami sampaikan, atas perhatian dan kerjasamanya diucapkan terimakasih.
    </p>
    <p>
        <b>Wassalamu'alaikum wr.wb.</b>
    </p>
    <table border="" cellspacing="">
        <thead>
            <tr>
                <td width="80%"></td>
                <td width="30%">Mengetahui,<br />Kepala Sekolah</td>
            </tr>
            <tr>
                <td></td>
                <td><img src="<?= base_url('assets/img/ttd-ks.png'); ?>" alt="ttd-ks"></td>
            </tr>
            <tr>
                <td></td>
                <td>Munawar, S.Pd.I</td>
            </tr>
            <tr>
                <td></td>
                <td>NBM. 1.076.230</td>
            </tr>
        </thead>
    </table>
<?php endforeach; ?>