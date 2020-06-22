<?php 

class Mt_marca extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar($data){
      
        $co_empresa=$data['co_empresa'];
        if($co_empresa){
            $this->db->select("a.co_marca");
            $this->db->select("a.tx_marca");
            $this->db->select("b.co_empresa");
            $this->db->select("b.tx_empresa");
            
            $this->db->from("t_prod_marca a");
            $this->db->join("t_empresa b","b.co_empresa=a.co_empresa");
       
            $this->db->where('b.co_empresa', $co_empresa);
        }
        else
        {
            $this->db->select("a.co_marca");
            $this->db->select("a.tx_marca");
            $this->db->select("a.tx_marca");
            $this->db->from("t_prod_marca a");

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
             'tx_marca' => $data['tx_marca'],
             'co_empresa' => $data['co_empresa']
        );        
        return $this->db->insert('t_prod_marca', $data);     

        
    }

    function actualizar($data){
    
        $co_marca=$data['co_marca'];

        $data = array(       
                'tx_marca' => $data['tx_marca']
            );

        $this->db->where('co_marca', $co_marca);
        return $this->db->update('t_prod_marca', $data);
        //echo $this->lastquery();        
      
    }
    function eliminar($data){
    
        $co_marca=$data['co_marca'];
      
        $this->db->where('co_marca', $co_marca);

        return $this->db->delete('t_prod_marca');         
      
    } 


	
}

?>