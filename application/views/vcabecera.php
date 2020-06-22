<?php 
$dataSession=$this->session->userdata('usuario_ag');
if(!$dataSession){
       redirect('cingresar/fcerrarSesion');
}
   
$co_usuario_session=$dataSession['co_usuario_session'];
$tx_usuario_session=$dataSession['tx_usuario_session'];
$tx_nombre_session=$dataSession['tx_nombre_session'];
$co_permisologia_session=$dataSession['co_permisologia_session'];
$tx_permisologia_session=$dataSession['tx_permisologia_session'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url();?>img/favicon.ico" type="image/ico" />

    <title>.:AxeCapital:.</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>css/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url();?>css/daterangepicker.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="<?php echo base_url();?>css/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- iCheck -->
    <link href="<?php echo base_url();?>css/_all.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?><?php echo CARPETA;?>cprincipal" class="site_title">
                <img src="<?php echo base_url();?>img/logoapp.png"> <span>AxeCapital</span></a>
            </div>


            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>BIENVENIDO</span>
                <h2><?php echo $tx_usuario_session;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Sistema</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url();?><?php echo CARPETA;?>ccalendario"><i class="fa fa-home"></i> Principal</a>                   
                  </li>
                  <li><a><i class="fa fa-calendar "></i> Citas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?><?php echo CARPETA;?>ccitas">Registrar Cita</a></li>
                      <li><a href="<?php echo base_url();?><?php echo CARPETA;?>ccalendario">Calendario</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-group "></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?><?php echo CARPETA;?>cclientes">Registrar Cliente</a></li>
                      <li><a href="#">Registrar Asesor</a></li>
                    </ul>
                  </li>
               </ul>
              </div>
              <div class="menu_section">
                <h3>Administración</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-wrench"></i> Configuración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?><?php echo CARPETA;?>cclientes">Empresas</a></li>
                   </ul>
                  </li>
                  <li><a><i class="fa fa-key"></i> Acceso <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Usuarios</a></li>
                    </ul>
                  </li>                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Salir" href="<?php echo base_url();?>cingresar/fcerrarSesion">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              

              <ul class="nav navbar-nav navbar-right">

                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>img/11632453.jpg" alt=""><?php echo $tx_nombre_session;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="<?php echo base_url();?><?php echo CARPETA;?>cingresar/fcerrarSesion"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>               
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->  