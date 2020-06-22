<script>
function enviar(){
     
   
    tx_usuario_ag=$("#tx_usuario_ag").val();
    tx_clave_ag=$("#tx_clave_ag").val();

    
   /* var parametros = {
                     "SiglasEmp" : tx_empresa,
                     "Usuario" : tx_usuario,
                     "Clave" : tx_clave
          };
       
       $.ajax({
          type: "POST",
          url: 'a_procesar_inicio_sesion.php',
          data: parametros
      });
*/
$("#form1").submit();
   
}
function enviarRegistro(){
     
   
    tx_usuario_ag=$("#tx_usuario_ag").val();
    tx_clave_ag=$("#tx_clave_ag").val();

    
   /* var parametros = {
                     "SiglasEmp" : tx_empresa,
                     "Usuario" : tx_usuario,
                     "Clave" : tx_clave
          };
       
       $.ajax({
          type: "POST",
          url: 'a_procesar_inicio_sesion.php',
          data: parametros
      });
*/
$("#form2").submit();
   
}
</script>
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
     <!-- Animate.css -->
    <link href="<?php echo base_url();?>css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>css/custom.min.css" rel="stylesheet">
  </head>
   
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
             <?php  
              if($respuesta!== FALSE && $respuesta==1) {
               ?>           
               <div class="separator">
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                        <a>AVISO DE REGISTRO DE LA EMPRESA!</a>
                      </h2>
                        <br><p class="excerpt">Tu solicitud fue enviada con éxito. En 48 horas le reponderemos después de revisar y confirmar sus datos… <br><br>
                          <button onclick="javascript:location='<?php echo base_url();?>';" id="registro" type="button" class="btn btn-success">Aceptar</button>
                
                        </p>
                    </div>
                  </div>
               </div>
              <?php 
               }elseif($respuesta==2){
             ?> 
              <div class="separator">
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                        <a>ERROR EN CREDENCIALES!</a>
                      </h2>
                        <br><p class="excerpt">Por favor verifique Usuario y Clave, <br>no coinsiden en la Base de Datos… <br>Si persiste, contacte a nuestro equipo de soporte… <br><br>
                          <button id="valida" type="button" class="btn btn-success" onclick="javascript:location='<?php echo base_url();?>';" >Aceptar</button>
                             
                        </p>
                    </div>
                  </div>
               </div>
               <?php 
               }else{
             ?> 
            <form action="<?php echo base_url();?><?php echo CARPETA;?>cingresar/fvalidar" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <h1>Verificar Acceso!</h1>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="tx_usuario_ag" id="tx_usuario_ag" placeholder="Usuario" data-validate-words="2" required="required">
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                  <input type="password" class="form-control has-feedback-left" name="tx_clave_ag" id="tx_clave_ag" placeholder="Clave" data-validate-words="2" required="required">
                  <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
              </div>
               
              <div>
              <!--  <a class="btn btn-default submit" href="javascript:enviar();">Ingresar</a>-->
                <button id="send" type="submit" class="btn btn-success">Ingresar</button>
                <a class="reset_pass" href="#">¡Olvidó Clave?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Nuevo en AxeCapital?
                  <a href="#signup" class="to_register"> Crear Cuenta </a>
                </p>

                <div class="clearfix"></div>
                <br />
                

                <div>
                  <h1><img src="<?php echo base_url();?>img/logoapp.png"> AxeCapital</h1>
                  <p>©2018 Derechos Reservados. AxeCapital</p>
                </div>
              </div>
             
            </form>
            <?php 
               }
             ?> 
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="<?php echo base_url();?>cingresar/fenviarRegistro" method="post" enctype="multipart/form-data" name="form2" id="form2">
             <h2 class="title">
                        <a>CREAR CUENTA!</a>
                      </h2>
                        <br><p class="excerpt">Por favor contacte al Administrador del Sistema, <br>para que le gestione su acceso<br><br><br>
                          <button id="valida" type="button" class="btn btn-success" onclick="javascript:location='<?php echo base_url();?>';" >Aceptar</button>
                             
                        </p>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Ya Tiene Cuenta?
                  <a href="#signin" class="to_register"> Ingresar </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="<?php echo base_url();?>img/logoapp.png"> AxeCapital</h1>
                  <p>©2018 Derechos Reservados. AxeCapital</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <!-- validator -->
    <script src="<?php echo base_url();?>js/validator.js"></script>
     <!-- Bootstrap -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>js/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>js/nprogress.js"></script>
  </body>  
</html>
