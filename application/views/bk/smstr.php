<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">REKAP DAFTAR HADIR SEMESTER <?= $semester; ?> </h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <form action="" method="get">
                <select class="form-control mb-2" name="tp" id="tp" required>
                    <option value="">Tahun Pelajaran</option>
                    <?php foreach ($tp as $t) : ?>
                        <option value="<?= $t['tp']; ?>"><?= $t['tp']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select class="form-control mb-2" name="smsrt" id="smsrt" required>
                    <option value="">Pilih Semester</option>
                    <?php foreach ($smstr as $s) : ?>
                        <option value="<?= $s['semester']; ?>"><?= $s['semester']; ?></option>
                    <?php endforeach; ?>
                </select>
                <select class="form-control mb-2" name="kelas" id="kelas" required>
                    <option value="">Pilih kelas</option>
                    <?php foreach ($kls as $k) : ?>
                        <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>JK</th>
                        <th>HADIR</th>
                        <th>IZIN</th>
                        <th>ALPHA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td><?= ucwords(strtolower($d['nama'])); ?></td>
                            <td><?= $d['jk']; ?></td>
                            <td align="center">
                                <?php
                                $count = $this->db->get_where('tbl_dh', ['nbm' => $d['nis'], 'status' => 'Hadir', 'tp' => $tp2, 'semester' =>  $semester])->result_array();
                                echo count($count);
                                ?>
                            </td>
                            <td align="center">
                                <?php
                                $count = $this->db->get_where('tbl_dh', ['nbm' => $d['nis'], 'status' => 'Izin', 'tp' => $tp2, 'semester' =>  $semester])->result_array();
                                echo count($count);
                                ?>
                            </td>
                            <td align="center">
                                <?php
                                $count = $this->db->get_where('tbl_dh', ['nbm' => $d['nis'], 'tp' => $tp2, 'semester' => $semester])->result_array();
                                $data = count($count);
                                $data2 = $hf->$semester;
                                echo $data2 - $data;

                                ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus siswa ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Setelah data dihapus data tidak bisa dikembalikan!!!</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/hapus/') . $d['id']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->