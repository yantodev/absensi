     </div>
     <!-- /.container-fluid -->
     </div>
     <!-- End of Main Content -->
     <!-- Footer -->
     <footer class="sticky-footer bg-white">
         <div class="container my-auto">
             <div class="copyright text-center my-auto">
                 <span>Copyright &copy; IT Development <a href="https://smkmuhkarangmojo.sch.id/">SMK Muhammadiyah Karangmojo</a> <?= date('Y'); ?>.<br />Versi 2.0</span>
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
     <script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
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

     <!-- get iduka by jurusan -->
     <script>
         $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
             // Kita sembunyikan dulu untuk loadingnya
             $("#loading").hide();

             $("#jurusan").change(function() { // Ketika user mengganti atau memilih data jurusan
                 $("#nama_instansi").hide(); // Sembunyikan dulu combobox kota nya
                 $("#loading").show(); // Tampilkan loadingnya

                 $.ajax({
                     type: "GET", // Method pengiriman data bisa dengan GET atau POST
                     url: "<?php echo base_url("admin/listIduka"); ?>", // Isi dengan url/path file php yang dituju
                     data: {
                         jurusan: $("#jurusan").val()
                     }, // data yang akan dikirim ke file yang dituju
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) { // Ketika proses pengiriman berhasil
                         $("#loading").hide(); // Sembunyikan loadingnya
                         // set isi dari combobox kota
                         // lalu munculkan kembali combobox kotanya
                         $("#nama_instansi").html(response.list_iduka).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- get iduka2 by jurusan -->
     <script>
         $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
             // Kita sembunyikan dulu untuk loadingnya
             $("#loading").hide();

             $("#jurusan").change(function() { // Ketika user mengganti atau memilih data jurusan
                 $("#lokasi").hide(); // Sembunyikan dulu combobox kota nya
                 $("#loading").show(); // Tampilkan loadingnya

                 $.ajax({
                     type: "GET", // Method pengiriman data bisa dengan GET atau POST
                     url: "<?php echo base_url("admin/listIduka"); ?>", // Isi dengan url/path file php yang dituju
                     data: {
                         jurusan: $("#jurusan").val()
                     }, // data yang akan dikirim ke file yang dituju
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) { // Ketika proses pengiriman berhasil
                         $("#loading").hide(); // Sembunyikan loadingnya
                         // set isi dari combobox kota
                         // lalu munculkan kembali combobox kotanya
                         $("#lokasi").html(response.list_iduka).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <!-- get alamat iduka -->
     <script>
         $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
             // Kita sembunyikan dulu untuk loadingnya
             $("#loading").hide();

             $("#nama_instansi").change(function() { // Ketika user mengganti atau memilih data iduka
                 $("#alamat_instansi").hide(); // Sembunyikan dulu combobox kota nya
                 $("#loading").show(); // Tampilkan loadingnya

                 $.ajax({
                     type: "GET", // Method pengiriman data bisa dengan GET atau POST
                     url: "<?php echo base_url("Admin/AlamatIduka"); ?>", // Isi dengan url/path file php yang dituju
                     data: {
                         nama_instansi: $("#nama_instansi").val()
                     }, // data yang akan dikirim ke file yang dituju
                     dataType: "json",
                     beforeSend: function(e) {
                         if (e && e.overrideMimeType) {
                             e.overrideMimeType("application/json;charset=UTF-8");
                         }
                     },
                     success: function(response) { // Ketika proses pengiriman berhasil
                         $("#loading").hide(); // Sembunyikan loadingnya
                         // set isi dari combobox kota
                         // lalu munculkan kembali combobox kotanya
                         $("#alamat_instansi").html(response.list_alamat).show();
                     },
                     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                         alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                     }
                 });
             });
         });
     </script>
     <script type="text/javascript" src="<?= base_url(); ?>assets/ckeditor/ckeditor.js"></script>
     <script>
         var ckeditor = CKEDITOR.replace('kegiatan', {
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