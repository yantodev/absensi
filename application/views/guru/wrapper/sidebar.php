    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ABSENSI</br><small>SMK Muhka</small></div>
            </a>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Guru
            </div>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('guru'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('guru/jurnal?nbm=' . $user['no_reg']); ?>">
                    <i class="fas fa-book"></i>
                    <span>Jurnal-ku</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#absen" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-calendar-check"></i>
                    <span>Data Absen-ku</span>
                </a>
                <div id="absen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('guru/absensi'); ?>">Absensi</a>
                        <a class="collapse-item" href="<?= base_url('guru/rekap'); ?>">Rekap Absensi</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-database"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('guru/kegiatan?owner=' . $user['name']); ?>">Kegiatan</a>
                        <a class="collapse-item" href="<?= base_url('guru/fl_keg?owner=' . $user['name']); ?>">File Kegiatan</a>
                        <a class="collapse-item" href="<?= base_url('guru/ft_keg?owner=' . $user['name']); ?>">Foto Kegiatan</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->