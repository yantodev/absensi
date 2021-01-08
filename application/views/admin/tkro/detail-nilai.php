<div class="card">
    <div class="card-header">
        Data <b>(<?= $siswa['nis']; ?>) <?= $siswa['name']; ?></b>
    </div>
    <div class="card-body pb-0">
        <b>A. IDENTITSAS SISWA</b>
        <table class="ml-4">
            <thead>
                <tr>
                    <td width="300px">NIS</td>
                    <td>: <?= $siswa['nis']; ?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>: <?= $siswa['name']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: <?= $siswa['email']; ?></td>
                </tr>
            </thead>
        </table>
    </div>
    <div class="card-body pb-0">
        <b>B. NILAI SISWA</b><br />
        <table class="ml-4">
            <b>1. Aspek Non Teknis</b><br />
            <thead>
                <tr>
                    <td width="350px">Disiplin</td>
                    <td>: <?= $siswa['nilai_1']; ?></td>
                </tr>
                <tr>
                    <td>Kerjasama</td>
                    <td>: <?= $siswa['nilai_2']; ?></td>
                </tr>
                <tr>
                    <td>Inisiatif</td>
                    <td>: <?= $siswa['nilai_3']; ?></td>
                </tr>
                <tr>
                    <td>Tanggungjawab</td>
                    <td>: <?= $siswa['nilai_4']; ?></td>
                </tr>
        </table>
        <b>2. Aspek Teknis</b>
        <table class="ml-4">
            <tr>
                <td width="350px">Merawat dan Memperbaiki kerusakan Engine</td>
                <td>: <?= $siswa['nilai_5']; ?></td>
            </tr>
            <tr>
                <td>Memperbaiki kerusakan sistem kelistrikan</td>
                <td>: <?= $siswa['nilai_6']; ?></td>
            </tr>
            <tr>
                <td>Memperbaiki kerusakan chasis</td>
                <td>: <?= $siswa['nilai_7']; ?></td>
            </tr>
            <tr>
                <td>Melaksanakan K3</td>
                <td>: <?= $siswa['nilai_8']; ?></td>
            </tr>
            <tr>
                <td>Tugas lain yang relevan</td>
                <td>: <?= $siswa['nilai_9']; ?></td>
            </tr>
            </thead>
        </table>
    </div>
    <div class="card-body pb-0">
    </div>
</div>