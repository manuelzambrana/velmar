<?php



class LoginModel extends Model
{
    public function __contruct()
    {
        parent::__construct();
    }

    public function sigIn($email, $pwd)
    {
       
    $sql = "SELECT * FROM usuario where email ='{$email}' AND password=MD5('$pwd')";
   
    return $this->db->fetch($sql);
 
     
    }
}