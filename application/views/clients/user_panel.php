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

         <!-- Default box -->
         <div class="card">

             <div class="card-body">
                 <div class="card">
                     <div class="card-body register-card-body">
                         <p class="login-box-msg">Buscar cliente</p>
                         <?php echo validation_errors(); ?>

                         <?= form_open('clients/panel',array('method'=>'POST'));?>
                         <div class="input-group mb-3">
                             <input type="text" name="dni" value="" class="form-control" placeholder="DNI">
                             <div class="input-group-append">
                                 <div class="input-group-text">
                                     <span class="fas fa-card"></span>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <!-- /.col -->
                             <div class="col-6">
                                 <button type="submit" name="submit" value=""
                                     class="btn btn-primary btn-block">Registrarme</button>
                             </div>
                             <!-- /.col -->
                         </div>
                         </form>

                     </div>
                     <?php print_r($data) ?>
                     <!-- /.form-box -->
                 </div><!-- /.card -->
             </div>
             <!-- /.card-body -->

         </div>
         <!-- /.card -->

     </section>
     <!-- /.content -->

 </div>
 <!-- /.content-wrapper -->
