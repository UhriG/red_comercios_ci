<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link">
      <img src="<?= base_url()."assets/"; ?>dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url()."assets/"; ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $this->session->nombre ?> <?php echo $this->session->apellido ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>" class="nav-link <?= $this->uri->segment(2) == '' ? 'active' : ''; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>   
			  <li class="nav-item">
                <a href="<?=base_url('users/info')?>" class="nav-link <?= $this->uri->segment(2) == 'info' ? 'active' : ''; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perfil</p>
                </a>
              </li> 
			  <li class="nav-item">
                <a href="<?=base_url('users/list')?>" class="nav-link <?= $this->uri->segment(2) == 'list'  ? 'active' : ''; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li> 
			  <li class="nav-item">
                <a href="<?=base_url('users/admin')?>" class="nav-link <?= $this->uri->segment(2) == 'admin'  ? 'active' : ''; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>           
            </ul>
          </li>          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
