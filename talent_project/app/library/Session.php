<?php
/**
 * Author: Ing. Alexis Yánez
 * Admin sessions
 */
class Session
{
  /**
   * Session start
   */
  public function init()
  {
    session_start();
  }

  /**
   * Add element to session
   * @param string $key of array session
   * @param string $value for element of session
   */
  public function add($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  /**
   * Return element of session
   * @param string $key of array session
   * @return string value of array session if exist
   */
  public function get($key)
  {
    return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
  }

  /**
   * Return all values of session 
   * @return array of session complete
   */
  public function getAll()
  {
    return $_SESSION;
  }

  /**
   * Remove a element of session
   * @param string $key of the array session
   */
  public function remove($key)
  {
    if(!empty($_SESSION[$key]))
      unset($_SESSION[$key]);
  }

  /**
   * Close session and destroy values
   */
  public function close()
  {
    session_unset();
    session_destroy();
  }

  /**
   * Return the session status
   * @return string session status
   */
  public function getStatus()
  {
    return session_status();
  }

}