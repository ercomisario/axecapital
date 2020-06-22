<?php 

class Mt_proveedor extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar(){
      
        $this->db->select("co_proveedor");
        $this->db->select("tx_proveedor");
        $this->db->select("tx_direccion");
        $this->db->select("tx_rif");
        $this->db->select("tx_contacto");
        $this->db->select("tx_telefono_1");
        $this->db->select("tx_telefono_2");
        $this->db->select("tx_email");
        $this->db->from("t_proveedor");

        $Boards = $this->db->get();
      
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
             'tx_proveedor' => $data['tx_proveedor'],
             'tx_rif' => $data['tx_rif'],
             'tx_direccion' => $data['tx_direccion'],
             'tx_telefono_1' => $data['tx_direccion'],
             'tx_contacto' => $data['tx_contacto'],
             'tx_telefono_2' => $data['tx_telefono_2'],
             'tx_email' => $data['tx_email']
        );        
        return $this->db->insert('t_proveedor', $data);     

        
    }

    function actualizar($data){
    
        $co_proveedor=$data['co_proveedor'];

        $data = array(       
             'tx_proveedor' => $data['tx_proveedor'],
             'tx_rif' => $data['tx_rif'],
             'tx_direccion' => $data['tx_direccion'],
             'tx_telefono_1' => $data['tx_telefono_1'],
             'tx_contacto' => $data['tx_contacto'],
             'tx_telefono_2' => $data['tx_telefono_2'],
             'tx_email' => $data['tx_email']
        ); 

        $this->db->where('co_proveedor', $co_proveedor);
        return $this->db->update('t_proveedor', $data);
        //echo $this->lastquery();        
      
    }
    function eliminar($data){
    
        $co_proveedor=$data['co_proveedor'];
      
        $this->db->where('co_proveedor', $co_proveedor);

        return $this->db->delete('t_proveedor');         
      
    } 


	
}

?>