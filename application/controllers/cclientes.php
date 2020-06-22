<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cclientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mt_cliente');
        $this->load->model('mt_sbs');
	}

	public function index()
	{
		$arreglo['clientes'] = $this->mt_cliente->listar();
        $arreglo['sbs'] = $this->mt_sbs->listar();
        $this->load->view('vcabecera');		  
	    $this->load->view('vclientes', $arreglo);
	  	$this->load->view('vpie');
	}
	public function listar()     
    {                             
        $arreglo = $this->mt_cliente->listar();
        $i=-1; 
        $total=0;
        if($arreglo!== FALSE) {                       
          foreach ($arreglo as $row) {     
            $i++;  
            ?> 
            |<tr>
				<tr>
                    <th scope="row"><?php echo $row->co_cliente;?></th>
                    <td><?php echo $row->tx_nombre;?></td>
                    <td><?php echo $row->tx_direccion;?></td>
                    <td><?php echo $row->tx_dni_cliente;?></td>
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

            <?php   
            }
        }
    }
	public function ingresar()     
    {                        
         
        $data['tx_nombre']=$this->input->post("tx_nombre");
        $data['tx_dni_cliente']=$this->input->post("tx_dni_cliente");
        $data['tx_direccion']=$this->input->post("tx_direccion");
        $data['tx_telefono']=$this->input->post("tx_telefono");
        $data['tx_vehiculo']=$this->input->post("tx_vehiculo");
        $data['tx_email']=$this->input->post("tx_email");
        $data['tx_referencia']=$this->input->post("tx_referencia");

        $data['tx_hipoteca']=$this->input->post("tx_hipoteca");
        $data['tx_trabajo']=$this->input->post("tx_trabajo");
        $data['co_sbs']=$this->input->post("co_sbs");
        $data['nu_edad']=$this->input->post("nu_edad");
        $data['va_sueldo']=$this->input->post("va_sueldo");
        $data['va_linea_tc']=$this->input->post("va_linea_tc");
        $resp = $this->mt_cliente->ingresar($data);
        $this->listar();                   
    }
    public function ingresarHijo()     
    {                        
         
        $data['tx_dni_cliente']=$this->input->post("tx_dni_cliente");
        $data['nu_edad_hijo_add']=$this->input->post("nu_edad_hijo_add");
        $data['co_sexo_add']=$this->input->post("co_sexo_add");
        $resp = $this->mt_cliente->ingresarHijo($data);
        //$this->listar();                   
    }
    public function actualizar()     
    {                        
         
        $data['co_cliente']=$this->input->post("co_cliente");
        $data['tx_nombre']=$this->input->post("tx_nombre");
        $data['tx_dni_cliente']=$this->input->post("tx_dni_cliente");
        $data['tx_direccion']=$this->input->post("tx_direccion");
        $data['tx_telefono']=$this->input->post("tx_telefono");
        $data['tx_vehiculo']=$this->input->post("tx_vehiculo");
        $data['tx_email']=$this->input->post("tx_email");
        $data['tx_referencia']=$this->input->post("tx_referencia");
        $data['tx_hijos']=$this->input->post("tx_hijos");
        $data['tx_hipoteca']=$this->input->post("tx_hipoteca");
        $data['tx_trabajo']=$this->input->post("tx_trabajo");
        $data['tx_sbs']=$this->input->post("tx_sbs");
        $data['nu_edad']=$this->input->post("nu_edad");
        $data['va_sueldo']=$this->input->post("va_sueldo");
        $data['va_linea_tc']=$this->input->post("va_linea_tc");
        $resp = $this->mt_cliente->actualizar($data);
        $this->listar();                   
    }
    public function buscar()     
  {                        
           $data['co_cliente'] = $this->input->post('co_cliente'); 
           $resp = $this->mt_cliente->buscar($data);      
           echo json_encode($resp); 
                
  }
	
    
}

