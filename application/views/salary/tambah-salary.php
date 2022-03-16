<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">DAFTAR GAJI</h6>
        <!-- <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit Data |
            <i class="fa fa-trash"></i> Hapus Data
        </small> -->
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message') ?>
        <div class="table-responsive">
            <form action="<?= base_url('salary/tambah_salary'); ?>" method="POST">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NBM</th>
                            <th>NAMA</th>
                            <th>BULAN</th>
                            <th>TAHUN</th>
                            <th>UMUM</th>
                            <th>JABATAN</th>
                            <th>STAFSUS</th>
                            <th>KEAMANAN & KEBERSIHAN</th>
                            <th>JUMLAH POTONGAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data as $d): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <input style="outline:0px !important;
                                            -webkit-appearance:none;
                                            box-shadow: none !important;
                                            border:none !important;" class="col" name="nbm[]" id="nbm"
                                    value="<?= $d['nbm'] ?>" readonly>
                            </td>
                            <td><?= $d['nama'] ?></td>
                            <td>
                                <select class="form-control" name="bulan[]" id="bulan">
                                    <option value="" disabled selected>-- Pilih Bulan --</option>
                                    <?php foreach ($all_bulan as $bn => $bt): ?>
                                    <option value="<?= $bn ?>" <?= $bn == $bulan ? 'selected' : '' ?>><?= $bt ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="tahun[]" id="tahun">
                                    <option value="" disabled selected>-- Pilih Tahun --</option>
                                    <?php for ($i = date('Y'); $i >= date('Y') - 5; $i--): ?>
                                    <option value="<?= $i ?>" <?= $i == $tahun ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php endfor; ?>">
                                </select>
                            </td>
                            <td>
                                <input type="number" style="outline:0px !important;
                                            -webkit-appearance:none;
                                            box-shadow: none !important;" class="col" name="umum[]" id="umum">
                            </td>
                            <td>
                                <input type="number" style="outline:0px !important;
                                            -webkit-appearance:none;
                                            box-shadow: none !important;" class="col" name="jabatan[]" id="jabatan">
                            </td>
                            <td>
                                <input type="number" style="outline:0px !important;
                                            -webkit-appearance:none;
                                            box-shadow: none !important;" class="col" name="stafsus[]" id="stafsus">
                            </td>
                            <td>
                                <input type="number" style="outline:0px !important;
                                            -webkit-appearance:none;
                                            box-shadow: none !important;" class="col" name="keamanan[]" id="keamanan">
                            </td>
                            <td>
                                <input type="number" style="outline:0px !important;
                                            -webkit-appearance:none;
                                            box-shadow: none !important;" class="col" name="potongan[]" id="potongan">
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
</div>