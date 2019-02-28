<?php
/**
 * Clase  para adminsitrar sesiones
 */
class Session
{
  /**
   * Inicializa la sesión
   */
  public function init()
  {
    session_start();
  }
  /**
   * Agrega un elemento a la sesión
   *  $key la llave del array de sesión
   * $value el valor para el elemento de la sesión
   */
  public function add($key, $value)
  {
    $_SESSION[$key] = $value;
  }
  /**
   * Retorna un elemento a la sesión
   * 
   * 
   */
  public function get($key)
  {
    return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
  }
  /**
   * Retorna todos los valores del array de sesión
   *
   */
  public function getAll()
  {
    return $_SESSION;
  }
  /**
   * Remueve un elemento de la sesión
   * 
   */
  public function remove($key)
  {
    if(!empty($_SESSION[$key]))
      unset($_SESSION[$key]);
  }
  /**
   * Cierra la sesión eliminando los valores
   */
  public function close()
  {
    session_unset();
    session_destroy();
  }
  //  el estatus de la sesión
   
  public function getStatus()
  {
    return session_status();
  }
}