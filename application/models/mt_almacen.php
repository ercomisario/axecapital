<?php 

class Mt_almacen extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar($data){

        $co_empresa=$data['co_empresa'];
        
        $this->db->select("co_almacen");
        $this->db->select("tx_almacen");
        $this->db->select("co_empresa");

        $this->db->from("t_almacen");
        $this->db->where('co_empresa', $co_empresa);

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
             'tx_almacen' => $data['tx_almacen'],
             'co_empresa' => $data['co_empresa']
        );        
        return $this->db->insert('t_almacen', $data);     

        
    }

    function actualizar($data){
    
        $co_almacen=$data['co_almacen'];

        $data = array(       
             'tx_almacen' => $data['tx_almacen']
        ); 

        $this->db->where('co_almacen', $co_almacen);
        return $this->db->update('t_almacen', $data);
     
      
    }
    function eliminar($data){
    
        $co_almacen=$data['co_almacen'];
      
        $this->db->where('co_almacen', $co_almacen);

        return $this->db->delete('t_almacen');         
      
    } 


	
}

?>