  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dashboard'); ?>" class="brand-link navbar-navy">
      <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Endeavour Tech.</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>assets/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          
          <li class="nav-header">User Management</li>
            <li class="nav-item">
              <a href="<?php echo base_url('user_list'); ?>" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Users</p>
              </a>
            </li>

          <li class="nav-header">Payment Management</li>
            <li class="nav-item">
              <a href="<?php echo base_url('staff_list'); ?>" class="nav-link">
                <i class="fas fa-file-invoice nav-icon"></i>
                <p>Payments</p>
              </a>
            </li>

          <li class="nav-header">Asset Settings</li>

            <li class="nav-item">
              <a href="<?php echo base_url('internet_list'); ?>" class="nav-link">
                <i class="fas fa-wifi nav-icon"></i>
                <p>Internet Plan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('voip_list'); ?>" class="nav-link">
                <i class="fas fa-phone-alt nav-icon"></i>
                <p>VoIP Plan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('package_list'); ?>" class="nav-link">
                <i class="fas fa-tv nav-icon"></i>
                <p>Cable Package</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('stb_list'); ?>" class="nav-link">
                <i class="fas fa-hdd nav-icon"></i>
                <p>Set-Top Box</p>
              </a>
            </li>

          <li class="nav-header">Administration Settings</li>

            <li class="nav-item">
              <a href="<?php echo base_url('area_list'); ?>" class="nav-link">
                <i class="fas fa-building nav-icon"></i>
                <p>Area</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('branch_list'); ?>" class="nav-link">
                <i class="fas fa-store-alt nav-icon"></i>
                <p>Branch</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url('staff_list'); ?>" class="nav-link">
                <i class="fas fa-user-cog nav-icon"></i>
                <p>Staff Settings</p>
              </a>
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->