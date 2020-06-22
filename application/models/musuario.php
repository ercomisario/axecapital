<?php 

class Musuario extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	function validar($data)
    {
        $tx_usuario=$data['tx_usuario'];
        $tx_clave=$data['tx_clave'];

        $this->db->select("a.co_usuario");
        $this->db->select("a.tx_usuario");
        $this->db->select("a.tx_nombre");
        $this->db->select("a.tx_correo");
        $this->db->select("a.tx_clave");
        $this->db->select("a.co_empresa");
        $this->db->select("b.tx_empresa");
        $this->db->select("a.co_permisologia");
        $this->db->select("c.tx_permisologia");
                
        $this->db->from("t_usuario a");  
        $this->db->join("t_empresa b","a.co_empresa = b.co_empresa");  
        $this->db->join("t_permisologia c","a.co_permisologia = c.co_permisologia");  
     
        $this->db->where('a.tx_usuario', $tx_usuario); 
        $this->db->where('a.tx_clave', $tx_clave);
        $query = $this->db->get();
        //echo "Aqui. ".$this->db->last_query();        
        //die();
      
      
        if($query->num_rows()>0)
        {
            $row=$query->row();

            $arregloSession = array(
                 'co_usuario_session' => $row->co_usuario,
                 'tx_usuario_session' => $tx_usuario,
                 'tx_nombre_session' => $row->tx_nombre,
                 'tx_correo_session' => $row->tx_correo,
                 'co_permisologia_session' => $row->co_permisologia,
                 'tx_permisologia_session' => $row->tx_permisologia,
                 'co_empresa_session' => $row->co_empresa,
                 'tx_empresa_session' => $row->tx_empresa
                 

            );

            $this->session->set_userdata('usuario_ag', $arregloSession);
            
            return 1;
        }
        else
            
            return false;

    }
    function cambiarClave($data){
    
        $co_usuario=$data['co_usuario'];
        $tx_clave=$data['tx_clave'];
        

        $data = array(
            'tx_clave' => $tx_clave
        );
        $this->db->where('co_usuario', $co_usuario);
        return $this->db->update('usuario', $data);
        echo $this->lastquery();        
      
    }

    /////////////////////////////////////////////////////7
    function listar(){
      
        
        $sql="select a.co_usuario, a.tx_usuario, a.tx_clave, a.tx_nombre, a.co_permisologia, b.tx_permisologia 
              from usuario a, permisologia b
			  where a.co_permisologia=b.co_permisologia";
     
        
        //echo $sql; 
        $Boards=$this->db->query($sql);        
      
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
       
                'tx_usuario' => $data['tx_usuario'],
                'tx_clave' => $data['tx_clave'],
                'tx_nombre' => $data['tx_nombre'],
                'co_permisologia' => $data['co_permisologia'],
                'in_status' => 1
            );
            return $this->db->insert('usuario', $data);        
        
    }
    function actualizar($data){
    
        $co_usuario=$data['co_usuario'];
       /* $tx_usuario=$data['tx_usuario'];
        $tx_clave=$data['tx_clave'];
        $tx_nombre=$data['tx_nombre'];
        $co_permisologia=$data['co_permisologia'];
        $in_status=$data['in_status'];
        */

        $data = array(
            'in_status' => 2
        );
        $this->db->where('co_usuario', $co_usuario);
        return $this->db->update('usuario', $data);
        //echo $this->lastquery();        
      
    }
    function eliminar($data){
    
        $co_usuario=$data['co_usuario'];
      
        $this->db->where('co_usuario', $co_usuario);

        return $this->db->delete('usuario');         
      
    } 


	
}

?>