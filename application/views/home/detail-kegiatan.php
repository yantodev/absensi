<!-- Contact-->
<section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">DETAIL KEGIATAN
                <br>"<?= $data2['kegiatan']; ?>"
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Hadir <?= $data2['kegiatan']; ?></h6>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="50px">#</th>
                                        <th width="100px">NO ID</th>
                                        <th>NAMA</th>
                                        <th>JABATAN</th>
                                        <th>STATUS</th>
                                        <th>ALASAN</th>
                                        <th width="50px">TTD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data as $d) : ?>
                                        <tr>
                                            <td scope="row"><?= $i; ?></td>
                                            <td><?= $d['no_id']; ?></td>
                                            <td>
                                                <?php
                                                $data = $this->db->get_where('tbl_gukar', ['nbm' => $d['no_id']])->row_array();
                                                $data2 = $this->db->get_where('tbl_siswa', ['nis' => $d['no_id']])->row_array();
                                                echo $data['nama'];
                                                echo $data2['nama'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $data = $this->db->get_where('tbl_gukar', ['nbm' => $d['no_id']])->row_array();
                                                $data2 = $this->db->get_where('tbl_siswa', ['nis' => $d['no_id']])->row_array();
                                                echo $data['jabatan'];
                                                if ($data2['level'] == 5) {
                                                    echo "Siswa";
                                                }
                                                ?>
                                            </td>
                                            <td><?= $d['status']; ?></td>
                                            <td><?= $d['alasan']; ?></td>
                                            <td><img src="<?= base_url() . $d['ttd']; ?>" width="50px" height="50px"></td>

                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card mb-3" style="width: 18rem;">
                    <div class="card-header">
                        DOWNLOAD
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($file as $f) : ?>
                            <li class="list-group-item">
                                <a href="<?= base_url(); ?>home/file/<?= $f['file']; ?>"><?= $f['file']; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        DOKUMENTASI
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($foto as $f) : ?>
                            <li class="list-group-item">
                                <a href="<?= base_url(); ?>home/foto/<?= $f['foto']; ?>">
                                    <img src="<?= base_url('image/kegiatan/foto/') . $f['foto']; ?>" width="250px"></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>