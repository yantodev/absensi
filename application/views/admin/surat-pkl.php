<form action="" method="POST">
    <?= $this->session->flashdata('message'); ?>
    <?php if (validation_errors()) : ?>
        <div class="alert alert-" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>
    <h3>DATA SURAT PERMOHONAN PKL</h3>
    <div class="form-group col-4">
        <label>Nomor</label>
        <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $data['nomor']; ?>">
    </div>
    <div class="form-group col-4">
        <label>Lampiran</label>
        <input type="text" class="form-control" id="lampiran" name="lampiran" value="<?= $data['lampiran']; ?>">
    </div>
    <div class=" form-group col-4">
        <label>Hal</label>
        <input type="text" class="form-control" id="hal" name="hal" value=" <?= $data['hal']; ?>">
    </div>
    <div class=" form-group col-5">
        <label>Tanggal PKL</label>
        <input type="text" class="form-control" id="tgl_pkl" name="tgl_pkl" value=" <?= $data['tgl_pkl']; ?>">
    </div>
    <div class="form-group col-10">
        <label>Paragraf 1</label>
        <textarea class="form-control" id="p1" name="p1" rows="4" placeholder="Dengan hormat, berkaitan dengan program kegiatan Praktik Kerja Lapangan yang akan dilakukan oleh siswa SMK Muhammadiyah Karangmojo, kami mohon izin untuk melakukan Praktik Kerja Lapangan di instansi / dunia usaha / dunia industri / dunia kerja (IDUKA) yang Bapak/Ibu pimpin. Kegiatan tersebut dilakukan selama 3 (tiga) bulan, yakni mulai tanggal :"><?= $data['p1']; ?></textarea>
    </div>
    <div class="form-group col-10">
        <label>Paragraf 2</label>
        <textarea class="form-control" id="p2" name="p2" rows="4" placeholder="Sebagai alat konfirmasi, bersama surat ini kami lampirkan lembar pernyataan kesanggupan. Mohon berkenan mengisi dan diserahkan kepada kami melalui peserta PKL."><?= $data['p2']; ?></textarea>
    </div>
    <div class="form-group col-10">
        <label>Paragraf 3</label>
        <textarea class="form-control" id="p3" name="p3" rows="4" placeholder="Demikian surat ini kami kirimkan atas perhatian dan kerjasama Bapak/Ibu disampaikan terima kasih."><?= $data['p3']; ?></textarea>
    </div>
    <div class="form-group col-4">
        <label>Nama Kepala Sekolah</label>
        <input type="text" class="form-control" id="kepala_sekolah" name="kepala_sekolah" value="<?= $data['kepala_sekolah']; ?>">
    </div>
    <div class="form-group col-4">
        <label>NBM</label>
        <input type="text" class="form-control" id="nbm" name="nbm" value="<?= $data['nbm']; ?>">
    </div>
    <h3>DATA SURAT PERNYATAAN</h3>
    <div class="form-group col-10">
        <label>Paragraf 1</label>
        <textarea class="form-control" id="p4" name="p4" rows="4" placeholder="Memperhatikan surat permohonan izin PKL dari SMK Muhammadiyah Karangmojo Nomor : 280/III.4.AU/F/2020, maka kami menyatakan :"><?= $data['p4']; ?></textarea>
    </div>
    <div class="form-group col-10">
        <label>Paragraf 2</label>
        <textarea class="form-control" id="p5" name="p5" rows="4" placeholder="Menampung siswa Praktik Kerja Lapangan dari SMK Muhammadiyah Karangmojo, dengan durasi waktu mulai tanggal : 02 Januari 2021 s/d 31 Maret 2021 dengan daftar peserta PKL yang kami setujui sebagai berikut :"><?= $data['p5']; ?></textarea>
    </div>
    <div class="form-group col-10">
        <label>Paragraf 3</label>
        <textarea class="form-control" id="p6" name="p6" rows="4" placeholder="Demikian surat pernyataan ini kami buat, agar dapat dipergunakan sebagaimana mestinya."><?= $data['p6']; ?></textarea>
    </div>
    <input type="hidden" name="id" id="id" value="<?= $data['id']; ?>">
    <button type="submit" class="btn btn-primary ml-3 mb-3">SIMPAN</button>
</form>