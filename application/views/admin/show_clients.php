<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <table id="dataTableUsers" class="table table-striped table-bordered dt-responsive nowrap"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:5%;">ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th style="width:5%;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $item):?>
                        <tr>
                            <th><?= $item->id ?></th>
                            <td><?= $item->nombre ?></td>
                            <td><?= $item->apellido?></td>
                            <td><?= $item->email ?></td>
                            <td><?= $item->estado == 1 ? 'Activado' : 'Desactivado'?></td>
                            <td>
                                <div class="btn-group float-right">
                                    <a href="<?=base_url('users/editClient/'.$item->id)?>"><button type="button"
                                            class="btn btn-warning"><i class="fas fa-user-edit"></i></button></a>
                                    <a href=""><button type="button" class="btn btn-danger"><i
                                                class="fas fa-trash-alt"></i></button></a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->