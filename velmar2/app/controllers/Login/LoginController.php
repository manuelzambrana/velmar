<?php
/**
* Login controller
*/
require_once ROOT . '/velmar2/app/models/Login/LoginModel.php';
require_once LIBS_ROUTE . 'Session.php';

class LoginController extends Controller
{
  private $model;

  private $session;
 
  public function __construct()
  {
    $this->model = new LoginModel();
    $this->session = new Session();
    $sesion=session_start();
    if (isset($_SESSION["email"])){
      header("location: /velmar2/main");
    
    }
  
  }
  public function exec($param)
  {
    $this->render(__CLASS__);
    
  }
  public function signin($request_params)
  {
    // var_dump($request_params);
    // echo $request_params;
    // var_dump($_POST);

    if($this->verify($request_params))
    {   
      return $this->renderErrorMessage('El email y contraseña no pueden estar vacios');
     
    }


   $result = $this->model->sigIn($request_params['email'] , $request_params['password']);
   if(!$result)
   {
     return $this->renderErrorMessage('El email o contraseña es incorrecto');
    
   }
   $object = (object) $result;
   
   $this->session->init();
   $this->session->add('email',$object->email);
   
   header('location: /velmar2/main');
   return $this->renderErrorMessage('');

    
    
  }

  public function verify($request_params)
  {
    return empty($request_params['email']) or empty($request_params['password']);

  }

  public function renderErrorMessage($error_message)
  {
    $params = array('error_message' => $error_message);
    $this->render(__CLASS__,$params);
  }

}