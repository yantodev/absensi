   <!-- Masthead-->
   <header class="masthead">
       <div class="container">
           <marquee bgcolor="blue">Jangan Lupa Mengisi Absensi Masuk dan Pulang.</marquee>
           <?= $this->session->flashdata('message'); ?>
           <!-- <div class="masthead-subheading">Selamat datang di Aplikasi Absensi Online SMK Muh Karangmojo!</div> -->
           <div class="masthead-heading text-uppercase">
               Absensi Online<br />SMK Muhammadiyah Karangmojo
           </div>
           <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?= base_url('home/absen'); ?>">Absen Sekarang</a>
       </div>
       <div class="masthead-subheading">Informasi silahkan hubungi<br /><b>Admin <a href="https://api.whatsapp.com/send?phone=6281328646069&text=Assalamu'laikum,%20Saya%20butuh%20bantuan%20tentang%20aplikasi%20absensi"><i class="fab fa-whatsapp-square"> </i> 081328646069</i></a></b></div>
   </header>
   <!-- Contact-->
   <!-- <section class="page-section" id="contact">
       <div class="container">
           <div class="text-center">
               <h2 class="section-heading text-uppercase">Kritik dan Saran</h2>
               <h3 class="section-subheading text-muted">Silahkan masukan kritik dan saran untuk pengembangan aplikasi ini.</h3>
           </div>
           <?php echo form_open('home/kirim_email', ['method' => 'post', 'enctype' => 'multipart/form-data']) ?>
           <div class="row align-items-stretch mb-5">
               <div class="col-md-6">
                   <div class="form-group">
                       <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                       <p class="help-block text-danger"></p>
                   </div>
                   <div class="form-group">
                       <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                       <p class="help-block text-danger"></p>
                   </div>
                   <div class="form-group mb-md-0">
                       <input class="form-control" id="phone" name="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                       <p class="help-block text-danger"></p>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="form-group form-group-textarea mb-md-0">
                       <textarea class="form-control" id="message" name="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                       <p class="help-block text-danger"></p>
                   </div>
               </div>
           </div>
           <div class="text-center">
               <button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
           </div>
           </form>
       </div>
   </section> -->