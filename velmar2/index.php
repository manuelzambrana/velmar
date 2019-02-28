<?php
define('BASEPATH', true);
require 'system/config.php';
require 'system/core/autoload.php';

$router = new Router();


// echo '<pre>';
// print_r($router->getUri());
// echo '</pre>';

$controller  = $router->getController();
$method = $router->getMethod();
$param = $router->getParam();

// echo 'controller :'. $controller .'</br>' ;
// echo 'metodo:'. $method .'</br>' ;
// echo 'parametro:'. $param.' </br>' ;

require PATH . "{$controller}/{$controller}Controller.php";
$controller .='Controller';


$controller  = new $controller ();
$controller ->$method($param);



