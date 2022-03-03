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
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');?>"></div>
        <?php if($this->session->flashdata('message')) :?>
        <?php endif; ?>
        <form action="<?= base_url('salary/salary') ?> " method="get">
            <select class="form-control col-2 mb-1" name="status_id" id="status_id">
                <option value="">-- Pilih status --</option>
                <option value="1">Guru</option>
                <option value="2">Karyawan</option>
            </select>
            <select class="form-control col-2 mb-1" name="bulan" id="bulan">
                <option value="" disabled selected>-- Pilih Bulan --</option>
                <?php foreach ($all_bulan as $bn => $bt): ?>
                <option value="<?= $bn ?>" <?= $bn == $bulan ? 'selected' : '' ?>><?= $bt ?></option>
                <?php endforeach; ?>
            </select>
            <select class="form-control col-2 mb-1" name="tahun" id="tahun">
                <option value="" disabled selected>-- Pilih Tahun --</option>
                <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--): ?>
                <option value="<?= $i ?>" <?= $i == $tahun ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>">
            </select>
            <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NBM</th>
                        <th>NAMA</th>
                        <th>UMUM</th>
                        <th>JABATAN</th>
                        <th>STAFSUS</th>
                        <th>KEAMANAN & KEBERSIHAN</th>
                        <th>JUMLAH POTONGAN</th>
                        <th>TOTAL GAJI</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $d): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $d['nbm'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td>
                            <?php 
                            $salary = $this->db->get_where('tbl_salary',
                            ['id_peg'=>$d['nbm'],
                            'bulan' => $this->input->get('bulan'),
                            'tahun' => $this->input->get('tahun'),
                            ])->row_array();
                            echo convRupiah($salary['umum'])
                            ?>
                        </td>
                        <td><?= convRupiah($salary['jabatan']); ?></td>
                        <td><?= convRupiah($salary['stafsus']); ?></td>
                        <td><?= convRupiah($salary['keamanan']); ?></td>
                        <td><?= convRupiah($salary['potongan']); ?></td>
                        <td>
                            <?= convRupiah(($salary['umum'] + $salary['jabatan'] + $salary['stafsus'] + $salary['keamanan']) - $salary['potongan']); ?>
                        </td>
                        <td>
                            <a href="<?= base_url('salary/add_salary/').$d['nbm'] ?>">
                                <i class="fa fa-edit fa-fw" alt="detail" title="Edit"></i>
                            </a>
                            <a
                                href="<?= base_url() ?>salary/detail_salary?id=<?= $d['id'] ?>&status=<?= $this->input->get('status_id')?>">
                                <i class="fa fa-eye fa-fw" alt="detail" title="detail">
                                </i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= base_url()?>salary/tambah_salary?status=<?= $this->input->get('status_id');?>">
                <button type="button" class="btn btn-info mb-3">Input Gaji
                    Pegawai</button></a>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Gaji Pegawai</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('salary/add_salary') ?>" method="post">
                    <div class="form-group row">
                        <label class="col-3 form-label">Status</label>
                        <div class="col">
                            <select class="form-control" name="status" id="status" required>
                                <option value="">Pilih Status</option>
                                <option value="1">Guru</option>
                                <option value="2">Karyawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">NIP/NBM</label>
                        <div class="col">
                            <input class="form-control" type="text" id="nbm" name="nbm" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">Nama</label>
                        <div class="col">
                            <input class="form-control" type="text" id="nama" name="nama" required>
                            <small>Nama lengkap dan gelar</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">Email</label>
                        <div class="col">
                            <input class="form-control" type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">No. HP</label>
                        <div class="col">
                            <input class="form-control" type="number" id="hp" name="hp" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 form-label">Jabatan</label>
                        <div class="col">
                            <input class="form-control" type="text" id="jabatan" name="jabatan" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user" id="user" value="<?= $user[
                    'name'
                ] ?>">
                <button type="submit" class="btn btn-info">Tambah</button>
                <!-- <button type=" button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
            </form>
        </div>

    </div>
</div>