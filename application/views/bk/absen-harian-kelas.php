<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">REKAP DAFTAR HADIR HARIAN KELAS <?= $kelas; ?></h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Tambah Data Absensi |
            <i class="fa fa-eye"></i> Detail Data
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('bk/hr_kelas'); ?> " method="get">
            <select name="kelas" id="kelas" required>
                <option value="">Pilih kelas</option>
                <?php foreach ($kls as $k) : ?>
                    <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="level" id="level" value="5">
            <input type="date" name="date" id="date" required>
            <button type="submit">VIEW</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Name</th>
                        <th>Hadir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td>
                                <?php
                                $nama = $this->db->get_where('tbl_siswa', ['nis' => $d['nis']])->row_array();
                                echo ucwords(strtolower($nama['nama']));
                                ?>
                            </td>
                            <td>
                                <?php
                                $hadir = $this->db->get_where('tbl_dh', ['nbm' => $d['nis'], 'date_in' => $date])->result_array();
                                $result = count($hadir);
                                // echo $result;
                                if ($result < 1) {
                                    echo "<button class='btn btn-danger'>Belum</button>";
                                } elseif ($result <= 1) {
                                    echo "<button class='btn btn-success'>Sudah</button>";
                                } elseif ($result > 2) {
                                    echo "<button class='btn btn-warning'>Lebih 1x</button>";
                                }
                                ?>
                            </td>

                            <td>
                                <a href="<?= base_url('bk/tbh_absn?nis=') . $d['nis'] . '&tgl=' . $date; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Tambah Absensi"></i></a>
                                <a href="<?= base_url('bk/detail_hr_kelas?id=') . $d['nis']; ?>"><i class="fa fa-eye fa-fw" alt="detail" title="Detail Absensi"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>