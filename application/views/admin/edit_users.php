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

        <!-- Datos de la cuenta -->
        <h4>Datos de la cuenta</h4>
        <div class="card">
            <div class="card-body">
                <form action="<?=base_url('users/update')?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Perfil</label>
                            <input type="text" class="form-control" name="perfil" value="<?=$user['nombre']?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Estado</label>
                            <input type="text" class="form-control" name="perfil" value="<?=$user['apellido']?>"
                                disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="dni" value="<?=$user['email']?>" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Perfil</label>
                            <input type="text" class="form-control" name="perfil" value="<?=$user['perfil']?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Estado</label>
                            <input type="text" class="form-control" name="perfil" value="<?=$user['estado']?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="dni" value="<?=$user['email']?>" disabled>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->