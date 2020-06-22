
<script>
  function mostrarDetalles(co_cliente){
      
    var parametros = {
                     "co_cliente" : co_cliente
              };
           
           $.ajax({
              type: "POST",
              dataType: "JSON",
              url: '<?php echo base_url();?><?php echo CARPETA;?>cclientes/buscar/',
              data: parametros,
              success: function(datos){                 

                 $("#tx_nombre_det").html(datos.tx_nombre);
                 $("#tx_dni_cliente_det").html(datos.tx_dni_cliente);
                 $("#tx_direccion_det").html(datos.tx_direccion);
                 $("#tx_telefono_det").html(datos.tx_telefono);
                 $("#tx_hijos_det").html(datos.tx_hijos);
                 $("#tx_referencia_det").html(datos.tx_referencia);
                 $("#nu_edad_det").html(datos.nu_edad);
                 $("#tx_email_det").html(datos.tx_email);
                 $("#tx_trabajo_det").html(datos.tx_trabajo);
                 $("#tx_hipoteca_det").html(datos.tx_hipoteca);
                 $("#tx_vehiculo_det").html(datos.tx_vehiculo);
                 $("#tx_sbs_det").html(datos.tx_sbs);
                 $("#va_sueldo_det").html(datos.va_sueldo);
                 $("#va_linea_tc_det").html(datos.va_linea_tc);
                 $('#det').modal('show');
              }
          });
    


} 
function mostrarEditar(co_cliente){
      
    var parametros = {
                     "co_cliente" : co_cliente
              };
           
           $.ajax({
              type: "POST",
              dataType: "JSON",
              url: '<?php echo base_url();?><?php echo CARPETA;?>cclientes/buscar/',
              data: parametros,
              success: function(datos){                 

                 $("#co_cliente_upd").val(co_cliente);
                 $("#tx_nombre_upd").val(datos.tx_nombre);
                 $("#tx_dni_cliente_upd").val(datos.tx_dni_cliente);
                 $("#tx_direccion_upd").val(datos.tx_direccion);
                 $("#tx_telefono_upd").val(datos.tx_telefono);
                 $("#tx_hijos_upd").val(datos.tx_hijos);
                 $("#tx_referencia_upd").val(datos.tx_referencia);
                 $("#nu_edad_upd").val(datos.nu_edad);
                 $("#tx_email_upd").val(datos.tx_email);
                 $("#tx_trabajo_upd").val(datos.tx_trabajo);
                 $("#tx_hipoteca_upd").val(datos.tx_hipoteca);
                 $("#tx_vehiculo_upd").val(datos.tx_vehiculo);
                 $("#tx_sbs_upd").val(datos.tx_sbs);
                 $("#va_sueldo_upd").val(datos.va_sueldo);
                 $("#va_linea_tc_upd").val(datos.va_linea_tc);
                 $('#upd').modal('show');
              }
          });
    


}

function ejecutarEditar(){
   
    co_cliente=$("#co_cliente_upd").val();
    tx_nombre=$("#tx_nombre_upd").val();
    tx_dni_cliente=$("#tx_dni_cliente_upd").val();
    tx_direccion=$("#tx_direccion_upd").val();
    tx_telefono=$("#tx_telefono_upd").val();
    tx_hijos=$("#tx_hijos_upd").val();
    tx_referencia=$("#tx_referencia_upd").val();
    nu_edad=$("#nu_edad_upd").val();
    tx_email=$("#tx_email_upd").val();
    tx_trabajo=$("#tx_trabajo_upd").val();
    tx_hipoteca=$("#tx_hipoteca_upd").val();
    tx_vehiculo=$("#tx_vehiculo_upd").val();
    tx_sbs=$("#tx_sbs_upd").val();
    va_sueldo=$("#va_sueldo_upd").val();
    va_linea_tc=$("#va_linea_tc_upd").val();
    
    if(tx_nombre.length==0){
    
      document.getElementById("tx_nombre_upd").focus();
      return;
    }
    if(tx_dni_cliente.length==0){
    
     document.getElementById("tx_dni_cliente_upd").focus();
      return;
    }
    var parametros = {
                     "co_cliente" : co_cliente,
                     "tx_nombre" : tx_nombre,
                     "tx_dni_cliente" : tx_dni_cliente,
                     "tx_direccion" : tx_direccion,
                     "tx_telefono" : tx_telefono,
                     "tx_hijos" : tx_hijos,
                     "tx_referencia" : tx_referencia,
                     "nu_edad" : nu_edad,
                     "va_sueldo" : va_sueldo,
                     "tx_email" : tx_email,
                     "tx_trabajo" : tx_trabajo,
                     "tx_hipoteca" : tx_hipoteca,
                     "tx_sbs" : tx_sbs,
                     "va_linea_tc" : va_linea_tc,
                     "tx_vehiculo" : tx_vehiculo
              };
       $.ajax({
          type: "POST",
          url: '<?php echo base_url();?><?php echo CARPETA;?>cclientes/actualizar/',
          data: parametros,
          beforeSend: function(objeto){
            $("#myTabla tbody").html("Mensaje: Cargando...");
          },
          success: function(datos){
              $('#myTabla tbody').html(datos);
              $('#upd').modal('hide');
          }
      });
   
}

