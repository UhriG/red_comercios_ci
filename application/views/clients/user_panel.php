 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Panel cliente</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?=base_url();?>">Inicio</a></li>
                         <li class="breadcrumb-item active">Panel cliente</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">

         <div class="container">
             <div class="row">
                 <div class="col">

                     <div class="card card-widget widget-user-2">
                         <!-- Add the bg color to the header using any of the bg-* classes -->
                         <div class="widget-user-header">

                             <div class="info-box shadow">
                                 <span class="info-box-icon bg-primary"><i class="far fa-user"></i></span>

                                 <div class="info-box-content">
                                     <span class="info-box-text"><strong><?= $data->nombre?>
                                             <?= $data->apellido?></strong></span>
                                     <span class="info-box-text">DNI: <?= $data->dni?></span>
                                 </div>
                                 <!-- /.info-box-content -->
                             </div>
                             <div class="info-box shadow">
                                 <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                                 <div class="info-box-content">
                                     <span class="info-box-text">Puntos</span>
                                     <span class="info-box-number"><?= $data->puntos?></span>
                                 </div>
                                 <!-- /.info-box-content -->
                             </div>
                         </div>
                         <div class="card-footer p-0">
                             <ul class="nav flex-column">
                                 <li class="nav-item">
                                     <a href="<?=base_url().'clients/remove_points/'.$data->dni?>"><button
                                             class="btn btn-block btn-primary">Canjear puntos</button></a>
                                 </li>
                                 <li class="nav-item">
                                     <button class="btn btn-block btn-success" data-toggle="modal"
                                         data-target="#modal-sm">Cargar puntos</button>
                                 </li>
                             </ul>
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

 <!--Modal Cargar puntos -->
 <div class="modal fade" id="modal-sm">
     <div class="modal-dialog modal-sm">
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Cargar puntos</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form action="<?=base_url('clients/load_points')?>" method="post">
                     <div class="form-group">
                         <input class="form-control" type="number" name="puntos" placeholder="Puntos" step="5" min="0"
                             max="100">
                     </div>
                     <input type="hidden" name="id" value="<?=$data->id ?>">
             </div>
             <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                 <button type="submit" class="btn btn-primary">Cargar</button>
             </div>
             </form>
         </div>
         <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->