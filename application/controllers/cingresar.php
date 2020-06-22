<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cingresar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mt_usuario');
		$this->load->library('email');
		
		
	}
	public function index()
	{
  		$arreglo['respuesta']=null;
	    $this->load->view('vingresar',$arreglo);
  
	}
	public function fvalidar()
	{
		$data = array(
			'tx_usuario' => $this->input->post('tx_usuario_ag'),
			'tx_clave' => $this->input->post('tx_clave_ag')
			);
		
		$validado=$this->mt_usuario->validar($data);

		if ($validado==1)
		{
			redirect(CARPETA.'cprincipal');
			
		}	
		else
		{
			$arreglo['respuesta']=2;
			$this->load->view('vingresar',$arreglo);
		}


	}
	public function fenviarRegistro()
	{
		
		$tx_nombre = $this->input->post('tx_nombre_contacto_ag'); 
		$tx_empresa = $this->input->post('tx_empresa_ag'); 
		$tx_direccion = $this->input->post('tx_direccion_ag'); 
		$tx_rif = $this->input->post('tx_rif_ag'); 
		$tx_email = $this->input->post('tx_email_ag'); 

		$htmlContent = '<h1>Ha recibido un mensaje de: '.$tx_nombre .'</h1>';
		$htmlContent .= '<p>Empresa: '.$tx_empresa.'<br>';
		$htmlContent .= 'RIF: '.$tx_rif.'<br>';
		$htmlContent .= 'Correo: '.$tx_email.'<br>';
		$htmlContent .= 'Direccion: '.$tx_direccion.'</p>';
		//die($htmlContent);
		$config = array(
		 'protocol'  => 'smtp',
		 //'smtp_host' => "167.175.55.149",
		 //'smtp_host' => "000webhostapp.com",
		 'mailtype'  => 'html',
		 'charset'   => 'utf-8',
		 'newline'   => "\r\n"
		);    
		
		$this->email->initialize($config);
		//$recipientArr = array('info@simonrondonmusic.com','norelysrondon@gmail.com','belizarioja@gmail.com');
		$recipientArr = array('belizarioja@gmail.com','garciaecg@gmail.com');
		$this->email->to($recipientArr);
		//$this->email->to('info@simonrondonmusic.com','norelysrondon@gmail.com','belizarioja@gmail.com');
		$this->email->from($tx_email,$tx_nombre);
		$this->email->subject('SOLICITUD DE REGISTRO - Enviado desde AdysGem | Sistemas Empresariales');
		$this->email->message($htmlContent);
		$this->email->send();
		//var_dump($this->email->print_debugger());
		//$this->index();      
		//$enviado=1;
		$arreglo['respuesta']=1;
		//if ($enviado==1)
		$this->load->view('vingresar',$arreglo);
		
	}
	public function fcerrarSesion()
    {
	    $this->session->sess_destroy();
	    $this->index();
  	}
	
    
}

