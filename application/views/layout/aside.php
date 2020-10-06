 <!-- ASIDE -->
 <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <style>
                .sidebar-sticky{
                    position: -webkit-sticky;
                    position: sticky;
                    top: 78px;
                    height: calc(100vh - 78px);
                    padding-top: .5rem;
                    overflow-x: hidden;
                    overflow-y: auto;
                }
            </style>
            <div class="sidebar-sticky" style="margin-top: 1em;">
                <!-- FLASHDATA -->
                <?php if($dat = $this->session->flashdata('msg')): ?>
                    <div class="alert alert-primary" role="alert">
                        <?=$dat?>
                    </div>
                <?php endif; ?> 
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a href="<?=base_url('users')?>" class="nav-link <?= $this->uri->segment(2) == '' ? 'active' : ''; ?>"  data-toggle="pill">Dashboard</a>
                <a href="<?=base_url('users/info')?>" class="nav-link <?= $this->uri->segment(2) == 'info' ? 'active' : ''; ?>"  data-toggle="pill">Mi perfil</a>
                <a href="<?=base_url('users/list')?>" class="nav-link <?= $this->uri->segment(2) == 'list'  ? 'active' : ''; ?>" data-toggle="pill">Usuarios</a>
				<a href="<?=base_url('users/admin')?>" class="nav-link <?= $this->uri->segment(2) == 'admin'  ? 'active' : ''; ?>" data-toggle="pill">Admin</a>
                </div>
            </div>

        </nav>
