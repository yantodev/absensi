<div class="card">
    <div class="card-header">
        Data <b>(<?= $siswa['nis']; ?>) <?= $siswa['name']; ?></b>
    </div>
    <div class="card-body pb-0">
        <b>A. IDENTITSAS INSTANSI</b>
        <table class="ml-4">
            <thead>
                <tr>
                    <td width="300px">Nama Instansi/Perusahaan</td>
                    <td>: <?= $siswa['nama_instansi']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Instansi</td>
                    <td>: <?= $siswa['alamat_instansi']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Email / Website</td>
                    <td>: <?= $siswa['email_website_instansi']; ?></td>
                </tr>
                <tr>
                    <td>Nomor Telp/HP</td>
                    <td>: <?= $siswa['telp_instansi']; ?></td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="card-body pb-0">
        <b>B. IDENTITSAS PIMPINAN INSTANSI (PEJABAT PENANDATANGAN SERTIFIKAT)</b>
        <table class="ml-4">
            <thead>
                <tr>
                    <td width="300px">Nama Lengkap dan Gelar</td>
                    <td>: <?= $siswa['nama_pejabat']; ?></td>
                </tr>
                <tr>
                    <td>NIP/NIK/NRP*</td>
                    <td>: <?= $siswa['no_pejabat']; ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>: <?= $siswa['jabatan']; ?></td>
                </tr>
                <tr>
                    <td>No. Telp/HP</td>
                    <td>: <?= $siswa['telp_pejabat']; ?></td>
                </tr>
                <tr>
                    <td>Email Pejabat</td>
                    <td>: <?= $siswa['email_pejabat']; ?></td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="card-body pb-0">
        <b>C. SERTIFIKAT</b>
        <table class="ml-4">
            <thead>
                <tr>
                    <td width="300px">Nomor Sertifikat</td>
                    <td>: <?= $siswa['no_sertifikat']; ?></td>
                </tr>
            </thead>
        </table>
    </div>
</div>