<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ccitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mt_cita');
        $this->load->model('mt_cliente');
        $this->load->model('mt_asesor');
        $this->load->library('email');
	}

	public function index()
	{
		$arreglo['clientes'] = $this->mt_cliente->listar();
        $arreglo['asesores'] = $this->mt_asesor->listar();
        $this->load->view('vcabecera');		  
	    $this->load->view('vcitas', $arreglo);
	  	$this->load->view('vpie');
	}
	public function listar($data)     
    {   

       $clientes = $this->mt_cliente->listar($data);
       if($clientes!= FALSE) {
           foreach ($clientes as $row_cliente) {  
            $band=1;
            $co_cliente=$row_cliente->co_cliente;
            $tx_dni_cliente=$row_cliente->tx_dni_cliente;
            $tx_nombre=$row_cliente->tx_nombre;
            $tx_telefono=$row_cliente->tx_telefono;
            $tx_email=$row_cliente->tx_email;

            } }
        ?>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                <label>Nombre</label>
                <input type="text" id="tx_nombre" name="tx_nombre" class="form-control" value="<?php echo $tx_nombre;?>" readonly="readonly">
                <input type="hidden" id="co_cliente" name="co_cliente" class="form-control" value="<?php echo $co_cliente;?>" readonly="readonly">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                <label>Telefono</label>
                <input type="text" id="tx_telefono" name="tx_telefono" class="form-control" value="<?php echo $tx_telefono;?>" readonly="readonly">
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                <label>Email</label>
                <input type="text" id="tx_email" name="tx_email" class="form-control" value="<?php echo $tx_email;?>" readonly="readonly">
            </div> 
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table id="myTabla" class="table table-striped jambo_table">
                <thead>
                    <tr>
                        <th class="column-title">#</th>
                        <th class="column-title">Cliente</th>
                        <th class="column-title">Fecha</th>
                        <th class="column-title">Hora</th>
                        <th class="column-title">Asesor</th>
                        <th class="column-title">Estatus</th>
                        <th class="column-title">Editar</th>
                        <th class="column-title">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
        <?php   
        $data['co_cliente']=$co_cliente;
        $arreglo = $this->mt_cita->listar($data);
        $i=-1; 
        $total=0;
        if($arreglo!== FALSE) {                       
          foreach ($arreglo as $row) {     
            $i++;  
            ?> 
            <tr>
                <th scope="row"><?php echo $row->co_cita;?></th>
                <td><?php echo $row->tx_nombre;?></td>
                <td><?php echo $row->fe_cita;?></td>
                <td><?php echo $row->ho_cita;?></td>
                <td><?php echo $row->tx_asesor;?></td>
                <td><?php echo "Pendiente";?></td>
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
        ?>
         </tbody>
        </table>                          
        </div>
        </div>
    <?php   
    }
    public function formatearFecha($fecha)
    {

             $partesFecha = explode("/", $fecha);
             $nuevaFecha = $partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0];
             return $nuevaFecha;
    }
	public function enviarCorreoCliente($data)
    {
       $clientes = $this->mt_cliente->listar($data);
       $asesores = $this->mt_asesor->listar($data);
       $fe_cita=$data['fe_cita'];
       $ho_cita=$data['ho_cita'];
       if($clientes!= FALSE) {
           foreach ($clientes as $row_cliente) {  
            $co_cliente=$row_cliente->co_cliente;           
            $tx_nombre=$row_cliente->tx_nombre;
            $tx_email_cliente=$row_cliente->tx_email;

            } }
       if($asesores!= FALSE) {
           foreach ($asesores as $row_asesor) {  
            $co_asesor=$row_asesor->co_asesor;
            $tx_asesor=$row_asesor->tx_asesor;
            $tx_email_asesor=$row_asesor->tx_email;

            } }
        $tx_email_sistema='info@axecapital.com';
        $tx_nombre_sistema='AxeCapital';
        /////////////////////////////////////////////////////////////////////////7
        $htmlContent = '<h1>Le hemos registrado la siguiente cita: </h1>';
        $htmlContent .= '<p>Asesor: '.$tx_asesor.'<br>';
        $htmlContent .= 'Fecha: '.$fe_cita.'</p>';
        $htmlContent .= 'Hora: '.$ho_cita.'</p>';
        $htmlContent .= '<h1>Se le agradece puntualidad </h1>';
        
        //die($htmlContent);
        $config = array(
         'protocol'  => 'smtp',
         'smtp_host' => "167.175.55.149",
         //'smtp_host' => "host.caracashosting55.com",
         'mailtype'  => 'html',
         'charset'   => 'utf-8',
         'newline'   => "\r\n"
        );    
        
        $this->email->initialize($config);
        $recipientArr = array($tx_email_cliente);
        $this->email->to($recipientArr);
        $this->email->from($tx_email_sistema,$tx_nombre_sistema);
        $this->email->subject('Confirmación de Cita, enviado desde AxeCapital.com');
        $this->email->message($htmlContent);
        $this->email->send();
        
    }

    public function enviarCorreoAsesor($data)
    {
       $clientes = $this->mt_cliente->listar($data);
       $asesores = $this->mt_asesor->listar($data);
       $fe_cita=$data['fe_cita'];
       $ho_cita=$data['ho_cita'];
       if($clientes!= FALSE) {
           foreach ($clientes as $row_cliente) {  
            $co_cliente=$row_cliente->co_cliente;
            $tx_dni_cliente=$row_cliente->tx_dni_cliente;
            $tx_nombre=$row_cliente->tx_nombre;
            $tx_telefono=$row_cliente->tx_telefono;
            $tx_direccion=$row_cliente->tx_direccion;
            $tx_referencia=$row_cliente->tx_referencia;
            $tx_sbs=$row_cliente->tx_sbs;
            $tx_hijos=$row_cliente->tx_hijos;
            $tx_hipoteca=$row_cliente->tx_hipoteca;
            $tx_vehiculo=$row_cliente->tx_vehiculo;
            $nu_edad=$row_cliente->nu_edad;
            $va_sueldo=$row_cliente->va_sueldo;
            $va_linea_tc=$row_cliente->va_linea_tc;
            $tx_trabajo=$row_cliente->tx_trabajo;
            $tx_email_cliente=$row_cliente->tx_email;

            } }
       if($asesores!= FALSE) {
           foreach ($asesores as $row_asesor) {  
            $co_asesor=$row_asesor->co_asesor;
            $tx_asesor=$row_asesor->tx_asesor;
            $tx_email_asesor=$row_asesor->tx_email;

            } }
        $tx_email_sistema='info@axecapital.com';
        $tx_nombre_sistema='AxeCapital';
        /////////////////////////////////////////////////////////////////////////7
        $htmlContent = '<h1>Se ha registrado la siguiente cita :</h1>';
        $htmlContent .= '<p>Nombre: '.$tx_nombre.'<br>';
        $htmlContent .= 'DNI: '.$tx_dni_cliente.'<br>';
        $htmlContent .= 'Fecha: '.$fe_cita.'<br>';
        $htmlContent .= 'Hora: '.$ho_cita.'<br>';
        $htmlContent .= 'Teléfono: '.$tx_telefono.'<br>';
        $htmlContent .= 'Correo: '.$tx_email_cliente.'<br>';
        $htmlContent .= 'Dirección: '.$tx_direccion.'<br>';
        $htmlContent .= 'Referencia: '.$tx_referencia.'<br>';
        $htmlContent .= 'Trabajo: '.$tx_trabajo.'<br>';
        $htmlContent .= 'Hijos: '.$tx_hijos.'<br>';
        $htmlContent .= 'Hipoteca: '.$tx_hipoteca.'<br>';
        $htmlContent .= 'Vehículo: '.$tx_vehiculo.'<br>';
        $htmlContent .= 'SBS: '.$tx_sbs.'<br>';
        $htmlContent .= 'Lines TC: '.$va_linea_tc.'<br>';
        $htmlContent .= 'Sueldo: '.$va_sueldo.'</p>';
        //die($htmlContent);
        $config = array(
         'protocol'  => 'smtp',
         'smtp_host' => "167.175.55.149",
         //'smtp_host' => "host.caracashosting55.com",
         'mailtype'  => 'html',
         'charset'   => 'utf-8',
         'newline'   => "\r\n"
        );    
        
        $this->email->initialize($config);
        $recipientArr = array($tx_email_asesor);
        $this->email->to($recipientArr);
        $this->email->from($tx_email_sistema,$tx_nombre_sistema);
        $this->email->subject('Registro de Cita, enviado desde AxeCapital.com');
        $this->email->message($htmlContent);
        $this->email->send();

     
    }
    public function ingresar()     
    {                        
         
        $data['co_cliente']=$this->input->post("co_cliente");
        $data['co_asesor']=$this->input->post("co_asesor");
        $fechaFormateada = $this->formatearFecha($this->input->post("fe_cita"));
        $data['fe_cita'] = $fechaFormateada; 
        $data['ho_cita']=$this->input->post("ho_cita");
        $resp = $this->mt_cita->ingresar($data);
        $resp = $this->enviarCorreoCliente($data);
        $resp = $this->enviarCorreoAsesor($data);
        $this->listar($data);                   
    }
    
    public function buscarCliente()     
    {                        
            $data['tx_dni_cliente'] = $this->input->post('tx_dni_cliente'); 
            $resp = $this->mt_cliente->buscarID($data);      
            $arreglo['co_cliente']=$resp;
            //die($resp);
            $this->listar($arreglo);
                    
     }

	
    
}

