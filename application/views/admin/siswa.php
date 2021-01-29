<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">DAFTAR Guru dan karyawan</h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit Data |
            <i class="fa fa-trash"></i> Hapus Data
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('admin/siswa'); ?> " method="get">
            <!-- <select class="mb-1" name="jurusan" id="jurusan" required>
                <option value="">Pilih Jurusan</option>
                <?php foreach ($jurusan as $j) : ?>
                    <option value="<?= $j['id']; ?>"><?= $j['jurusan']; ?></option>
                <?php endforeach; ?>
            </select> -->
            <select class="mb-1" name="kelas" id="kelas">
                <option value="">Pilih Kelas</option>
                <?php foreach ($kelas as $k) : ?>
                    <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>EMAIL</th>
                        <th>JK</th>
                        <th>KELAS</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $d['nis']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['email']; ?></td>
                            <td><?= $d['jk']; ?></td>
                            <td><?= $d['kelas']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit_siswa/') . $d['id']; ?>"><i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i></a>
                                <a href="<?= base_url(); ?>admin/hapus_siswa?id=<?= $d['id']; ?>&kelas=<?= $kls; ?>"><i class="fa fa-trash fa-fw" alt="verifikasi" title="Hapus" onclick="return confirm('Yakin ingin menghapus siswa ini?');"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahSiswa">
                Tambah Siswa
            </button>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="tambahSiswa" tabindex="-1" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewRoleModalLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/siswa'); ?>" method="POST">
                <div class="form-group">
                    <label class="form-group col-lg">Jurusan</label>
                    <div class="col-lg">
                        <select class="form-control mb-1" name="jurusan" id="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <?php foreach ($jurusan as $j) : ?>
                                <option value="<?= $j['id']; ?>"><?= $j['jurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <label class="form-group col-lg">Kelas</label>
                    <div class="col-lg">
                        <select class="form-control mb-1" name="kelas" id="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas as $k) : ?>
                                <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <label class="form-group col-lg">NIS</label>
                <div class="col-lg">
                    <input class="form-control" type="number" id="nis" name="nis" required>
                </div>
                <label class="form-group col-lg">Nama</label>
                <div class="col-lg">
                    <input class="form-control" type="text" id="nama" name="nama" required>
                </div>
                <label class="form-group col-lg">Email</label>
                <div class="col-lg">
                    <input class="form-control" type="email" id="email" name="email" required>
                </div>
                <label class="form-group col-lg">Jenis Kelamin</label>
                <div class="col-lg">
                    <select class="form-control mb-1" name="jk" id="jk" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <input type="hidden" name="owner" id="owner" value="<?= $user['name']; ?>">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script src="<?= base_url(); ?>vendor/jquery/jquery.min.js"></script> -->
<script src="<?= base_url(); ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#loading").hide();
        $("#jurusan").change(function() {
            $("#kelas").hide();
            $("#loading").show();
            $.ajax({
                type: "GET",
                url: "<?= base_url("Js/getKelas"); ?>",
                data: {
                    jurusan: $("#jurusan").val()
                },
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) {
                    $("#loading").hide();
                    $("#kelas").html(response.list_kelas).show();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.kelas + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>