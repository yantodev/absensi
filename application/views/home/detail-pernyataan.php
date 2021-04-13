<!-- Contact-->
<section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Surat Pernyataan</h2>
            <h3 class="section-subheading">SMK MUHAMMADIYAH KARANGMOJO</h3>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">SMK Muhammadiyah Karangmojo</h6>
                <small>Klik tombol <br />
                    <!-- <i class="fa fa-edit"></i> untuk megikuti kegiatan<br /> -->
                    <i class="fa fa-eye"></i> untuk melihat daftar peserta</small>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <form action="" method="get">
                        <select class="mb-3" name="kelas" id="kelas">
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas as $k) : ?>
                                <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="badge btn-primary" type="submit">LIHAT</button>
                    </form>
                    <table class=" table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th width="50px">#</th>
                                <th width="100px">NIS</th>
                                <th>NAMA</th>
                                <th>KELAS</th>
                                <th>STATUS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $d) : ?>
                                <tr>
                                    <td scope="row"><?= $i; ?></td>
                                    <td><?= $d['nis']; ?></td>
                                    <td><?= $d['nama']; ?></td>
                                    <td><?= $d['kelas']; ?></td>
                                    <td align="center">
                                        <?php
                                        $nis = $d['nis'];
                                        $count = $this->db->get_where('tbl_surat_pernyataan', ['nis' => $d['nis']])->result_array();
                                        $result = count($count);
                                        // echo $result;
                                        if ($result < 1) {
                                            echo "<button class='badge btn-danger'>Belum</button>";
                                        } elseif ($result <= 1) {
                                            echo "<button class='badge btn-success'>Sudah</button>";
                                        } else {
                                            echo "<a href='detail_pernyataan_siswa/$nis'><button class='badge btn-warning'>Lebih 1x</button></a>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <!-- <a href="<?= base_url('home/absen_kegiatan/') . $d['id']; ?>"><button class="badge btn-primary mb-3"><i class="fa fa-edit fa-fw" alt="detail" title="Absen Sekarang"></i> Absen</button></a><br /> -->
                                        <a href="<?= base_url('home/detail_pernyataan_siswa/') . $d['nis']; ?>"><button class="badge btn-danger"><i class="far fa-file-pdf" alt="detail" title="View Detail"></i> PDF</button></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?= base_url('home/cetak_pernyataan_kelas?kelas=') . $dt; ?>"><button class="btn btn-danger"><i class="far fa-file-pdf" alt="detail" title="Cetak PDF"></i> Export PDF</button></a>
                </div>
            </div>
        </div>
    </div>
</section>