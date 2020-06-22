<?php 

class Mt_cliente extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar(){      

        $this->db->select("a.co_cliente");
        $this->db->select("a.tx_dni_cliente");
        $this->db->select("a.tx_nombre");
        $this->db->select("a.tx_direccion");
        $this->db->select("a.tx_telefono");
        $this->db->select("a.nu_edad");
        $this->db->select("a.tx_email");
        $this->db->select("a.tx_hipoteca");
        $this->db->select("a.va_sueldo");
        $this->db->select("a.va_linea_tc");
        $this->db->select("a.tx_referencia");
        $this->db->select("a.tx_trabajo");
        $this->db->select("a.tx_vehiculo");
        $this->db->select("b.co_sbs");
        
        $this->db->from("t_cliente a");
        $this->db->join("t_sbs b","a.co_sbs=b.co_sbs");
       
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
                'tx_nombre' => $data['tx_nombre'],
                'tx_dni_cliente' => $data['tx_dni_cliente'],
                'tx_direccion' => $data['tx_direccion'],
                'tx_telefono' => $data['tx_telefono'],
                'nu_edad' => $data['nu_edad'],
                'tx_email' => $data['tx_email'],

                'tx_hipoteca' => $data['tx_hipoteca'],
                'tx_vehiculo' => $data['tx_vehiculo'],
                'co_sbs' => $data['co_sbs'],
                'va_sueldo' => $data['va_sueldo'],
                'va_linea_tc' => $data['va_linea_tc'],
                'tx_referencia' => $data['tx_referencia'],
                'tx_trabajo' => $data['tx_trabajo']
            );
            return $this->db->insert('t_cliente', $data);        
        
    }
    function actualizar($data){
    
        $co_cliente=$data['co_cliente'];

        $data = array(       
                'tx_nombre' => strtoupper($data['tx_nombre']),
                'tx_dni_cliente' => $data['tx_dni_cliente'],
                'tx_direccion' => strtoupper($data['tx_direccion']),
                'tx_telefono' => $data['tx_telefono'],
                'nu_edad' => $data['nu_edad'],
                'tx_email' => $data['tx_email'],
      
                'tx_hipoteca' => $data['tx_hipoteca'],
                'tx_vehiculo' => strtoupper($data['tx_vehiculo']),
                'co_sbs' => $data['co_sbs'],
                'va_sueldo' => $data['va_sueldo'],
                'va_linea_tc' => $data['va_linea_tc'],
                'tx_referencia' => strtoupper($data['tx_referencia']),
                'tx_trabajo' => strtoupper($data['tx_trabajo'])
            );

        $this->db->where('co_cliente', $co_cliente);
        
        return $this->db->update('t_cliente', $data);
        //echo "Aqui. ".$this->db->last_query();        
        //die();    
       
        
      
    }
    function eliminar($data){
    
        $co_cliente=$data['co_cliente'];
      
        $this->db->where('co_cliente', $co_cliente);
        return $this->db->delete('t_cliente');         
      
    } 
    function buscar($data){
        
        $co_cliente=$data['co_cliente'];
        
        $this->db->select("tx_dni_cliente");
        $this->db->select("tx_nombre");
        $this->db->select("tx_direccion");
        $this->db->select("tx_telefono");
        $this->db->select("nu_edad");
        $this->db->select("tx_email");
        $this->db->select("tx_hipoteca");
        $this->db->select("va_sueldo");
        $this->db->select("va_linea_tc");
        $this->db->select("tx_referencia");
        $this->db->select("tx_trabajo");
        $this->db->select("tx_vehiculo");
        $this->db->select("co_sbs");
        
        $this->db->from("t_cliente");

        $this->db->where('co_cliente', $co_cliente);
        
        $Boards = $this->db->get();
      
        return $Boards->row();
           
           
    } 
    function buscarID($data){
        
        $tx_dni_cliente=$data['tx_dni_cliente'];
        
        $this->db->select("co_cliente");
        
        $this->db->from("t_cliente");

        $this->db->where('tx_dni_cliente', $tx_dni_cliente);
        
        $Boards = $this->db->get();
        //echo "Aqui. ".$this->db->last_query();        
        //die();  
        if($Boards->num_rows()>0)
        {
           foreach($Boards->result() as $row)
            {
               $co_cliente=$row->co_cliente; 
            } 
            return $co_cliente;   
        }
        else
           return false;  
           
           
    } 
    function ingresarHijo($data){

            $arreglo['tx_dni_cliente']=$data['tx_dni_cliente'];

            $co_cliente=$this->buscarID($arreglo);
            
            $data = array(       
                'co_cliente' => $co_cliente,
                'nu_edad' => $data['nu_edad_hijo_add'],
                'co_sexo' => $data['co_sexo_add']

            );
            return $this->db->insert('t_hijo', $data);        
        
    }

	
}

?>