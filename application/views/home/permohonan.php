<div class="container">
    <h3>Untuk mencetak surat permohonan silahkan isi data dibawah ini:</h3>
    <form action="<?= base_url('home/cetak'); ?>" method="GET">
        <div class="form-group">
            <select name="tp" id="tp">
                <option value="">Pilih Tahun Pelajaran</option>
                <?php foreach ($tp as $t) : ?>
                    <option value="<?= $t['tp']; ?>"><?= $t['tp']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="jurusan" id="jurusan">
                <option value="">Pilih Jurusan</option>
                <?php foreach ($data as $d) : ?>
                    <option value="<?= $d['singkatan_jurusan']; ?>"><?= $d['jurusan']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <select name="iduka" id="iduka" style="width: 200px;">
                <option value="">Pilih Iduka/Instansi</option>
            </select>
            <div id="loading" style="margin-top: 15px;">
                <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
            </div>
            </select>
        </div>
        <div class="form-group">
            <select name="instansi" id="instansi">
                <option value="">Pilih Jenis instansi</option>
                <option value="Kepala">Pemerintah</option>
                <option value="Pimpinan">Non Pemerintah</option>
            </select>
            <div>
                <small>
                    <b>*Contoh Instansi :<br />
                        Pemerintah => Kalurahan, Kapanewon, KUA, dll <br />
                        Non Pemerintah => Bengkel, Bank, Toko, Dll</b>
                </small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">CETAK</button>
    </form>