<!-- Contact-->
<section class="page-section">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Form Absensi Kegiatan</h2>
            <h2 class="section-subheading mb-3">"<?= $kegiatan['kegiatan']; ?>"</h2>
        </div>
        <form id="absenForm" name="sentMessage" novalidate="novalidate">
            <input type="hidden" name="id_keg" id="id_keg" value="<?= $kegiatan['id']; ?>">
            <div class="align-items-center mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" list="datalistOptions" id="nbm" name="nbm" placeholder="your NBM *" data-validation-required-message="Please enter your NBM." />
                        <datalist id="datalistOptions">
                            <?php foreach ($nbm as $n) : ?>
                                <option value="<?= $n['nbm']; ?>">
                                <?php endforeach; ?>
                        </datalist>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="nama" id="listnama">
                            <option value="">Your name *</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="email" id="email">
                            <option value="">Your email *</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="level" id="level">
                            <option value="">Status Kepegawaian</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group mb-md-0">
                        <select class="form-control" name="status" id="status">
                            <option value="">Pilih status kehadiran</option>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group mb-md-0">
                        <input class="form-control" id="alasan" name="alasan" placeholder="Masukan alasan Anda." />
                        <small style="color: red;"><i>*Diisi ketika anda izin saja apabila masuk silahkan dikosongkan</i></small>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <input type="hidden" name="kegiatan" id="kegiatan" value="<?= $kegiatan['kegiatan']; ?>">
                <!-- <input type="hidden" name="time" id="time" value="<?= time(); ?>"> -->
                <div class="container">
                    <div class="m-signature-pad-body mb-3">
                        <p>Tanda Tangan Disini</p>
                        <div id="signature-pad">
                            <canvas width="200px" height="200px"></canvas>
                            <div class="m-signature-pad-footer pb-8">
                                <div style="align-content: center;" class="pb-9">
                                    <button type="button" id="save2" data-action="save" class="btn btn-primary"><i class="fa fa-check"></i> Save</button>
                                    <button type="button" data-action="clear" class="btn btn-danger"><i class="fa fa-trash"></i> Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                    <p style="text-align: center;">Absensi berhasil, Terima Kasih!!!!</p>
                </div>
                <p style="text-align: center;"><?= $motivasi['motivasi']; ?></p>
            </div>
        </div>
    </div>
</div>

<!-- //tanda tangan -->
<script src="<?= base_url(); ?>/assets/frontend/js/signature-pad.js"></script>
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
                url: "<?php echo base_url(); ?>js/insert_DH_kegiatan",
                data: {
                    'image': signaturePad.toDataURL(),
                    'id_keg': $('#id_keg').val(),
                    'nbm': $('#nbm').val(),
                    'nama': $('#listnama').val(),
                    'email': $('#email').val(),
                    'date': today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate(),
                    'status': $('#status').val(),
                    'alasan': $('#alasan').val(),
                    'kegiatan': $('#kegiatan').val()
                },
                success: function(datas1) {
                    signaturePad.clear();
                    $('#myModal2').modal('show');
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 10000);
                    $('.success').html(datas1);
                }
            });
        }
    });
</script>

</body>

</html>