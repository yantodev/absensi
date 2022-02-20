   <header class="masthead">
       <div class="container">
           <marquee bgcolor="blue">
               <h3>PENGUMUMAN!!! UPDATE VERSI TERBARU!!!.</h3>
           </marquee>
           <?= $this->session->flashdata('message'); ?>

           <div class="masthead-heading text-uppercase">
               SILAHKAN LOGIN TERLEBIH DAHULU UNTUK MELAKUKAN ABSENSI
           </div>
           <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger"
               href="<?= base_url('auth/guru'); ?>">LOGIN</a>
       </div>
       <div class="masthead-subheading">Informasi silahkan hubungi<br /><b>Admin <a
                   href="https://api.whatsapp.com/send?phone=6285921033901&text=Assalamu'laikum,%20Saya%20butuh%20bantuan%20tentang%20aplikasi%20absensi"><i
                       class="fab fa-whatsapp-square"> </i> 085921033901</i></a></b></div>
   </header>