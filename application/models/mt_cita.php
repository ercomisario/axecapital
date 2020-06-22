<?php 

class Mt_cita extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar($data){      

        $co_cliente=$data['co_cliente'];

        $this->db->select("a.co_cita");
        $this->db->select("a.fe_cita");
        $this->db->select("a.ho_cita");
        $this->db->select("a.co_estatus");
        $this->db->select("b.co_cliente");
        $this->db->select("b.tx_dni_cliente");
        $this->db->select("b.tx_nombre");
        $this->db->select("b.tx_direccion");
        $this->db->select("b.tx_telefono");
        $this->db->select("b.nu_edad");
        $this->db->select("b.tx_email");
        $this->db->select("b.tx_hijos");
        $this->db->select("b.tx_hipoteca");
        $this->db->select("b.va_sueldo");
        $this->db->select("b.va_linea_tc");
        $this->db->select("b.tx_referencia");
        $this->db->select("b.tx_trabajo");
        $this->db->select("b.tx_vehiculo");
        $this->db->select("b.tx_sbs");
        $this->db->select("c.co_asesor");
        $this->db->select("c.tx_asesor");
        
        $this->db->from("t_cita a");
        $this->db->join("t_cliente b", "a.co_cliente=b.co_cliente");
        $this->db->join("t_asesor c", "a.co_asesor=c.co_asesor");
        if($co_cliente)
            $this->db->where('a.co_cliente', $co_cliente);
       
        $Boards = $this->db->get();
        // echo "Aqui. ".$this->db->last_query();        
        //die();    
      
        if($Boards->num_rows()>0)
        {
           $data = $Boards->result();
           return $data;
        }
        else
           return false;       
    } 
   
   function ingresar($data){

        $data = array(       
             'co_cliente' => $data['co_cliente'],
             'co_asesor' => $data['co_asesor'],
             'fe_cita' => $data['fe_cita'],
             'ho_cita' => $data['ho_cita'],
             'co_estatus' => 1
        );        
        return $this->db->insert('t_cita', $data);     

        
    }



	
}

?>