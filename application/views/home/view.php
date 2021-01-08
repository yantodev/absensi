<div class="container">
    <form action="<?= base_url('home/data'); ?> " method="get">
        <select name="jurusan" id="jurusan">
            <option value="">Silahkan Pilih Jurusan</option>
            <?php foreach ($data2 as $d) : ?>
                <option value="<?= $d['singkatan_jurusan']; ?>"><?= $d['jurusan']; ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary mb-2">SAVE</button>
    </form>
    <div class="card shadow mb-4 col-10">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DAFTAR SISWA PKL YANG PERNAH BERADA DI SINI</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>L/P</th>
                            <th>Kelas</th>
                            <th>Kompetensi Keahlian</th>
                            <th>Tahun Pelajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $d) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $d['nis']; ?></td>
                                <td><?= $d['name']; ?></td>
                                <td><?= $d['jk']; ?></td>
                                <td><?= $d['kelas']; ?></td>
                                <td><?= $d['jurusan']; ?></td>
                                <td><?= $d['tp']; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>