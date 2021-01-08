<div class="container">
    <h4>Selamat Datang di Aplikasi PKL SMK Muhammadiyah Karangmojo</h4>
    <p>Silahkan pilih menu dibawah untuk melihat data lokasi IDUKA (PKL)</p>
    <form action="<?= base_url('home/data'); ?> " method="get">
        <select name="jurusan" id="jurusan">
            <option value="">Silahkan Pilih Jurusan</option>
            <?php foreach ($data as $d) : ?>
                <option value="<?= $d['singkatan_jurusan']; ?>"><?= $d['jurusan']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary mb-2">SAVE</button>
    </form>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DATA IDUKA (Dunia Usaha Dunia Industri Dunia Kerja)</h6>
            <small>Klik <b>View</b> untuk melihat siswa yang pernah PKL di lokasi</small>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>IDUKA</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($iduka as $d) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $d['iduka']; ?></td>
                                <td><?= $d['alamat']; ?></td>
                                <td>
                                    <form action="<?= base_url('home/view'); ?>" method="GET">
                                        <input type="hidden" id="iduka" name="iduka" value="<?= $d['iduka']; ?>">
                                        <button type="submit" class="btn btn-primary">View</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>