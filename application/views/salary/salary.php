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
                        <td><?= $i++ ?></td>
                        <td><?= $d['nbm'] ?></td>
                        <td><?= $d['nama'] ?></td>
                        <td>
                            <?php
                            $totalUmum = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $d['nbm'],
                                'id_salary_category' => 1,
                            ])->result_array();
                            
                            if(!$master){
                                $totalUmum = 0;
                            }
                            
                            foreach ($master as $m){
                                $totalUmum += $m['price'] * $m['qty'];
                            }
                            echo convRupiah($totalUmum);
                            ?>
                        </td>
                        <td>
                            <?php
                            $totalJabatan = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $d['nbm'],
                                'id_salary_category' => 2,
                            ])->result_array();
                            
                            if(!$master){
                                $totalJabatan = 0;
                            }
                            
                            foreach ($master as $m){
                                $totalJabatan += $m['price'] * $m['qty'];
                            }
                            echo convRupiah($totalJabatan);
                            ?>
                        </td>
                        <td>
                            <?php
                            $totalStafsus = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $d['nbm'],
                                'id_salary_category' => 3,
                            ])->result_array();
                            
                            if(!$master){
                                $totalStafsus = 0;
                            }
                            
                            foreach ($master as $m){
                                if(!$master){
                                $totalStafsus = 0;
                            }
                                $totalStafsus += $m['price'] * $m['qty'];
                            }
                            echo convRupiah($totalStafsus);
                            ?>
                        </td>
                        <td>
                            <?php
                            $totalKeamanan = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $d['nbm'],
                                'id_salary_category' => 4,
                            ])->result_array();
                            
                            if(!$master){
                                $totalKeamanan = 0;
                            }
                            
                            foreach ($master as $m){
                                $totalKeamanan += $m['price'] * $m['qty'];
                            }
                            echo convRupiah($totalKeamanan);
                            ?>
                        </td>
                        <td>
                            <?php
                            $totalPotongan = 0; 
                            $master = $this->db->get_where('tbl_list_salary',[
                                'month' => $this->input->get('bulan'),
                                'year' => $this->input->get('tahun'),
                                'id_peg'=> $d['nbm'],
                                'id_salary_category' => 5,
                            ])->result_array();
                            
                            if(!$master){
                                $totalPotongan = 0;
                            }
                            
                            foreach ($master as $m){
                                $totalPotongan += $m['price'] * $m['qty'];
                            }
                            echo convRupiah($totalPotongan);
                            ?>
                        </td>
                        <td>
                            <?= convRupiah(($totalUmum + $totalJabatan + $totalStafsus + $totalKeamanan) - $totalPotongan); ?>
                        </td>
                        <td>
                            <a
                                href="<?= base_url('salary/add_salary/').$d['nbm']."/".$this->input->get('bulan')."/".$this->input->get('tahun'); ?>">
                                <button class="btn btn-info">
                                    <i class="fa fa-eye fa-fw" alt="detail" title="Detail"></i> Detail
                                </button>
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