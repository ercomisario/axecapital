<?php 

class Mt_sbs extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar(){      

        $this->db->select("co_sbs");
        $this->db->select("tx_sbs");
        
        $this->db->from("t_sbs");
       
        $Boards = $this->db->get();
      
        if($Boards->num_rows()>0)
        {
           $data = $Boards->result();
           return $data;
        }
        else
           return false;       
    } 
   
   

	
}

?>