<!-- Contact-->
<section class="page-section" id="absen">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Form Absensi Pulang</h2>
            <h2 class="section-subheading">Silahkan masukan data anda...</h2>
        </div>
        <form id="absenForm" name="sentMessage" novalidate="novalidate">
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
                        <select class="form-control" name="nama" id="nama">
                            <option value="">Your name *</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="email" id="email">
                            <option value="">Your email *</option>
                        </select>
                        <p class="help-block text-danger"></p>

                        <input type="hidden" name="date" id="date" value="<?= date("d-m-Y"); ?>">
                        <input type="hidden" name="time" id="time" value="<?= time(); ?>">
                        <button type="button" id="btn-simpan" class="btn btn-success"><i class="fa fa-check"></i> Absen Sekarang</button>
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
                    Absensi berhasil, Terima Kasih!!!!
                </div>
            </div>
        </div>
    </div>
</div>

<!-- //tanda tangan -->
<script src="<?= base_url(); ?>/assets/frontend/js/signature-pad.js"></script>
<script>
    
    var today = new Date();

    document.getElementById('btn-simpan').addEventListener("click", function(event) {


            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>js/update_DH",
                data: {
                    'nama': $('#nama').val(),
                    'nbm': $('#nbm').val(),
                    'date': today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate(),
                    'time': today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(),
                },
                success: function(datas1) {
                    $('#myModal2').modal('show');
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 3000);
                    $('.success').html(datas1);
                }
            });
    });
</script>

</body>

</html>