     </div>
     <!-- /.container-fluid -->
     </div>
     <!-- End of Main Content -->
     <!-- Footer -->
     <footer class="sticky-footer bg-white">
         <div class="container my-auto">
             <div class="copyright text-center my-auto">
                 <span>Copyright &copy; IT Development <a href="https://smkmuhkarangmojo.sch.id/">SMK Muhammadiyah Karangmojo</a> <?= date('Y'); ?></span>
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
     <!-- <script src="<?= base_url(); ?>/assets/js/demo/datatables-demo.js"></script>
     <script>
         $(document).ready(function() {
             $("#loading").hide();

             $("#kelas").change(function() {
                 $("#nama").hide();
                 $("#loading").show();

                 $.ajax({
                     type: "GET",
                     url: "<?php echo base_url("js/tbh_siswa"); ?>",
                     data: {
                         kelas: $("#kelas").val()
                     },
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) {
                         $("#loading").hide();
                         $("#nama").html(response.list_nama).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) {
                         alert(xhr.kelas + "\n" + xhr.responseText + "\n" + thrownError);
                     }
                 });
             });
         });
     </script> -->

     <script>
         $('.custom-file-input').on('change', function() {
             let fileName = $(this).val().split('\\').pop();
             $(this).next('.custom-file-label').addClass("selected").html(fileName);
         });


         $('.form-check-input').on('click', function() {
             const menuId = $(this).data('menu');
             const roleId = $(this).data('role');

             $.ajax({
                 url: "<?= base_url('administrator/changeaccess'); ?>",
                 type: 'post',
                 data: {
                     menuId: menuId,
                     roleId: roleId
                 },
                 success: function() {
                     document.location.href = "<?= base_url('administrator/roleaccess/'); ?>" + roleId;
                 }
             })

         });
     </script>

     <script type="text/javascript" src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
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
     </script>
     <!-- <script>
         $(document).ready(function() {
             $(document).on('click', '#guru', function() {
                 var nama = $(this).data('nama');
                 var nbm = $(this).data('nbm');
                 var lokasi = $(this).data('lokasi');
                 $('#nama').val(nama);
                 $('#nbm').val(nbm);
                 $('#lokasi').val(lokasi);
             })
         })
     </script> -->
     </body>

     </html>