function ejecutarIngresar(){
     
    tx_nombre=$("#tx_nombre_add").val();
    tx_dni_cliente=$("#tx_dni_cliente_add").val();
    tx_direccion=$("#tx_direccion_add").val();
    tx_telefono=$("#tx_telefono_add").val();
    tx_referencia=$("#tx_referencia_add").val();
    nu_edad=$("#nu_edad_add").val();
    tx_email=$("#tx_email_add").val();
    tx_trabajo=$("#tx_trabajo_add").val();
    tx_hipoteca=$("#tx_hipoteca_add").val();
    tx_vehiculo=$("#tx_vehiculo_add").val();
    co_sbs=$("#co_sbs_add").val();
    va_sueldo=$("#va_sueldo_add").val();
    va_linea_tc=$("#va_linea_tc_add").val();

    if(tx_nombre.length==0){
       alert("Debe Agregar Nombre Cliente");
       $("#tx_nombre_add").focus();
       return;
    }
    if(tx_dni_cliente.length==0){
       alert("Debe Agregar DNI");
       $("#tx_dni_cliente_add").focus();
       return;
    }
    if(co_sbs.length==0){
       alert("Debe Seleccionar SBS");
       $("#co_sbs_add").focus();
       return;
    }
      
    for(i=1;i<=nextinput;++i)
    {
      if ($("#nu_edad_hijo_add"+i).length){
        if ($("#nu_edad_hijo_add"+i).length==0){
           alert("Debe Agregar Edad del Hijo");
           $("#nu_edad_hijo_add"+i).focus();
           return;
        }

      }

    }  

    var parametros = {
                     "tx_nombre" : tx_nombre,
                     "tx_dni_cliente" : tx_dni_cliente,
                     "tx_direccion" : tx_direccion,
                     "tx_telefono" : tx_telefono,
                     "tx_referencia" : tx_referencia,
                     "nu_edad" : nu_edad,
                     "va_sueldo" : va_sueldo,
                     "tx_email" : tx_email,
                     "tx_trabajo" : tx_trabajo,
                     "tx_hipoteca" : tx_hipoteca,
                     "co_sbs" : co_sbs,
                     "va_linea_tc" : va_linea_tc,
                     "tx_vehiculo" : tx_vehiculo
              };
           
           $.ajax({
              type: "POST",
              url: '<?php echo base_url();?><?php echo CARPETA;?>cclientes/ingresar/',
              data: parametros,
              beforeSend: function(objeto){
                $("#myTabla tbody").html("Mensaje: Cargando...");
              },
              success: function(datos){        



                for(i=1;i<=nextinput;++i)
                {
                    nu_edad_hijo_add=$("#nu_edad_hijo_add"+i).val();
                    co_sexo_add=$("#co_sexo_add"+i).val();
                    var parametrosHijo = {
                         "tx_dni_cliente" : tx_dni_cliente,
                         "nu_edad_hijo_add" : nu_edad_hijo_add,
                         "co_sexo_add" : co_sexo_add
                        };
                     
                     $.ajax({
                        type: "POST",
                        url: '<?php echo base_url();?><?php echo CARPETA;?>cclientes/ingresarHijo/',
                        data: parametrosHijo
                    });           
                }

                 $('#myTabla tbody').html(datos);
                 $("#tx_nombre_add").val('');
                 $("#tx_dni_cliente_add").val('');
                 $("#tx_direccion_add").val('');
                 $("#tx_telefono_add").val('');
                 $("#tx_referencia_add").val('');
                 $("#nu_edad_add").val('');
                 $("#tx_email_add").val('');
                 $("#tx_trabajo_add").val('');
                 $("#tx_hipoteca_add").val('');
                 $("#tx_vehiculo_add").val('');
                 $("#co_sbs_add").val('');
                 $("#va_sueldo_add").val('');
                 $("#va_linea_tc_add").val('');
                 $('#add').modal('hide');
              }
          });   
         
}

