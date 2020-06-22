<?php 

class Mt_empresa extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar($data){      
        $co_empresa=$data['co_empresa'];
        
        $this->db->select("co_empresa");
        $this->db->select("tx_empresa");
        $this->db->select("tx_rif");
        $this->db->select("tx_direccion");
        $this->db->select("tx_telefono_ofi");
        $this->db->select("tx_telefono_cel");
        $this->db->select("tx_correo");
        
        $this->db->from("t_empresa");
        if($co_empresa){
            $this->db->where('co_empresa', $co_empresa);
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
   
    function buscar($data){
      
        $co_usuario=$data['co_usuario'];

        $sql="select a.co_usuario, a.tx_usuario, a.tx_clave, a.tx_nombre, a.co_permisologia, b.tx_permisologia, a.in_status 
              from usuario a, permisologia b
              where a.co_permisologia=b.co_permisologia and a.co_usuario=$co_usuario";
     
        $Boards=$this->db->query($sql);        
      
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
                'tx_empresa' => $data['tx_empresa'],
                'tx_rif' => $data['tx_rif'],
                'tx_direccion' => $data['tx_direccion'],
                'tx_telefono_ofi' => $data['tx_telefono_ofi'],
                'tx_telefono_cel' => $data['tx_telefono_cel'],
                'tx_correo' => $data['tx_correo'],
                'in_status' => 1
            );
            return $this->db->insert('t_empresa', $data);        
        
    }
    function actualizar($data){
    
        $co_empresa=$data['co_empresa'];

        $data = array(       
                'tx_empresa' => $data['tx_empresa'],
                'tx_rif' => $data['tx_rif'],
                'tx_direccion' => $data['tx_direccion'],
                'tx_telefono_ofi' => $data['tx_telefono_ofi'],
                'tx_telefono_cel' => $data['tx_telefono_cel'],
                'tx_correo' => $data['tx_correo']
            );

        $this->db->where('co_empresa', $co_empresa);
        return $this->db->update('t_empresa', $data);
        //echo $this->lastquery();        
      
    }
    function eliminar($data){
    
        $co_empresa=$data['co_empresa'];
      
        $this->db->where('co_empresa', $co_empresa);

        return $this->db->delete('t_empresa');         
      
    } 


	
}

?>