<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Alta de usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>">Inicio</a></li>
                        <li class="breadcrumb-item active">Alta de usuarios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-body">

                <?= form_open('users/store',array('method'=>'POST'));?>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?=set_value('nombre');?>"
                            placeholder="Nombre">
                        <div class="text-danger">
                            <?=form_error('nombre')?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Apellido</label>
                        <input type="text" class="form-control" name="apellido" value="<?=set_value('apellido');?>"
                            placeholder="Apellido">
                        <div class="text-danger">
                            <?=form_error('apellido')?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">DNI</label>
                        <input type="text" class="form-control" name="dni" value="<?=set_value('dni');?>"
                            placeholder="Dni">
                        <div class="text-danger">
                            <?=form_error('dni')?>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Teléfono</label>
                        <input type="tel" class="form-control" name="telefono" value="<?=set_value('telefono');?>"
                            placeholder="Teléfono">
                        <div class="text-danger">
                            <?=form_error('telefono')?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="<?=set_value('email');?>"
                            placeholder="Email">
                        <div class="text-danger">
                            <?=form_error('email')?>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Perfil</label>
                        <select name="perfil" class="form-control">
                            <option value="cliente">Cliente</option>
                            <option value="comercio">Comercio</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Registrar usuario</button>
                </form>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>






<!-- /.content-wrapper -->
