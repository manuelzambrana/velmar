<?php



class MainModel extends Model
{

    private $nomPro;
    private $descripcion;
    private $imagen;
    private $idPro;

    public function __contruct()
    {
        parent::__construct();
    }

    public function getNombre(){
        return $this->nomPro;
    }

    public function comics()
    {
        $sql= "SELECT * FROM productos";
           
        $productos= $this->db->fetchAll($sql,$productos=[],PDO::FETCH_ASSOC);
      
    
       return $productos;
        
	
 
    }

}
