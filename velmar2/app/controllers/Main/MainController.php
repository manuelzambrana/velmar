<?php
require_once ROOT . '/velmar2/app/models/Main/MainModel.php';
require_once LIBS_ROUTE . 'Session.php';
/**
* Main controller
*/

class MainController extends Controller
{
  private $session;
  private $model;
  
  
  public function __construct()
  {
    $this->model = new MainModel();
    $this->session = new Session();
    $this->session->init();
    if($this->session->getStatus() === 1 || empty($this->session->get('email')))
    header('location: /velmar2/login');

  }
  public function exec($params)
  {
    $params = array('email' => $this->session->get('email'),'comics'=> $this->model->comics());
    

    $this->render(__CLASS__, $params);
    
    
  }

  public function logout()
  {
    $this->session->close();
    header('location: /velmar2/login');
  }
}