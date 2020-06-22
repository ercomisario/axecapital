
<script>
  function buscarCliente(){
    tx_dni_cliente=$("#tx_dni_cliente_search").val();
    if(tx_dni_cliente.length==0){
       alert("Debe Agregar DNI Cliente a Buscar");
       $("#tx_dni_cliente_search").focus();
       return;
    }
      
    var parametros = {
                     "tx_dni_cliente" : tx_dni_cliente
              };
           
           $.ajax({
              type: "POST",
              url: '<?php echo base_url();?><?php echo CARPETA;?>ccitas/buscarCliente/',
              data: parametros,
              beforeSend: function(objeto){
                $("#datosTabla").html("Mensaje: Cargando...");
              },
              success: function(datos){
                $('#datosTabla').html(datos);
              }
          });
    


} 
function mostrarIngresar(){

    co_cliente=$("#co_cliente").val();
    if(co_cliente.length==0){
       alert("Debe Realizar Busqueda del Cliente");
       $("#tx_dni_cliente_search").focus();
       return;
    }
    $('#add').modal('show');  
    
    


} 

function ejecutarIngresar(){
     
    co_asesor=$("#co_asesor_add").val();
    fe_cita=$("#fe_cita_add").val();
    ho_cita=$("#ho_cita_add").val();
    co_cliente=$("#co_cliente").val();

    if(fe_cita.length==0){
       alert("Debe Agregar Fecha Cita");
       $("#fe_cita_add").focus();
       return;
    }
    if(ho_cita.length==0){
       alert("Debe Agregar Hora Cita");
       $("#ho_cita_add").focus();
       return;
    }
    if(co_asesor.length==0){
       alert("Debe Seleccionar Asesor");
       $("#co_asesor_add").focus();
       return;
    }
      
    var parametros = {
                     "co_cliente" : co_cliente,
                     "co_asesor" : co_asesor,
                     "fe_cita" : fe_cita,
                     "ho_cita" : ho_cita
              };
           
           $.ajax({
              type: "POST",
              url: '<?php echo base_url();?><?php echo CARPETA;?>ccitas/ingresar/',
              data: parametros,
              beforeSend: function(objeto){
                $("#datosTabla").html("Mensaje: Cargando...");
              },
              success: function(datos){
                $('#datosTabla').html(datos);
                
                $("#fe_cita_add").val('');
                $("#ho_cita_add").val('');
                $("#co_asesor_add").val('');
                $('#add').modal('hide');
              }
          });

   
}
</script>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <h2>Citas</h2>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="input-group">
                            <input type="text" id="tx_dni_cliente_search" name="tx_dni_cliente_search" class="form-control" placeholder="DNI Cliente">
                            <span class="input-group-btn">
                              <button class="btn btn-info" type="button" onclick="buscarCliente();"><i class="fa fa-search"></i> Ir</button>
                            </span>
                          </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                          <button type="button" class="btn btn-success"  onclick="mostrarIngresar();"><i class="fa fa-plus"></i> Nueva Cita</button>
                    </div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
              <!-- /seccion content -->    
                  <form class="form-horizontal form-label-left">
                    <div id="datosTabla">                                   
                     <!--/////////////////--> 
                     <input type="hidden" id="co_cliente" name="co_cliente" >
                     <!--/////////////////-->
                    </div>
                    </form>
               <!-- /seccion content -->

                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->
      
<!-- /modal crear -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal form-label-left">
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <label>Fecha de Cita</label>
              <div class='input-group date' id='myDatepicker2'>
                <input id="fe_cita_add" name="fe_cita_add" class="form-control has-feedback-left" type="text" aria-describedby="inputSuccess2Status">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>              
            </div>  
            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
              <label>Hora de Cita</label>
              <div id="myDatepicker3" class="input-group date">
                <input id="ho_cita_add" name="ho_cita_add"  class="form-control" type="text">
                <span class="input-group-addon" style="">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              <label>Asesor</label>
              <select class="form-control" id="co_asesor_add" name="co_asesor_add"  >
                 <option value="">Elija Asesor</option>
                  <?php 
                  if(isset($asesores) && $asesores!= FALSE) {
                  foreach ($asesores as $row) { 
                    ?> 
                      <option value="<?php echo $row->co_asesor;?>" ><?php echo $row->tx_asesor;?></option>
                  <?php  } }?>
                 </select>
            </div>

              

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="ejecutarIngresar();">Aceptar</button>
      </div>
    </div>
  </div>
</div>