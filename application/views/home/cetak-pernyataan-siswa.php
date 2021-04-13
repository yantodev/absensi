<h1 style="text-align: center;">SURAT PERNYATAAN</h1>
<p>Yang bertanda tangan dibawah ini saya:</p>
<table style="padding-left: 25px;">
    <tr>
        <td width="150px">Nama Orangtua/wali</td>
        <td>: </td>
        <td><?= $data['nama_ortu']; ?></td>
    </tr>
    <tr>
        <td width="150px">Alamat</td>
        <td>: </td>
        <td><?= $data['alamat_ortu']; ?></td>
    </tr>
    <tr>
        <td width="150px">Nomor HP</td>
        <td>: </td>
        <td><?= $data['hp_ortu']; ?></td>
    </tr>
</table>
<p>Sebagai orangtua / wali murid dari anak:</p>
<table style="padding-left: 25px;">
    <tr>
        <td width="150px">Nama Siswa</td>
        <td>: </td>
        <td><?= $data['nama_siswa']; ?></td>
    </tr>
    <tr>
        <td width="150px">Kelas/ Komp. Keah.</td>
        <td>: </td>
        <td><?= $data['kelas']; ?></td>
    </tr>
    <tr>
        <td width="150px">Nomor HP</td>
        <td>: </td>
        <td><?= $data['hp_siswa']; ?></td>
    </tr>
</table>
<p style="text-align: justify;">
    Dengan ini menyatakan bahwa saya telah menyetujui dan memberi ijin kepada anak saya tersebut di atas untuk mengikuti rangkaian kegiatan Ujian Kompetensi Keahlian (UKK) dan ISMUBA secara tatap muka di SMK Muhammadiyah Karangmojo sesuai jadwal yang telah ditentukan. Selain itu juga bersedia mengikuti ketentuan protokol kesehatan Covid-19 yang telah ditentukan, diantaranya adalah selalu mengisi screening kesehatan secara jujur pada saat akan mengikuti kegiatan pembelajaran tatap muka di sekolah. Screening kesehatan yang dimaksud adalah melalui link sebagai berikut:
    <a href="http://bit.ly/Screening_SMKMuhKarangmojo"><i>http://bit.ly/Screening_SMKMuhKarangmojo</i></a>
</p>
<table class="table" style="padding-left: 400px;padding-top:150px">
    <thead>
        <tr>
            <th>Karangmojo, <?= tanggal($data['date']); ?></th>
        </tr>
        <tr>
            <th>
                Yang Membuat Pernytaan,
            </th>
        </tr>
        <tr>
            <th>
                <img src="<?= base_url() . $data['ttd']; ?>" width="200px">
            </th>
        </tr>
        <tr>
            <th>
                ( <?= $data['nama_ortu']; ?> )
            </th>
        </tr>
    </thead>
</table>