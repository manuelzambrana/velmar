<?php


abstract class Controller
{
    private $view;
   

    public function __construct()
    {
            
    }

    //todas las clases hijas deben tener obligatoriamente el metodo exec
    //y cada una lo ejecutara a su manera
    abstract public function exec($param);

    protected function render($controller_name='', $params=array())
    {
        $this->view = new View($controller_name, $params);

    }
   
}