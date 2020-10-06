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
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
				<h1>Tabla de lista de usuarios</h1>

					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Nombre</th>
								<th scope="col">Apellido</th>
								<th scope="col">DNI</th>
							<th scope="col">Teléfono</th>
							<th scope="col">Puntos</th>
							<th scope="col">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $item):?>
							<tr>
								<th scope="row"><?= $item->id ?></th>
								<td><?= $item->nombre ?></td>
								<td><?= $item->apellido?></td>
								<td><?= $item->dni ?></td>
								<td><?= $item->telefono ?></td>
								<td><?= $item->puntos ?></td>
								<td>acciones</td>
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
	
