       <!-- Footer-->
       <footer class="footer py-4">
           <div class="container">
               <div class="row align-items-center">
                   <div class="col-lg-4 text-lg-left">Copyright © SMK Muh Karangmojo 2021</div>
                   <div class="col-lg-4 my-3 my-lg-0">
                       <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                       <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                       <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fas fa-globe"></i></a>
                   </div>
                   <div class="col-lg-4 text-lg-right">
                       <a class="mr-3" href="#!">Privacy Policy</a>
                       <a href="#!">Terms of Use</a>
                   </div>
               </div>
           </div>
       </footer>
       <!-- Bootstrap core JS-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
       <!-- Third party plugin JS-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
       <!-- Contact form JS-->
       <script src="<?= base_url(); ?>/assets/frontend/assets/mail/jqBootstrapValidation.js"></script>
       <script src="<?= base_url(); ?>/assets/frontend/assets/mail/contact_me.js"></script>
       <!-- Core theme JS-->
       <script src="<?= base_url(); ?>/assets/frontend/js/scripts.js"></script>
       <script src="<?= base_url(); ?>/assets/frontend/js/signature-pad.js"></script>
       <script src="<?= base_url(); ?>/assets/backend/vendor/datatables/jquery.dataTables.min.js"></script>
       <script src="<?= base_url(); ?>/assets/backend/vendor/datatables/dataTables.bootstrap4.min.js"></script>

       <!-- Page level custom scripts -->
       <script src="<?= base_url(); ?>/assets/js/demo/datatables-demo.js"></script>
       <script>
           $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
               // Kita sembunyikan dulu untuk loadingnya
               $("#loading").hide();

               $("#nbm").change(function() { // Ketika user mengganti atau memilih data jurusan
                   $("#listnama").hide(); // Sembunyikan dulu combobox kota nya
                   $("#loading").show(); // Tampilkan loadingnya

                   $.ajax({
                       type: "GET", // Method pengiriman data bisa dengan GET atau POST
                       url: "<?php echo base_url("home/nama"); ?>", // Isi dengan url/path file php yang dituju
                       data: {
                           nbm: $("#nbm").val()
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
                           $("#listnama").html(response.list_nama).show();
                       },
                       error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                           alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                       }
                   });
               });
           });
       </script>
       <script>
           $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
               // Kita sembunyikan dulu untuk loadingnya
               $("#loading").hide();

               $("#nbm").change(function() { // Ketika user mengganti atau memilih data jurusan
                   $("#email").hide(); // Sembunyikan dulu combobox kota nya
                   $("#loading").show(); // Tampilkan loadingnya

                   $.ajax({
                       type: "GET", // Method pengiriman data bisa dengan GET atau POST
                       url: "<?php echo base_url("home/email"); ?>", // Isi dengan url/path file php yang dituju
                       data: {
                           nbm: $("#nbm").val()
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
                           $("#email").html(response.list_email).show();
                       },
                       error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                           alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                       }
                   });
               });
           });
       </script>
       <script>
           $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
               // Kita sembunyikan dulu untuk loadingnya
               $("#loading").hide();

               $("#nbm").change(function() { // Ketika user mengganti atau memilih data jurusan
                   $("#level").hide(); // Sembunyikan dulu combobox kota nya
                   $("#loading").show(); // Tampilkan loadingnya

                   $.ajax({
                       type: "GET", // Method pengiriman data bisa dengan GET atau POST
                       url: "<?php echo base_url("home/status"); ?>", // Isi dengan url/path file php yang dituju
                       data: {
                           nbm: $("#nbm").val()
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
                           $("#level").html(response.list_level).show();
                       },
                       error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                           alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                       }
                   });
               });
           });
       </script>


       </body>

       </html>