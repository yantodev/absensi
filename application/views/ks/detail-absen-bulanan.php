<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-uppercase">REKAP DAFTAR HADIR <?= $id['name']; ?></h6>
        <small>Keterangan <br />
            <i class="fa fa-edit"></i> Edit Data |
            <i class="fa fa-trash"></i> Hapus Data
        </small>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message'); ?>

        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>TANGGAL</th>
                        <th>MASUK</th>
                        <th>PULANG</th>
                        <th>STATUS PRESENSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($hari as $j => $h): ?>
                        <?php 
                             $d = $this->db->get_where('tbl_dh',['date_in'=>$h['tgl'],'nbm'=>$this->input->get('nbm')])->row_array();
                        ?>
                        <tr>
                            <td><?= $i; ?></td>
                           <td><?=$h['hari']. ", " . tgl2($h['tgl']) ?></td>
                          <td><?= $d['time_in']; ?></td>
                            <td><?= $d['time_out']; ?></td>
                           <td>
                                <?= is_weekend($h['tgl']) ? 'Libur Akhir Pekan' : ($d['date_in']!= null ? "Hadir" : ""); ?>
                           </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?= base_url('ks/cetak_pdf_bln'); ?>" method="get">
                <label for="">From</label>
                <input type="date" name="date1" id="date1">
                <label for="">To</label>
                <input type="date" name="date2" id="date2">
                <input type="hidden" name="bulan" id="bulan" value="<?= $bulan['id']; ?>">
                <input type="hidden" name="nbm" id="nbm" value="<?= $id['no_reg']; ?>">
                <input type="hidden" name="nama" id="nama" value="<?= $id['name']; ?>">
                <button class="btn btn-google mb-2"><i class="far fa-file-pdf"> CETAK PDF</i></button>
                </a>
                <!-- <a href="">
                    <button class="btn btn-success mb-2"><i class="far fa-file-excel"> CETAK EXCEL</i></button>
                </a> -->
            </form>
        </div>
    </div>
</div>