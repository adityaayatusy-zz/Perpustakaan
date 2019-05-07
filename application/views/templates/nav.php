
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>assets/img/pp.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nama') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= ($menu == 'home' ?'active' : ''); ?>">
          <a href="<?= base_url() ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?= ($menu == 'anggota' || $menu == 'petugas' ?'active' : ''); ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($menu == 'anggota' ?'active' : ''); ?>"><a href="<?= base_url() ?>admin/anggota"><i class="fa fa-circle-o"></i>Anggota</a></li>
            <li class="<?= ($menu == 'petugas' ?'active' : ''); ?>"><a href="<?= base_url() ?>admin/petugas"><i class="fa fa-circle-o"></i>Petugas</a></li>
          </ul>
        </li>
        <li class="<?= ($menu == 'buku' ?'active' : ''); ?>">
          <a href="<?= base_url() ?>admin/buku">
            <i class="fa fa-book"></i> <span>Buku</span>
          </a>
        </li>
        <li class="<?= ($menu == 'pinjam' ?'active' : ''); ?>">
          <a href="<?= base_url() ?>admin/pinjam">
            <i class="fa fa-money"></i> <span>Pinjam</span>
          </a>
        </li>
        <li class="">
          <a href="<?= base_url() ?>admin/logout">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
