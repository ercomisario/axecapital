<?php 

class Mt_asesor extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar(){      

        $this->db->select("co_asesor");
        $this->db->select("tx_asesor");
        $this->db->select("tx_email");
        
        $this->db->from("t_asesor");
       
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