function mostrarHijos(valor){
  if(valor==1){
      $('#btn_agregar_campos').hide();

      for(i=1;i<=nextinput;++i)
      {
        $("#div_hijo_add"+i).remove(); 
      }
    

    }
  if(valor==2)
      $('#btn_agregar_campos').show();

}
</script>
<script type="text/javascript">
  var nextinput = 0;
  function agregarCampos(){
  nextinput++;
  campo = '<div id="div_hijo_add'+nextinput+'" class="col-md-12 col-sm-12 col-xs-12">';
  campo += '<label id="lbl_nu_edad_hijo_add'+nextinput+'" class="control-label col-md-2 col-sm-2 col-xs-12" for="nu_edad_hijo_add'+nextinput+'">Edad</label>';
  campo += '<div id="div_nu_edad_hijo_add'+nextinput+'" class="col-md-3 col-sm-3 col-xs-12">';
  campo += '  <input type="text" id="nu_edad_hijo_add'+nextinput+'" name="nu_edad_hijo_add'+nextinput+'" class="form-control col-md-3 col-sm-3 col-xs-12">';
  campo += '</div>';
  campo += '<label id="lbl_co_sexo_add'+nextinput+'" class="control-label col-md-2 col-sm-2 col-xs-12" for="co_sexo_add">Sexo</label>';
  campo += '<div id="div_co_sexo_add'+nextinput+'" class="col-md-3 col-sm-3 col-xs-12">';
  campo += '  <select class="form-control" id="co_sexo_add'+nextinput+'" name="co_sexo_add'+nextinput+'"  >';
  campo += '    <option value="1">M</option>';
  campo += '    <option value="2">F</option>';
  campo += '  </select>';
  campo += '</div>';
  campo += '<div id="btn_eliminar'+nextinput+'" class="col-md-2 col-sm-2 col-xs-2">';
  campo += '  <button type="button" class="btn btn-danger btn-xs" onclick="eliminarCampos('+nextinput+');" ><i class="fa fa-eraser"></i></button><br>';
  campo += '</div>';
  campo += '</div>';
  //campo = '<li id="rut'+nextinput+'">Campo:<input type="text" size="20" id="campo' + nextinput + '"&nbsp; name="campo' + nextinput + '"&nbsp; /></li>';
  $("#campos").append(campo);
  }
  function eliminarCampos(valor){
  $("#div_hijo_add"+valor).remove(); 
  }
   
