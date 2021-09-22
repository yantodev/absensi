<!-- Contact-->
<section class="page-section" id="absen">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Surat Pernyataan</h2>
            <h2 class="section-subheading">Kegiatan Ujian Kompetensi Keahlian (UKK)</h2>
            <!-- <p style="text-align: center;"><?= $motivasi['motivasi']; ?></p> -->
        </div>
        <br />
        <form id="absenForm" name="sentMessage" novalidate="novalidate">
            <div class="align-items-center mb-5">
                <div class="col-md-6">
                    <h3>Identitas Siswa</h3>
                    <div class="form-group">
                        <input class="form-control" list="datalistOptions" id="nis" name="nis" placeholder="NIS Siswa*" data-validation-required-message="Please enter your NIS." />
                        <datalist id="datalistOptions">
                            <?php foreach ($nis as $n) : ?>
                                <option value="<?= $n['nis']; ?>">
                                <?php endforeach; ?>
                        </datalist>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="nama" id="nama">
                            <option value="">Nama Siswa*</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="kelas" id="kelas">
                            <option value="">Pilih Kelas</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="hp_siswa" id="hp_siswa" placeholder="No HP siswa*" required>
                        <p class="help-block text-danger"></p>
                    </div>
                    <h3>Identitas Orang Tua/Wali</h3>
                    <div class="form-group mb-md-0">
                        <input class="form-control" type="text" name="nama_ortu" id="nama_ortu" placeholder="Nama orang tua/wali*" required>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group mb-md-0">
                        <input class="form-control" type="text" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat orang tua/wali*" required>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group mb-md-0">
                        <input class="form-control" type="text" name="hp_ortu" id="hp_ortu" placeholder="HP orang tua/wali*" required>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group mb-md-0">
                        <p style="color: black;text-align:center;background-color:white">
                            <b>
                                Dengan ini menyatakan bahwa saya telah menyetujui dan memberi ijin kepada anak saya tersebut di atas untuk mengikuti rangkaian kegiatan pembelajaran tatap muka di SMK Muhammadiyah Karangmojo sesuai jadwal yang telah ditentukan. Selain itu juga bersedia mengikuti ketentuan protokol kesehatan Covid-19 yang telah ditentukan, diantaranya adalah selalu mengisi screening kesehatan secara jujur pada saat akan mengikuti kegiatan pembelajaran tatap muka di sekolah. Screening kesehatan yang dimaksud adalah melalui link sebagai berikut:
                                <a href="https://screening.smkmuhkarangmojo.sch.id">https://screening.smkmuhkarangmojo.sch.id</a>
                                Jika Bapak/Ibu tidak berkenan mengijinkan putra/putrinya maka Bapak/Ibu berkewajiban mengantarkan hasil tugas-tugas ke sekolah.

                            </b>
                        </p>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <!-- <input type="hidden" name="date" id="date" value="<?= date("d-m-Y"); ?>">
                <input type="hidden" name="time" id="time" value="<?= time(); ?>"> -->
                <div class="container">
                    <div class="m-signature-pad-body mb-3">
                        <p>Tanda Tangan<br />Orang Tua/Wali</p>
                        <div id="signature-pad">
                            <canvas width="200px" height="200px"></canvas>
                            <div class="m-signature-pad-footer pb-8">
                                <div style="align-content: center;" class="pb-9">
                                    <br />
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
                    <p style="text-align: center;">Surat Pernyataan berhasil ditambahkan,<br />Terima Kasih!!!!</p>
                </div>
                <!-- <p style="text-align: center;"><?= $motivasi['motivasi']; ?></p> -->
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
                url: "<?php echo base_url(); ?>js/insert_surat",
                data: {
                    'image': signaturePad.toDataURL(),
                    'nis': $('#nis').val(),
                    'nama': $('#nama').val(),
                    'kelas': $('#kelas').val(),
                    'hp_siswa': $('#hp_siswa').val(),
                    'date': today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate(),
                    'nama_ortu': $('#nama_ortu').val(),
                    'alamat_ortu': $('#alamat_ortu').val(),
                    'hp_ortu': $('#hp_ortu').val()
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