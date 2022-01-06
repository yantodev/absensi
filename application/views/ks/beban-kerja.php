<style>
    th{
        text-align: center;
    }
</style>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">DAFTAR BEBAN KERJA</h6>
        <small>
            Keterangan <br />
            Beban kerja dihitung dalam satuan jam
        </small>
    </div>
    <div class="card-body">
         <?= $this->session->flashdata('message'); ?>
         <form action="<?= base_url('ks/bebankerja');?>" method="get">
            <select class="form-control col-3 mb-1" name="status" id="status">
                <option value="">-- Pilih Status --</option>
                <option value="1">Guru</option>
                <option value="2">Karyawan</option>
            </select>
            <button type="submit" class="btn btn-facebook mb-2">VIEW</button>
        </form>
        <div class="table-responsive" id="tableku">
            <form action="<?= base_url('ks/bebankerja'); ?>" method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th rowspan="3" style="vertical-align: middle;">No</th>
                        <th rowspan="3" style="vertical-align: middle;">NBM</th>
                        <th rowspan="3" style="vertical-align: middle;">NAMA</th>
                        <th rowspan="3" style="vertical-align: middle;">JABATAN</th>
                        <th colspan="6" style="vertical-align: middle;">BEBAN KERJA</th>
                    </tr>
                    <tr>
                        <th colspan="5">HARI</th>
                        <th rowspan="2" style="vertical-align: middle;">BULAN</th>
                    </tr>
                    <tr>
                        <th width="100px">SENIN</th>
                        <th width="100px">SELASA</th>
                        <th width="100px">RABU</th>
                        <th width="100px">KAMIS</th>
                        <th width="100px">JUM'AT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($data as $d): ?>
                    <tr>
                        <td>
                            <?= $no++; ?>
                            <input type="hidden" name="id[]" id="id" value="<?= $d['id']; ?>">
                        </td>
                        <td><?= $d['nbm']; ?></td>
                        <td><?= $d['nama']; ?></td>
                        <td><?= $d['jabatan']; ?></td>
                       <td>
                            <input class="col" type="number" name="senin[]" id="senin" value="<?= $d['senin']; ?>">
                        </td>
                        <td>
                            <input class="col" type="number" name="selasa[]" id="selasa" value="<?= $d['selasa']; ?>">
                        </td>
                        <td>
                            <input class="col" type="number" name="rabu[]" id="rabu" value="<?= $d['rabu']; ?>">
                        </td>
                        <td>
                            <input class="col" type="number" name="kamis[]" id="kamis" value="<?= $d['kamis']; ?>">
                        </td>
                        <td>
                            <input class="col" type="number" name="jumat[]" id="jumat" value="<?= $d['jumat']; ?>">
                        </td>
                        <td>
                            <?=
                            $d['senin'] + $d['selasa'] + $d['rabu'] + $d['kamis'] + $d['jumat']
                            ;?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <input type="hidden" name="status" value="<?= $this->input->get('status'); ?>">
            <button type="submit" class="btn btn-facebook">SIMPAN</button>
            </form>
        </div>
    </div>
</div>