</script>


        <!-- page content -->
        <div class="right_col" role="main">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="col-md-3 col-sm-3 col-xs-12">                    
                      <h2>Clientes</h2>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Crear Cliente</button>
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
                        <div class="table-responsive">
                            <table id="myTabla" class="table table-striped jambo_table">
                              <thead>
                                <tr>
                                  <th class="column-title">#</th>
                                  <th class="column-title">Nombre</th>
                                  <th class="column-title">DNI</th>
                                  <th class="column-title">Dirección</th>
                                  <th class="column-title">Teléfono</th>
                                  <th class="column-title">Email</th>
                                  <th class="column-title">Detalles</th>
                                  <th class="column-title">Editar</th>
                                  <th class="column-title">Eliminar</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $i=-1; 
                                $total=0;
                                if(isset($clientes) && $clientes!= FALSE) {
                                        foreach ($clientes as $row) {   ?> 
                                          <tr>
                                            <th scope="row"><?php echo $row->co_cliente;?></th>
                                            <td><?php echo $row->tx_nombre;?></td>
                                            <td><?php echo $row->tx_dni_cliente;?></td>
                                            <td><?php echo $row->tx_direccion;?></td>
                                            <td><?php echo $row->tx_telefono;?></td>
                                            <td><?php echo $row->tx_email;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-xs" onclick="mostrarDetalles(<?php echo $row->co_cliente;?>);"><i class="fa fa-file-text"></i></button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-xs" onclick="mostrarEditar(<?php echo $row->co_cliente;?>);"><i class="fa fa-edit"></i></button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del"><i class="fa fa-trash"></i></button>
                                            </td>
                                          </tr>
                               <?php  } }?>
                              </tbody>
                            </table>                          
                      </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Crear Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_nombre_add">Nombre</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="tx_nombre_add" name="tx_nombre_add" class="form-control col-md-4 col-sm-4 col-xs-12" placeholder="Nombre">
              </div>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_dni_cliente_add">DNI</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="tx_dni_cliente_add" name="tx_dni_cliente_add" class="form-control" placeholder="DNI">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_direccion_add">Dirección</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" id="tx_direccion_add" name="tx_direccion_add" class="form-control" placeholder="Dirección">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_direccion_add">Referencia</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" id="tx_referencia_add" name="tx_referencia_add" class="form-control" placeholder="Referencia">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_telefono_add">Teléfono</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="tx_telefono_add" name="tx_telefono_add" class="form-control" placeholder="Teléfono">
              </div>      
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nu_edad_add">Edad</label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" id="nu_edad_add" name="nu_edad_add" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_hipoteca_add">Hipoteca</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="tx_hipoteca_add" name="tx_hipoteca_add" class="form-control" placeholder="Hipoteca">
              </div>
               <label class="control-label col-md-2 col-sm-2 col-xs-12" for="co_sbs_add">SBS</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <select class="form-control" id="co_sbs_add" name="co_sbs_add"  >
                 <option value="">Elija SBS</option>
                  <?php 
                  if(isset($sbs) && $sbs!= FALSE) {
                  foreach ($sbs as $row) { 
                    ?> 
                      <option value="<?php echo $row->co_sbs;?>" ><?php echo $row->tx_sbs;?></option>
                  <?php  } }?>
                 </select>
              </div>
              
            </div>         

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_trabajo_add">Trabajo</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" id="tx_trabajo_add" name="tx_trabajo_add" class="form-control" placeholder="Trabajo">
              </div>
            </div>          
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="va_sueldo_add">Sueldo</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="va_sueldo_add" name="va_sueldo_add" class="form-control" placeholder="Sueldo">
              </div>
            
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="va_linea_tc_add">Línea TC</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="va_linea_tc_add" name="va_linea_tc_add" class="form-control" placeholder="Línea TC">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_vehiculo_add">Vehículo</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" id="tx_vehiculo_add" name="tx_vehiculo_add" class="form-control" placeholder="Vehículo">
              </div>
            </div>

            
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_email_add">Email</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="tx_email_add" name="tx_email_add" class="form-control" placeholder="Email">
              </div>

            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="co_hijos_add">Hijos</label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <select class="form-control" id="co_hijos_add" name="co_hijos_add" onChange="javascript:mostrarHijos(this[selectedIndex].value);" >
                    <option value="">Elija</option>
                    <option value="1">NO</option>
                    <option value="2">SI</option>
                 </select>
              </div>
              <div class="col-md-1 col-sm-1 col-xs-1">
                    <button  id="btn_agregar_campos" type="button" class="btn btn-success btn-xs" onclick="agregarCampos();" ><i class="fa fa-plus"></i></button>
              </div>
              <div id="campos" class="col-md-7 col-sm-7 col-xs-12">
              </div>  
            
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
<!-- /modal editarr -->
<div class="modal fade" id="upd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_nombre_upd">Nombre</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="hidden" id="co_cliente_upd" name="co_cliente_upd">
                <input type="text" id="tx_nombre_upd" name="tx_nombre_upd" class="form-control col-md-4 col-sm-4 col-xs-12">
              </div>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_dni_cliente_upd">DNI</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="tx_dni_cliente_upd" name="tx_dni_cliente_upd" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_direccion_upd">Dirección</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" id="tx_direccion_upd" name="tx_direccion_upd" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_referencia_upd">Referencia</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" id="tx_referencia_upd" name="tx_referencia_upd" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_telefono_upd">Teléfono</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="tx_telefono_upd" name="tx_telefono_upd" class="form-control">
              </div>
            
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_hijos_upd">Hijos</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="tx_hijos_upd" name="tx_hijos_upd" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_hipoteca_upd">Hipoteca</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="tx_hipoteca_upd" name="tx_hipoteca_upd" class="form-control">
              </div>
            
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_sbs_upd">SBS</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="tx_sbs_upd" name="tx_sbs_upd" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="va_sueldo_upd">Sueldo</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="va_sueldo_upd" name="va_sueldo_upd" class="form-control">
              </div>
            
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="va_linea_tc_upd">Línea TC</label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <input type="text" id="va_linea_tc_upd" name="va_linea_tc_upd" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_vehiculo_add">Vehículo</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" id="tx_vehiculo_upd" name="tx_vehiculo_upd" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_trabajo_upd">Trabajo</label>
              <div class="col-md-10 col-sm-10 col-xs-12">
                <input type="text" id="tx_trabajo_upd" name="tx_trabajo_upd" class="form-control">
              </div>
            </div>          
            
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_email_upd">Email</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="tx_email_upd" name="tx_email_upd" class="form-control">
              </div>
            
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nu_edad_upd">Edad</label>
              <div class="col-md-2 col-sm-2 col-xs-12">
                <input type="text" id="nu_edad_upd" name="nu_edad_upd" class="form-control">
              </div>
            </div>  

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="ejecutarEditar();">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<!-- /modal detalles -->
<div class="modal fade" id="det" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_nombre_det">Nombre</label>
              <div class="col-md-4 col-sm-4 col-xs-12" id="tx_nombre_det">
              </div>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_dni_cliente_det">DNI</label>
              <div class="col-md-4 col-sm-4 col-xs-12" id="tx_dni_cliente_det">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_direccion_det">Dirección</label>
              <div class="col-md-10 col-sm-10 col-xs-12" id="tx_direccion_det">
              </div>              
            </div>
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_referencia_det">Referencia</label>
              <div class="col-md-10 col-sm-10 col-xs-12" id="tx_referencia_det">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_telefono_det">Teléfono</label>
              <div class="col-md-4 col-sm-4 col-xs-12" id="tx_telefono_det">
              </div>
               
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_hijos_det">Hijos</label>
              <div class="col-md-4 col-sm-4 col-xs-12" id="tx_hijos_det">
              </div>
           
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_hipoteca_det">Hipoteca</label>
              <div class="col-md-4 col-sm-4 col-xs-12" id="tx_hipoteca_det">
              </div>
            
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_sbs_det">SBS</label>
              <div class="col-md-4 col-sm-4 col-xs-12" id="tx_sbs_det">
              </div>
              
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="va_sueldo_det">Sueldo</label>
              <div class="col-md-4 col-sm-4 col-xs-12" id="va_sueldo_det">
              </div>
              
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="va_linea_tc_det">Línea TC</label>
              <div class="col-md-4 col-sm-4 col-xs-12" id="va_linea_tc_det">
              </div>
            
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_vehiculo_det">Vehículo</label>
              <div class="col-md-10 col-sm-10 col-xs-12" id="tx_vehiculo_det">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_trabajo_det">Trabajo</label>
              <div class="col-md-10 col-sm-10 col-xs-12" id="tx_trabajo_det">
              </div>
            </div>          
            
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tx_email_det">Email</label>
              <div class="col-md-6 col-sm-6 col-xs-12" id="tx_email_det">
              </div>
       
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nu_edad_det">Edad</label>
              <div class="col-md-2 col-sm-2 col-xs-12" id="nu_edad_det">
              </div>
         
            </div>  

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>