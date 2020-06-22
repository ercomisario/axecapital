<?php 

class Mt_categoria extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar($data){
      
        $co_empresa=$data['co_empresa'];
        if($co_empresa){
            $this->db->select("a.co_categoria");
            $this->db->select("a.tx_categoria");
            $this->db->select("a.tx_descripcion");
            $this->db->select("b.co_empresa");
            $this->db->select("b.tx_empresa");
            
            $this->db->from("t_prod_categoria a");
            $this->db->join("t_empresa b","b.co_empresa=a.co_empresa");
       
            $this->db->where('b.co_empresa', $co_empresa);
        }
        else
        {
            $this->db->select("a.co_categoria");
            $this->db->select("a.tx_categoria");
            $this->db->select("a.tx_descripcion");
            $this->db->from("t_prod_categoria a");

        }
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
             'tx_categoria' => $data['tx_categoria'],
             'tx_descripcion' => $data['tx_descripcion'],
             'co_empresa' => $data['co_empresa']
        );        
        return $this->db->insert('t_prod_categoria', $data);     

        
    }

    function actualizar($data){
    
        $co_categoria=$data['co_categoria'];

        $data = array(       
                'tx_categoria' => $data['tx_categoria'],
                'tx_descripcion' => $data['tx_descripcion']
            );

        $this->db->where('co_categoria', $co_categoria);
        return $this->db->update('t_prod_categoria', $data);
        //echo $this->lastquery();        
      
    }
    function eliminar($data){
    
        $co_categoria=$data['co_categoria'];
      
        $this->db->where('co_categoria', $co_categoria);

        return $this->db->delete('t_prod_categoria');         
      
    } 


	
}

?>