   <header class="masthead">
       <div class="container">
           <marquee bgcolor="blue">
               <h3>Jangan Lupa Mengisi Absensi Masuk dan Pulang.</h3>
           </marquee>
           <?= $this->session->flashdata('message'); ?>

           <div class="masthead-heading text-uppercase">
               Absensi Online<br />SMK Muhammadiyah Karangmojo
           </div>
           <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?= base_url('home/absen'); ?>">Absen Sekarang</a>
       </div>
       <div class="masthead-subheading">Informasi silahkan hubungi<br /><b>Admin <a href="https://api.whatsapp.com/send?phone=6281328646069&text=Assalamu'laikum,%20Saya%20butuh%20bantuan%20tentang%20aplikasi%20absensi"><i class="fab fa-whatsapp-square"> </i> 081328646069</i></a></b></div>
   </header>
