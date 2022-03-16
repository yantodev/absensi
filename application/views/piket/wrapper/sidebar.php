    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PRESENSI</br><small>SMK Muhka</small></div>
            </a>

            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Guru Piket
            </div>

            <!-- Nav Item -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('piket'); ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#rekapkehadiran"
                    aria-expanded="true" aria-controls="rekapkehadiran">
                    <i class="fas fa-users"></i>
                    <span>Rekap Kehadiran Guru</span>
                </a>
                <div id="rekapkehadiran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('piket/rekap_piket_hr'); ?>">Harian</a>
                        <a class="collapse-item" href="<?= base_url('piket/rekap_piket_bln'); ?>">Bulanan</a>
                    </div>
                </div>
                <!-- <li class="nav-item">
                <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#MasterData"
                    aria-expanded="true" aria-controls="MasterData">
                    <i class="fas fa-database"></i>
                    <span>Master Data</span>
                </a>
                <div id="MasterData" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Menu</h6>
                        <a class="collapse-item" href="<?= base_url('piket/category'); ?>">Category</a>
                        <a class="collapse-item" href="<?= base_url('piket/sub_category'); ?>">Sub Category</a>
                        <a class="collapse-item" href="<?= base_url('piket/master_piket'); ?>">Master piket</a>
                        <a class="collapse-item" href="<?= base_url('piket/template_piket'); ?>">Template piket</a>
                    </div>
                </div>
            </li> -->
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