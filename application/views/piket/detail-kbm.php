<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3><?= $title; ?></h3>
        <table>
            <tr>
                <th>Tanggal</th>
                <th width="50px" style="vertical-align: middle;text-align: center">:</th>
                <th><?= tgl($date); ?></th>
            </tr>
            <tr>
                <th>NBM</th>
                <th style="vertical-align: middle;text-align: center">:</th>
                <th><?= $detail['nbm']; ?></th>
            </tr>
            <tr>
                <th>Nama</th>
                <th style="vertical-align: middle;text-align: center">:</th>
                <th><?= $detail['nama']; ?></th>
            </tr>
        </table>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th width="80px">Jam Ke</th>
                        <th width="80px">Status</th>
                        <th>Keterangan</th>
                        <th>Diinput oleh</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($data as $d): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['jam']; ?></td>
                        <td>
                            <?php 
                            if($d['status'] == 1){
                            echo "✅";
                            } else if($d['status'] == 2){
                                echo "❌";
                            } else {
                                echo "";
                            }
                            ?>
                        </td>
                        <td><?= $d['keterangan']; ?></td>
                        <td><?= $d['created_by']; ?></td>
                        <td></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div>
            <small>
                Keterangan <br />
                ✅ : Mengajar <br />
                ❌ : Tidak Mengajar
            </small>
        </div>
    </div>
</div>