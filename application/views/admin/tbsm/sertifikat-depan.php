<div class="container">
    <!-- Content here -->
    <table border="" align="center">
        <thead>
            <th>
                <tr>
                    <td align="center" width="100%" colspan="3">
                        <h1><?= $siswa['nama_instansi']; ?></h1>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="3">
                        <b><i>Alamat : <?= $siswa['alamat_instansi']; ?></i></b>
                    </td>
                </tr>
                <hr>
                <tr>
                    <td align="center" colspan="3">
                        <font size="7" face="times">
                            <h3><b><u>SERTIFIKAT</u></b></h3>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="3">
                        <font size="5" face="times">
                            <b>Nomor : <?= $siswa['no_sertifikat']; ?></b>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="bottom" height="50px" colspan="3">
                        <font size="5" face="times">
                            <b>Diberikan Kepada :</b>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="3">
                        <font size="7">
                            <h3><b><u><?= $siswa['name']; ?></u></b></h3>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" height="40px" colspan="3">
                        <font size="5" face="times">
                            Sekolah Asal : <b>SMK Muhammadiyah Karangmojo</b>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td align="center" height="80px" colspan="3">
                        <font size="6" face="times">
                            Telah melaksanakan Praktek Kerja Lapangan (PKL) Selama 3 (tiga) Bulan terhitung mulai tanggal <?= $siswa['mulai_pkl']; ?> sampai dengan <?= $siswa['selesai_pkl']; ?> di <?= $siswa['nama_instansi']; ?> dengan hasil terlampir dibelakang sertifikat ini.
                        </font>
                    </td>
                </tr>
            </th>
        </thead>
        <!-- </table>
    <table align="center"> -->
        <thead>
            <tr>
                <td align="center" valign="bottom" height="100px">
                    <p>Mengetahui,</p>
                </td>
                <td></td>
                <td valign="bottom">
                    <p><?= $siswa['tgl_cetak']; ?></p>
                </td>
                </>
            <tr>
                <td align="center">
                    <p>Kepala Sekolah</p>
                </td>
                <td></td>
                <td>
                    <p><?= $siswa['jabatan']; ?></p>
                </td>
            </tr>
            <tr>
                <td align="center" valign="bottom" height="80px">
                    <p><u>MUNAWAR, S.Pd.I</u></p>
                </td>
                <td></td>
                <td valign="bottom"><u>
                        <p><?= $siswa['nama_pejabat']; ?>
                    </u></p>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <p>NBM. 1 076 230</p>
                </td>
                <td></td>
                <td>
                    <p>NIP/NRP. <?= $siswa['no_pejabat']; ?></p>
                </td>
            </tr>
        </thead>
    </table>
</div>