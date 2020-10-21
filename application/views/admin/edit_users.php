<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=base_url();?>">Inicio</a></li>
                        <li class="breadcrumb-item active">Editar usuario</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?=print_r($user)?>
        <!-- Datos de la cuenta -->
        <h4>Datos de la cuenta</h4>
        <div class="card">
            <div class="card-body">
                <form action="<?=base_url('users/update')?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="">Perfil</label>
                            <input type="text" class="form-control" name="perfil"
                                value="<?= set_value('perfil', isset($user['perfil']) ? $user['perfil'] : '')?>"
                                readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Estado</label>
                            <input type="text" class="form-control" name="estado"
                                value="<?= set_value('estado', isset($user['estado']) ? $user['estado'] : '')?>"
                                readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email"
                                value="<?= set_value('email', isset($user['email']) ? $user['email'] : '')?>" readonly>
                            <?= form_error('email', '<p class="text-danger">','</p>') ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">DNI</label>
                            <input type="text" class="form-control" name="dni"
                                value="<?= set_value('dni', isset($user['dni']) ? $user['dni'] : '')?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" name="nombre"
                                value="<?= set_value('nombre', isset($user['nombre']) ? $user['nombre'] : '')?>">
                            <?= form_error('nombre', '<p class="text-danger">','</p>') ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Apellido</label>
                            <input type="text" class="form-control" name="apellido"
                                value="<?= set_value('apellido', isset($user['apellido']) ? $user['apellido'] : '')?>">
                            <?= form_error('apellido', '<p class="text-danger">','</p>') ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Teléfono</label>
                            <input type="tel" class="form-control" name="telefono"
                                value="<?= set_value('telefono', isset($user['telefono']) ? $user['telefono'] : '')?>">
                            <?= form_error('telefono', '<p class="text-danger">','</p>') ?>
                        </div>
                        <input type="hidden" class="form-control" name="id"
                            value="<?= set_value('id', isset($user['id']) ? $user['id'] : '')?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>






<!-- /.content-wrapper -->