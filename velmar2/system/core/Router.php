<?php


class Router
{
    public $uri;
    public $controller;
    public $method;
    public $param;

    public function __construct()
    {
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();
    }

    public function setUri()
    {
        $this->uri = explode('/', URI);

    }

    public function setController()
    {
        $this->controller = $this->uri[2] === '' ? 'Login' : $this->uri[2];
    }

    public function setMethod()
    {
        $this->method = !empty($this->uri[3]) ? $this->uri[3] : 'exec';
    }

    public function setParam()
    {
        if(REQUEST_METHOD ==='POST'){
            $this->param = $_POST;
        }else if(REQUEST_METHOD ==='GET'){
        $this->param = !empty($this->uri[4]) ? $this->uri[4] : '';
        }
    }

    public function getUri()
    {
        return $this->uri;
    }
    public function getController()
    {
        return $this->controller;
    }
    public function getMethod()
    {
        return $this->method;
    }
    public function getParam()
    {
        return $this->param;
    }
}