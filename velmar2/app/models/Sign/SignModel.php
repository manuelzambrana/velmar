<?php



class SignModel extends Model
{
    public function __contruct()
    {
        parent::__construct();
    }

    public function sigUp($email, $pwd, $username, $name)
    {
       
    $sql = "INSERT INTO usuario (usuario, password, nombre, email) VALUES ('$username', MD5('$pwd'), '$name', '$email')" ;

  
   
    return $this->db->fetch($sql);
 
     
    }

    public function verify($email,$username){
    $query= "SELECT * FROM usuario where usuario='{$username}' OR email='{$email}'";
    return $this->db->fetch($query);
   

    }
}