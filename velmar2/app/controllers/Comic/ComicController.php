<?php


require_once ROOT . '/velmar2/app/models/Comic/ComicModel.php';
require_once LIBS_ROUTE . 'Session.php';



Class ComicController extends Controller
{
    private $session;
    private $model;
    
    
    public function __construct()
    {
      $this->model = new ComicModel();
      $this->session = new Session();
      $this->session->init();
      if($this->session->getStatus() === 1 || empty($this->session->get('email')))
      header('location: /velmar2/login');
  
    }
    public function exec($params)
    {
      echo "Por favor seleccione un comic";
      
    }
  
    public function logout()
    {
      $this->session->close();
      header('location: /velmar2/login');
    }

    public function producto($idProducto){
        
        $idProducto = array('email' => $this->session->get('email'),'producto'=> $this->model->producto($idProducto),'comentario'=>$this->model->comentario($idProducto));
        $this->render(__CLASS__, $idProducto);

    }


    public function comentario($datos){
      
        if($this->session->getStatus() === 1 || empty($this->session->get('email'))){

            header('location: /velmar2/login');
            }else{           
              
              
        
      
              $idProducto= $_POST['id'];
       
              $datos=array('comentario'=>$this->model->comentar($datos['confirmationText'],$datos['id'],$datos=$this->session->get('email'))); 

              header('location: /velmar2/comic/producto/'.$idProducto);
            }
       
        
    }



}