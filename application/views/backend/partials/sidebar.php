<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?=base_url('assets/img/logo_sm.png');?>" style="width:50px;margin-top:-10px;" alt="LOGO BAIK SMALL">
        </div>
        <div class="sidebar-brand-text mx-3">BAIK CMS <sup>v1</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="<?=site_url('backend/dashboard/index');?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Berita Baik
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?=site_url('backend/berita/create');?>">
            <i class="fas fa-fw fa-plus"></i>
            <span>Buat Berita Baik</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?=site_url('backend/berita/index');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>List Berita Baik</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kisah Baik
    </div>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-plus"></i>
            <span>Buat Kisah Baik</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fab fa-fw fa-youtube"></i>
            <span>List Kisah Baik</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>