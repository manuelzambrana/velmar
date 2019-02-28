<?php



class ComicModel extends Model
{
    public function __contruct()
    {
        parent::__construct();
    }

    public function producto($idProducto)
    {
       
    $sql = "SELECT * FROM productos where idProducto ='{$idProducto}'";
    
   
    return $this->db->fetch($sql);
 
     
    }

    public function comentario($idProducto){
        $sql="SELECT * from comentario C inner join productos P ON P.idProducto=C.idProducto where C.idProducto = $idProducto" ;       
        return $this->db->fetchAll($sql);

    }
    public function comentar($comentario,$idProducto,$nombre){
        
        $sql= "INSERT INTO comentario (Comentario,idProducto,nombre) VALUES ('$comentario','$idProducto','$nombre') " ;
        echo $sql;
        
        return $this->db->fetch($sql);

    }
}