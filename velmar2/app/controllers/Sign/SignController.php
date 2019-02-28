<?php

require_once ROOT . '/velmar2/app/models/Sign/SignModel.php';
require_once LIBS_ROUTE . 'Session.php';


class SignController extends Controller
{

    private $model;
    private $session;

    public function __construct()
    {
        $this->model = new SignModel();
        $this->session = new Session();



    }

    public function exec($param)
    {
        $this->render(__CLASS__);
    }


public function signup($request_params){
    if($this->model->verify($request_params['email'],$request_params['username'])==true){
        echo"ya existe";
    }else{

        session_start();
        session_unset();
        session_destroy();    
    $result = $this->model->sigUp($request_params['email'] , $request_params['password'],$request_params['username'],$request_params['name']);
    header('location: /velmar2/login');
    }

}
     
     
   }
