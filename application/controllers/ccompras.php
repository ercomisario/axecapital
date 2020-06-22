<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccompras extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mt_compra');
		$this->load->model('mt_proveedor');
		$this->load->model('mt_categoria');
		$this->load->model('mt_marca');
		$this->load->model('mt_modelo');
		$this->load->model('mt_almacen');
		
		
	}
	/*public function index()
	{
		$resp=null;
		$this->indexPrincipal($resp); 
		
  
	}*/
	public function index()
	{
		$dataSession=$this->session->userdata('usuario_ag');
		if(!$dataSession){
		       redirect('cingresar/fcerrarSesion');
		}
		$co_empresa_session=$dataSession['co_empresa_session'];
		$data['co_empresa']=$co_empresa_session;
		//$co_compra=$resp['co_compra'];
		
		/*if($resp){
			//$data['co_compra']=$resp['co_compra'];
			echo "   Aqui 3: ".$resp;
			$arreglo['compras'] = $this->mt_compra->buscar($data);
			$arreglo['compras_productos'] = $this->mt_compra->listarProductos($data);
		}*/
		$arreglo['proveedores'] = $this->mt_proveedor->listar();
		$arreglo['almacenes'] = $this->mt_almacen->listar($data);
		$arreglo['categorias'] = $this->mt_categoria->listar($data);
		$arreglo['marcas'] = $this->mt_marca->listar($data);
		$arreglo['modelos'] = $this->mt_modelo->listar($data);
		$this->load->view('vcabecera');		  
	    $this->load->view('vcompras',$arreglo);
	  	$this->load->view('vpie');
  
	}
	public function listarProductos($data)
	{
		$dataSession=$this->session->userdata('usuario_ag');
		if(!$dataSession){
		       redirect('cingresar/fcerrarSesion');
		}
		$co_usuario_session=$dataSession['co_usuario_session'];
		$co_empresa_session=$dataSession['co_empresa_session'];		
		$proveedores = $this->mt_proveedor->listar();
		if($data['co_compra']){
			$compras_productos = $this->mt_compra->listarProductos($data);
			$compras = $this->mt_compra->buscar($data);

		if($compras!= FALSE) {
           foreach ($compras as $row_compra) {  
			$band=1;
			$co_compra=$row_compra->co_compra;
			$fe_compra=date('d/m/Y',strtotime($row_compra->fe_compra));
			$tx_control_compra=$row_compra->tx_control_compra;
			$co_proveedor=$row_compra->co_proveedor;
			$va_compra=$row_compra->va_compra;
			$va_cancelado=$row_compra->va_cancelado;
			$va_por_pagar=$row_compra->va_por_pagar;
			//echo "Aqui: ".$co_compra;
			} }

		?>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label>Proveedores</label>
			<div class="input-group">
				<select class="form-control" id="co_proveedor" name="co_proveedor">
					<option value="">PROVEEDOR</option>
					<?php 
					$selected='';
					if(isset($proveedores) && $proveedores!= FALSE) {
						foreach ($proveedores as $row) {
							if(isset($co_proveedor))
                                if($row->co_proveedor==$co_proveedor) $selected='selected="selected"';
                                ?> 
                               <option value="<?php echo $row->co_proveedor;?>" <?php echo $selected;?>><?php echo $row->tx_proveedor;?></option>
                            <?php  } }?>
				</select>
				<span class="input-group-btn">
					<button class="btn btn-default" type="button"><i class="fa fa-plus"></i> Nuevo</button>
				</span>
			</div>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12 form-group">
			<label>Número/Control Compra</label>
			<input type="text" id="tx_control_compra" name="tx_control_compra" class="form-control" value="<?php echo $tx_control_compra;?>">
			<input type="hidden" id="co_usuario" name="co_usuario" value="<?php echo $co_usuario_session;?>">
			<input type="hidden" id="co_empresa" name="co_empresa" value="<?php echo $co_empresa_session;?>">
			<input type="hidden" id="co_compra" name="co_compra" value="<?php echo $co_compra;?>">
        </div>
		<div class="col-md-3 col-sm-3 col-xs-12 form-group">
			<label>Fecha Compra</label>
			<div class='input-group date' id='myDatepicker1'>
				<input id="fe_compra" name="fe_compra" type='text' class="form-control" value="<?php echo $fe_compra;?>">
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div> 
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table id="myTabla" class="table table-striped jambo_table">
					<thead>
						<tr>
							<th class="column-title">#</th>
							<th class="column-title">Categoria</th>
							<th class="column-title">Marca</th>
                            <th class="column-title">Modelo</th>
                            <th class="column-title">Costo Unitario</th>
                            <th class="column-title">Cantidad</th>
                            <th class="column-title">Costo Total</th>
                            <th class="column-title">Editar</th>
                            <th class="column-title">Eliminar</th>
                        </tr>
					</thead>
					<tbody>
        <?php 
		$i=-1; 
		$sumaTotal=0;
		if($compras_productos!= FALSE) {
			foreach ($compras_productos as $row) { 
				$total=($row->va_costo_unitario*$row->nu_cantidad);
                $sumaTotal+=$total;
				$i++;
			?> 
			<tr>
				<th scope="row"><?php echo $row->co_compra_producto;?><input type="hidden" name="cod<?php echo $i;?>" id="cod<?php echo $i;?>" value="<?php echo $row->co_compra_producto;?>" /></th>
				<td><?php echo $row->tx_categoria;?><input type="hidden" name="cat<?php echo $i;?>" id="cat<?php echo $i;?>" value="<?php echo $row->co_categoria;?>" /></td>
				<td><?php echo $row->tx_marca;?><input type="hidden" name="mar<?php echo $i;?>" id="mar<?php echo $i;?>" value="<?php echo $row->co_marca;?>" /></td>
				<td><?php echo $row->tx_modelo;?><input type="hidden" name="mod<?php echo $i;?>" id="mod<?php echo $i;?>" value="<?php echo $row->co_modelo;?>" /></td>
				<td><?php echo $row->va_costo_unitario;?><input type="hidden" name="mod<?php echo $i;?>" id="mod<?php echo $i;?>" value="<?php echo $row->va_costo_unitario;?>" /></td>
				<td><?php echo $row->nu_cantidad;?><input type="hidden" name="mod<?php echo $i;?>" id="mod<?php echo $i;?>" value="<?php echo $row->nu_cantidad;?>" /></td>
				<td><?php echo $total;?><input type="hidden" name="mod<?php echo $i;?>" id="mod<?php echo $i;?>" value="<?php echo $total;?>" /></td>
                <td>
					<button type="button" class="btn btn-primary btn-xs" onclick="mostrarEditar(<?php echo $i;?>);"><i class="fa fa-edit"></i></button>
				</td>
				<td>
					<button type="button" class="btn btn-danger btn-xs" onclick="mostrarEliminar(<?php echo $i;?>);"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
		<?php  } } ?>
				</tbody>
		</table>
		</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                <label>Monto Total de Compra</label>
                <input type="text" id="va_compra" name="va_compra" class="form-control" value="<?php echo $sumaTotal;?>" readonly="readonly">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                <label>Monto Cancelado</label>
                <input type="text" id="va_cancelado" name="va_cancelado" class="form-control" value="<?php echo $va_cancelado;?>">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                <label>Monto por Pagar</label>
                <input type="text" id="va_por_pagar" name="va_por_pagar" class="form-control" value="<?php echo $va_por_pagar;?>" readonly="readonly">
            </div> 
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">                      
            <div class="col-md-3 col-sm-3 col-xs-12">
                <button type="button" class="btn btn-primary" onclick="ejecutarEditar();"><i class="fa fa-floppy-o"></i> Guardar Cambios</button>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProducto"><i class="fa fa-plus"></i> Agregar Producto</button>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#add"><i class="fa fa-trash"></i> Eliminar Compra</button>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <button type="button" class="btn btn-default" onclick="location='<?php echo base_url();?>ccompras'"><i class="fa fa-eraser"></i> Cancelar/Limpiar</button>
            </div>
        </div>
        <script>
	    
	    	$('#myDatepicker1').datetimepicker({
	            format: 'DD/MM/YYYY'
	        });
		    
		</script>
        <?php }
        else{?>
         <div class="col-md-12 col-sm-12 col-xs-12">                      
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
				<strong>Aviso!!!</strong>
				Registro de Compra No Encontrado.
			</div>
        </div>
        

        <?php }
	}
	public function formatearFecha($fecha)
	{

			 $partesFecha = explode("/", $fecha);
			 $nuevaFecha = $partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0];
			 return $nuevaFecha;
	}
	public function ingresar()     
    {    
        $data['tx_control_compra']=$this->input->post("tx_control_compra");        
        $data['co_proveedor']=$this->input->post("co_proveedor");
        $data['co_usuario']=$this->input->post("co_usuario");
        $data['co_empresa']=$this->input->post("co_empresa");
        $fechaFormateada = $this->formatearFecha($this->input->post("fe_compra"));
        $data['fe_compra'] = $fechaFormateada; 
        $resp = $this->mt_compra->ingresar($data);
        $data['co_compra']=$resp;
        $this->listarProductos($data);                 
    }
    public function ingresarProducto()     
    {    
        $data['co_compra']=$this->input->post("co_compra");        
        $data['co_categoria']=$this->input->post("co_categoria");
        $data['co_marca']=$this->input->post("co_marca");
        $data['co_modelo']=$this->input->post("co_modelo");
        $data['va_costo_unitario']=$this->input->post("va_costo_unitario");
        $data['nu_cantidad']=$this->input->post("nu_cantidad");        
        $data['co_almacen']=$this->input->post("co_almacen");        
        $resp = $this->mt_compra->ingresarProducto($data);
        //$data['co_compra']=$resp;
        $this->listarProductos($data);               

    }
    public function buscarCompra()     
    {    
        $data['tx_control_compra']=$this->input->post("tx_control_compra");      
        $resp = $this->mt_compra->buscarCompra($data);
        $data['co_compra']=$resp;
        $this->listarProductos($data);     
    }
    public function actualizar()     
    {                                 
        $data['co_compra']=$this->input->post("co_compra");
        $data['tx_control_compra']=$this->input->post("tx_control_compra");
        $fechaFormateada = $this->formatearFecha($this->input->post("fe_compra"));
        $data['fe_compra'] = $fechaFormateada; 
        $data['co_proveedor']=$this->input->post("co_proveedor");
        $data['va_compra']=$this->input->post("va_compra");
        $data['va_cancelado']=$this->input->post("va_cancelado");
        $data['va_por_pagar']=$this->input->post("va_por_pagar");
        $resp = $this->mt_compra->actualizar($data);
        $this->listarProductos($data);              
    }
	
    
}

