<?php

require_once "Database.php";
class Model
{

    protected $db;
    
    public function __construct()
    {
        $this->db = Database::getInstancia();
        
    }

}