<?php
$a = $this->uri->segment(2);
$b = $this->uri->segment(3);
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?=base_url('assets/img/logo_sm.png');?>" style="width:50px;margin-top:-10px;" alt="LOGO BAIK SMALL">
        </div>
        <div class="sidebar-brand-text mx-3">BAIK CMS <sup>v1</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item <?php if($a=='dashboard'){ echo 'active'; }?>">
        <a class="nav-link" href="<?=site_url('admin/dashboard/index');?>">
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

    <li class="nav-item <?php if($a=='berita' && $b=='create'){ echo 'active'; }?>">
        <a class="nav-link" href="<?=site_url('admin/berita/create');?>">
            <i class="fas fa-fw fa-plus"></i>
            <span>Buat Berita Baik</span>
        </a>
    </li>

    <li class="nav-item <?php if($a=='berita' && $b=='index'){ echo 'active'; }?>">
        <a class="nav-link" href="<?=site_url('admin/berita/index');?>">
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

    <li class="nav-item <?php if($a=='kisah' && $b=='create'){ echo 'active'; }?>">
        <a class="nav-link" href="<?=site_url('admin/kisah/create');?>">
            <i class="fas fa-fw fa-plus"></i>
            <span>Buat Kisah Baik</span>
        </a>
    </li>

    <li class="nav-item <?php if($a=='kisah' && $b=='index'){ echo 'active'; }?>">
        <a class="nav-link" href="<?=site_url('admin/kisah/index');?>">
            <i class="fab fa-fw fa-youtube"></i>
            <span>List Kisah Baik</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profile Baik
    </div>

    <li class="nav-item <?php if($a=='profile' && $b=='index'){ echo 'active'; }?>">
        <a class="nav-link" href="<?=site_url('admin/profile/index');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Profile Baik</span>
        </a>
    </li>

    <li class="nav-item <?php if($a=='tentang' && $b=='index'){ echo 'active'; }?>">
        <a class="nav-link" href="<?=site_url('admin/tentang/index');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Tentang Kami</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Buku Tamu
    </div>

    <li class="nav-item <?php if($a=='hubungi' && $b=='index'){ echo 'active'; }?>">
        <a class="nav-link" href="<?=site_url('admin/hubungi/index');?>">
            <i class="fas fa-fw fa-table"></i>
            <span>List Buku Tamu</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Utility
    </div>

    <li class="nav-item <?php if($a=='user' && $b=='index'){ echo 'active'; }?>">
        <a class="nav-link" href="<?=site_url('admin/user/index');?>">
            <i class="fas fa-fw fa-users"></i>
            <span>User Management</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>