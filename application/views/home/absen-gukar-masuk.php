<section class="page-section" id="absen">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Form Absensi Masuk</h2>
            <h2 class="section-subheading">Silahkan masukan data anda...</h2>
        </div>
        <form id="absenForm" name="sentMessage" novalidate="novalidate">
            <div class="align-items-center mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" name="tp" id="tp">
                            <option>Pilih Tahun Pelajaran</option>
                            <?php foreach($tp as $tp): ?>
                            <option value="<?= $tp['id']; ?>"><?= $tp['tp']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="semester" id="semester">
                            <option>Pilih Semester</option>
                            <option value="1">Ganjil</option>
                            <option value="2">Genap</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" list="datalistOptions" id="nbm" name="nbm" placeholder="your NIP/NBM *" data-validation-required-message="Please enter your NBM." />
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
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="level" id="level" hidden>
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
                        <input class="form-control" id="alasan" name="alasan" value="-" placeholder="Masukan alasan Anda" />
                        <small style="color: red;"><i>*Diisi ketika anda izin saja, apabila masuk silahkan dikosongkan</i></small>
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

<script>
    var today = new Date();
    document.getElementById('btn-simpan').addEventListener("click", function(event) {

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>js/insert_DH",
                data: {
                    'tp': $('#tp').val(),
                    'semester': $('#semester').val(),
                    'nbm': $('#nbm').val(),
                    'nama': $('#nama').val(),
                    'email': $('#email').val(),
                    'bulan': (today.getMonth() + 1),
                    'date': today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate(),
                    'time': today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(),
                    'status': $('#status').val(),
                    'level': $('#level').val(),
                    'alasan': $('#alasan').val()
                },
                success: function(datas1) {
                    $('#myModal2').modal('show');
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 10000);
                    $('.success').html(datas1);
                }
            });
        }
    );
</script>
