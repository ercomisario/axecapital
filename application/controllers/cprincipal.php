<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cprincipal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		
	}
	public function index()
	{
		
		$this->load->view('vcabecera');		  
	    $this->load->view('vprincipal');
	  	$this->load->view('vpie');
  
	}
	
    
}

