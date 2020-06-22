<?php 

class Mt_modelo extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar($data){
      
        $co_empresa=$data['co_empresa'];
        if($co_empresa){
            $this->db->select("a.co_modelo");
            $this->db->select("a.tx_modelo");
            $this->db->select("a.tx_descripcion");
            $this->db->select("b.co_empresa");
            $this->db->select("b.tx_empresa");
            
            $this->db->from("t_prod_modelo a");
            $this->db->join("t_empresa b","b.co_empresa=a.co_empresa");
       
            $this->db->where('b.co_empresa', $co_empresa);
        }
        else
        {
            $this->db->select("a.co_modelo");
            $this->db->select("a.tx_modelo");
            $this->db->select("a.tx_descripcion");
            $this->db->from("t_prod_modelo a");

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
             'tx_modelo' => $data['tx_modelo'],
             'tx_descripcion' => $data['tx_descripcion'],
             'co_empresa' => $data['co_empresa']
        );        
        return $this->db->insert('t_prod_modelo', $data);     

        
    }

    function actualizar($data){
    
        $co_modelo=$data['co_modelo'];

        $data = array(       
                'tx_modelo' => $data['tx_modelo'],
                'tx_descripcion' => $data['tx_descripcion']
            );

        $this->db->where('co_modelo', $co_modelo);
        return $this->db->update('t_prod_modelo', $data);
        //echo $this->lastquery();        
      
    }
    function eliminar($data){
    
        $co_modelo=$data['co_modelo'];
      
        $this->db->where('co_modelo', $co_modelo);

        return $this->db->delete('t_prod_modelo');         
      
    } 


	
}

?>