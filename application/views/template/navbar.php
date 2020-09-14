<?php
$menu = $this->session->userdata('menu');
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-rocket"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Pilkosis</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <?php if ($user['level'] == 1) { ?>
    <!-- Heading -->
    <div class="sidebar-heading">
      Administrator
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($menu == 'dashboard') ? ('active bg-success') : (''); ?>">
      <a class="nav-link" href="<?= site_url('/admin/Dashboard') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
  <?php } ?>

  <!-- Heading -->
  <div class="sidebar-heading">
    MENU
  </div>

  <?php if ($user['level'] == 1 && $user['role'] == 'A') { ?>
    <!-- Menu Kandidat -->
    <li class="nav-item <?= ($menu == 'pilkosis') ? ('active bg-success') : (''); ?>">
      <a class="nav-link" href="<?= site_url('/admin/Pilkosis'); ?>">
        <i class="fas fa-fw fa-paper-plane"></i>
        <span>Pilkosis</span></a>
    </li>
  <?php } ?>
  <?php if ($user['level'] == 1 && $user['role'] == 'A') { ?>
    <!-- Menu Kandidat -->
    <li class="nav-item <?= ($menu == 'kandidat') ? ('active bg-success menu-open') : (''); ?>">
      <a class="nav-link <?= ($menu == 'kandidat') ? ('') : ('collapsed'); ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Kandidat</span>
      </a>
      <div id="collapseUtilities" class="collapse <?= ($menu == 'kandidat') ? ('show') : (''); ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?= site_url('/admin/Kandidat/biodata'); ?>">Biodata Kandidat</a>
          <a class="collapse-item" href="<?= site_url('/admin/Kandidat') ?>">Data Kandidat</a>
        </div>
      </div>
    </li>
    <!-- Menu Data User -->
    <li class="nav-item <?= ($menu == 'data_user') ? ('active bg-success') : (''); ?>">
      <a class="nav-link" href="<?= site_url('/admin/Data_user') ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Data User</span></a>
    </li>
  <?php }
   elseif($user['level'] == 1 && $user['role'] == 'B'){ ?>
   <!-- Menu Kandidat -->
   <li class="nav-item <?= ($menu == 'kandidat') ? ('active bg-success menu-open') : (''); ?>">
      <a class="nav-link <?= ($menu == 'kandidat') ? ('') : ('collapsed'); ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Kandidat</span>
      </a>
      <div id="collapseUtilities" class="collapse <?= ($menu == 'kandidat') ? ('show') : (''); ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="<?= site_url('/admin/Kandidat/biodata'); ?>">Biodata Kandidat</a>
          <a class="collapse-item" href="<?= site_url('/admin/Kandidat') ?>">Data Kandidat</a>
        </div>
      </div>
    </li>
    <!-- Menu Data User -->
    <li class="nav-item <?= ($menu == 'data_user') ? ('active bg-success') : (''); ?>">
      <a class="nav-link" href="<?= site_url('/admin/Data_user') ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Data User</span></a>
    </li>
   <?php } ?>
  <?php if($user['level'] == 1 && $user['role'] == 'A'){ ?>
    <!-- Menu Data Pengguna -->
    <li class="nav-item">
      <a class="nav-link <?= ($menu == 'data_petugas') ? ('active bg-success') : (''); ?>" href="<?= site_url('/admin/Petugas') ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Data Petugas</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link <?= ($menu == 'data_chat') ? ('active bg-success') : (''); ?>" href="<?= site_url('/admin/Chat'); ?>">
        <i class="fab fa-fw fa-whatsapp"></i>
        <span>Chat</span></a>
    </li>
  <?php }elseif($user['level'] == 1 && $user['role'] == 'A'){ ?>
    <!-- Menu Data Pengguna -->
    <li class="nav-item">
      <a class="nav-link <?= ($menu == 'data_petugas') ? ('active bg-success') : (''); ?>" href="<?= site_url('/admin/Petugas') ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Data Petugas</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link <?= ($menu == 'data_chat') ? ('active bg-success') : (''); ?>" href="<?= site_url('/admin/Chat'); ?>">
        <i class="fab fa-fw fa-whatsapp"></i>
        <span>Chat</span></a>
    </li>
  <?php } ?>
  <?php if ($user['level'] != 1 && $user['level'] != 6) { ?>
    <!-- Menu Data Pengguna -->
    <li class="nav-item <?= ($menu == 'user_menu') ? ('active bg-success') : (''); ?>">
      <a class="nav-link" href="<?= site_url('/Dashboard'); ?>">
        <i class="fas fa-fw fa-home"></i>
        <span>Beranda</span></a>
    </li>
    <!-- Menu Data Panduan -->
    <li class="nav-item <?= ($menu == 'user_panduan') ? ('active bg-success') : (''); ?>">
      <a class="nav-link" href="<?= site_url('/Panduan_user'); ?>">
        <i class="fas fa-fw fa-book"></i>
        <span>Panduan Pilkosis</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      USER
    </div>
  <?php } ?>
  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('/Login/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
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