 <!-- BARRA DE NAVEGACION 
 <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" style="background-color: #e3f2fd;">
        <span class="navbar-text navbar-brand">
            Sistema de red de comercios.
        </span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav">                
                <li class="nav-item ">
                    <a class="nav-link disabled" href="#"><strong>Nombre:</strong> <?php echo $this->session->nombre ?> <?php echo $this->session->apellido ?></a>
                </li>
                <li class="nav-item" style="margin-left: 2em;">
                    <!-- <button class="btn btn-warning" type="submit" id="logout">Cerrar Sesión</button> 
                    <a href="<?=base_url('login/logout')?>" class="btn btn-warning">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>-->

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url()?>"" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('login/logout')?>"" class="nav-link">Cerrar sesión</a>
      </li>
    </ul>    

  </nav>
  <!-- /.navbar -->
