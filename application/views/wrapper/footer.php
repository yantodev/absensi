    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span style="color: black;">Copyright &copy; 2020 - <?= date('Y'); ?>
                    <a href="https://smkmuhkarangmojo.sch.id/">SMK Muhammadiyah Karangmojo</a>
                    powered by <a href="https:/yantodev.github.io/">Yantodev</a></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?= base_url(); ?>/assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url(); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/config.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/presensi.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/maintenance.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/admin.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/event/get-event.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/employee.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/flashdata.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/salary/category.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/salary/add-salary.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/salary/update-salary.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/salary/delete-salary.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/salary/update-kbm.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/user/user-access.js"></script>
    <script src="<?= base_url(); ?>assets/yantodev/piket/insert-data.js"></script>

    <script>
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});


$('.form-check-kbm').on('click', function() {
    const nbm = $(this).data('nbm');
    const jam = $(this).data('jam');
    const date = $(this).data('date');
    const created_by = $(this).data('created_by');
    var dates = new Date(date);

    $.ajax({
        url: "<?= base_url('piket/changeaccess'); ?>",
        type: 'post',
        data: {
            nbm: nbm,
            jam: jam,
            date: date,
            month: dates.getMonth() + 1,
            year: dates.getFullYear(),
            created_by: created_by
        },
        success: function() {
            setTimeout(function() {
                window.location.reload(1)
            }, 1000);
            document.location.href = "<?= base_url('piket/rekap_piket_hr?status_id='); ?>" + 1 +
                "&date=" + date;
        },
        error: function(e) {
            console.log(e);
        }
    })

});
    </script>

    <!-- <script type="text/javascript" src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
    <script>
var ckeditor = CKEDITOR.replace('jurnal', {
    height: '100px'
});
CKEDITOR.disableautoInline = true;
CKEDITOR.Inline('editable');
    </script>
    <script>
var ckeditor = CKEDITOR.replace('target', {
    height: '100px'
});
CKEDITOR.disableautoInline = true;
CKEDITOR.Inline('editable');
    </script>
    <script>
var ckeditor = CKEDITOR.replace('waktu', {
    height: '100px'
});
CKEDITOR.disableautoInline = true;
CKEDITOR.Inline('editable');
    </script> -->

    </body>

    </html>