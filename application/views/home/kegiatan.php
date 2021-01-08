<!-- Contact-->
<section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Daftar Kegiatan</h2>
            <h2 class="section-subheading">SMK MUHAMMADIYAH KARANGMOJO</h2>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Kegiatan SMK Muhammadiyah Karangmojo</h6>
                <small>Klik <b>ABSEN</b> untuk megikuti kegiatan</small>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="50px">#</th>
                                <th width="230px">TANGGAL</th>
                                <th width="100px">JAM</th>
                                <th>KEGIATAN</th>
                                <th width="120px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($data as $d) : ?>
                                <tr>
                                    <td scope="row"><?= $i; ?></td>
                                    <td><?= tgl($d['tgl']); ?></td>
                                    <td><?= $d['time']; ?></td>
                                    <td><?= $d['kegiatan']; ?></td>
                                    <td><a href="<?= base_url('home/absen_kegiatan/') . $d['id']; ?>"><button class="btn btn-primary">ABSEN</button></a></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Warning!</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    Sign before you submit!
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="alert alert-success">
                    Absensi berhasil, Terima Kasih!!!!
                </div>
            </div>
        </div>
    </div>
</div>

<!-- //tanda tangan -->
<!-- <script src="<?= base_url(); ?>/assets/frontend/js/signature-pad.js"></script>
<script>
    var wrapper = document.getElementById("signature-pad"),
        clearButton = wrapper.querySelector("[data-action=clear]"),
        saveButton = wrapper.querySelector("[data-action=save]"),
        canvas = wrapper.querySelector("canvas"),
        signaturePad;
    var today = new Date();
    // var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

    function resizeCanvas() {
        var ratio = window.devicePixelRatio || 1;
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }
    signaturePad = new SignaturePad(canvas);

    clearButton.addEventListener("click", function(event) {
        signaturePad.clear();
    });
    saveButton.addEventListener("click", function(event) {

        if (signaturePad.isEmpty()) {
            $('#myModal').modal('show');
        } else {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/update_DH",
                data: {
                    'image': signaturePad.toDataURL(),
                    'nbm': $('#nbm').val(),
                    'date': today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate(),
                    'time': today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(),
                },
                success: function(datas1) {
                    signaturePad.clear();
                    $('#myModal2').modal('show');
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 3000);
                    $('.success').html(datas1);
                }
            });
        }
    });
</script> -->

<!-- </body>

</html> -->