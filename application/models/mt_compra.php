<?php 

class Mt_compra extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
    function listar($data){
        $co_compra=$data['co_compra'];
      
        $this->db->select("co_compra");
        $this->db->select("tx_control_compra");
        $this->db->select("fe_compra");
        $this->db->select("va_compra");
        $this->db->select("co_usuario");
        $this->db->select("co_proveedor");
        $this->db->from("t_compra");
        if($co_compra)
            $this->db->where('co_compra', $co_compra);

        $Boards = $this->db->get();
      
        if($Boards->num_rows()>0)
        {
           $data = $Boards->result();
           return $data;
        }
        else
           return false;       
    }
    function listarProductos($data){
        $co_compra=$data['co_compra'];
      
        $this->db->select("a.co_compra_producto");
        $this->db->select("b.co_categoria");
        $this->db->select("b.tx_categoria");
        $this->db->select("c.co_marca");
        $this->db->select("c.tx_marca");
        $this->db->select("d.co_modelo");
        $this->db->select("d.tx_modelo");
        $this->db->select("a.va_costo_unitario");
        $this->db->select("a.nu_cantidad");
        $this->db->from("t_compra_producto a");
        $this->db->join("t_prod_categoria b","a.co_categoria=b.co_categoria");
        $this->db->join("t_prod_marca c","a.co_marca=c.co_marca");
        $this->db->join("t_prod_modelo d","a.co_modelo=d.co_modelo");
        if($co_compra)
            $this->db->where('a.co_compra', $co_compra);

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
        $co_compra=$data['co_compra'];
        //$tx_control_compra=$data['tx_control_compra'];
      
        $this->db->select("a.co_compra");
        $this->db->select("a.tx_control_compra");
        $this->db->select("a.fe_compra");
        $this->db->select("a.va_compra");
        $this->db->select("a.va_cancelado");
        $this->db->select("a.va_por_pagar");
        $this->db->select("a.co_usuario");
        $this->db->select("a.co_proveedor");
        $this->db->select("b.tx_proveedor");
        $this->db->from("t_compra a");
        $this->db->join("t_proveedor b","b.co_proveedor=a.co_proveedor");
        if($co_compra)
            $this->db->where('a.co_compra', $co_compra);
        //if($tx_control_compra)
          //  $this->db->where('tx_control_compra', $tx_control_compra);

        $Boards = $this->db->get();
      
        if($Boards->num_rows()>0)
        {
           $data = $Boards->result();
           return $data;
        }
        else
           return false;       
    }  
    function buscarCompra($data){
        $tx_control_compra=$data['tx_control_compra'];
      
        $this->db->select("co_compra");
        $this->db->from("t_compra");
        if($tx_control_compra)
            $this->db->where('tx_control_compra', $tx_control_compra);

        $Boards = $this->db->get();
      
        if($Boards->num_rows()>0)
        {
           foreach($Boards->result() as $row)
            {
               $co_compra=$row->co_compra; 
            } 
            return $co_compra;   
        }
        else
           return false;       
    }   
    function ingresar($data){
        $fe_compra=$data['fe_compra'];

       $sql="SELECT `AUTO_INCREMENT` as co_compra
              FROM  INFORMATION_SCHEMA.TABLES
              WHERE TABLE_SCHEMA = 'adysgem'
              AND   TABLE_NAME   = 't_compra'";
        $Boards = $this->db->query($sql);
        foreach($Boards->result() as $row)
        {
           $co_compra=$row->co_compra; 
        } 
        //die($co_compra);
        ///////////////////////////////////////////////

        $data = array(       
             'co_proveedor' => $data['co_proveedor'],
             'tx_control_compra' => $data['tx_control_compra'],
             'fe_compra' => $fe_compra,
             'co_usuario' => $data['co_usuario'],
             'co_empresa' => $data['co_empresa']
        );        
        
        $this->db->insert('t_compra', $data);
        //echo "Aqui. ".$this->db->last_query();        
        //die();
        //$data['co_compra']=$co_compra;
        //$this->listar($data);  
        return $co_compra;  
        
        
    }

    function actualizar($data){
    
        $co_compra=$data['co_compra'];

        $data = array(       
             'tx_control_compra' => $data['tx_control_compra'],
             'co_proveedor' => $data['co_proveedor'],
             'fe_compra' => $data['fe_compra'],
             'va_compra' => $data['va_compra'],
             'va_cancelado' => $data['va_cancelado'],
             'va_por_pagar' => $data['va_por_pagar']
        ); 

        $this->db->where('co_compra', $co_compra);
        return $this->db->update('t_compra', $data);
      
    }
    function eliminar($data){
    
        $co_proveedor=$data['co_proveedor'];
      
        $this->db->where('co_proveedor', $co_proveedor);

        return $this->db->delete('t_proveedor');         
      
    } 
    function ingresarProducto($data){
        
        $sql="SELECT `AUTO_INCREMENT` as co_compra_producto
              FROM  INFORMATION_SCHEMA.TABLES
              WHERE TABLE_SCHEMA = 'adysgem'
              AND   TABLE_NAME   = 't_compra_producto'";
        $Boards = $this->db->query($sql);
        foreach($Boards->result() as $row)
        {
           $co_compra_producto=$row->co_compra_producto; 
        } 
        ///////////////////////////////////////////////

        $nu_cantidad=$data['nu_cantidad'];
        $va_costo_unitario=$data['va_costo_unitario'];
        $co_almacen=$data['co_almacen'];
        

        $data = array(       
             'co_compra' => $data['co_compra'],
             'co_categoria' => $data['co_categoria'],
             'co_marca' => $data['co_marca'],
             'co_modelo' => $data['co_modelo'],
             'va_costo_unitario' => $va_costo_unitario,
             'nu_cantidad' => $nu_cantidad
        );        
        
        $this->db->insert('t_compra_producto', $data);

        ///////////////INVENTARIO///////////////////////
        
        for($i=0;$i<$nu_cantidad;$i++)
        {
            $data = array(       
             'co_compra_producto' => $co_compra_producto,
             'co_almacen' => $co_almacen,
             'va_costo' => $va_costo_unitario,
             'in_estado' => 1
            );        
            
            $this->db->insert('t_inventario', $data);
        }
        return true;
        
        
    }


	
}

?>