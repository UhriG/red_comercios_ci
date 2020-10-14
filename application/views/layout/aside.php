<?php 
	$id = $this->session->id;
	$query = $this->db->get_where('usuarios', array('id' => $id), 1);
	$usuario = $query->row();
	//print_r($usuario);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?= base_url()."assets/"; ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Donde Compra</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url()."assets/"; ?>/dist/img/user-profile.png" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="<?=base_url('users/info')?>" class="d-block"> <?=$usuario->nombre?>
                    <?=$usuario->apellido?>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?=base_url()?>"
                        class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : ''; ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Escritorio</p>
                    </a>
                </li>
                <?php if($usuario->perfil == 'cliente'):?>
                <li class="nav-item">
                    <a href="<?=base_url('clients/profile')?>"
                        class="nav-link <?= $this->uri->segment(2) == 'profile' ? 'active' : ''; ?>" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Perfil</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if($usuario->perfil == 'comercio'):?>
                <li class="nav-item">
                    <a href="<?=base_url('clients')?>"
                        class="nav-link <?= $this->uri->segment(1) == 'clients' ? 'active' : ''; ?>" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Comercio</p>
                    </a>
                </li>
                <?php endif; ?>
                <?php if($usuario->perfil == 'admin'):?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?= $this->uri->segment(1) == 'users'  ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="<?=base_url('users')?>"
                                class="nav-link <?= $this->uri->segment(1) == 'users' && $this->uri->segment(2) == '' ? 'active' : ''; ?>"
                                class="nav-link">
                                <i class="fas fa-tachometer-alt nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('users/create')?>"
                                class="nav-link <?= $this->uri->segment(2) == 'create'  ? 'active' : ''; ?>"
                                class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Crear usuario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('users/list_clients')?>"
                                class="nav-link <?= $this->uri->segment(2) == 'list_clients'  ? 'active' : ''; ?>"
                                class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Clientes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('users/list_commerce')?>"
                                class="nav-link <?= $this->uri->segment(2) == 'list_commerce'  ? 'active' : ''; ?>"
                                class="nav-link">
                                <i class="fas fa-store nav-icon"></i>
                                <p>Comercios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('users/list_admins')?>"
                                class="nav-link <?= $this->uri->segment(2) == 'list_admins'  ? 'active' : ''; ?>"
                                class="nav-link">
                                <i class="fas fa-users-cog nav-icon"></i>
                                <p>Administradores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('users/list_movements')?>"
                                class="nav-link <?= $this->uri->segment(2) == 'list_movements'  ? 'active' : ''; ?>"
                                class="nav-link">
                                <i class="fas fa-exchange-alt nav-icon"></i>
                                <p>Movimientos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?=base_url('login/logout')?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Cerrar sesión</p>
                    </a>
                </li>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- 
 /.sidebar -->
</aside>