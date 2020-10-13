<?php 
	if($this->session->perfil != 'cliente'){
			
		redirect('dashboard','refresh');
		
	}
		$id = $this->session->id;
		$query = $this->db->get_where('clientes', array('id_usuario' => $id), 1);
		$usuario = $query->row();	
		
	
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perfil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Inicio</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">

            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid"
                                            src="<?=base_url('')?>assets/dist/img/qr/qr_dni_<?=$usuario->dni?>.png"
                                            alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?=$usuario->nombre?>
                                        <?=$usuario->apellido?></h3>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Teléfono: </b> <a class="float-right"><?=$usuario->telefono?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Puntos</b> <a class="float-right"><?=$usuario->puntos?></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
