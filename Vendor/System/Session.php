<?php
namespace System;

class Session{
Private $app;

public function __construct(Application $app)
{
    $this->app=$app;
} 
/**
 * Start Session
 *
 * @return void
 */
public function start()
{
    ini_set('session.use_only_cookies',1);
    if(! session_id()){
       session_start(); 
    }

}
/**
 * Set New value to Session
 *
 * @param string $key
 * @param mixed $value
 * @return void
 */
public function set($key,$value)
{
$_SESSION[$key]=$value;
}
/**
 * GET value Frome Session by the given Key
 *
 * @param string $key
 * @param null $default
 * @return mixed
 */
public function get($key,$default=null)
{
return isset($_SESSION[$key]) ? $_SESSION[$key] :$default;
}
/**
 * Determine if the Session Has Given Key
 *
 * @param string $key
 * @return bool
 */
public function has($key)
{
   return isset($_SESSION[$key]); 
}
/**
 * Remove Session
 *
 * @param string $key
 * @return void
 */
public function remove($key)
{
    unset($_SESSION[$key]);
}
/**
 * return Session Value and Remove Session
 *
 * @param string $key
 * @return mixed
 */

public function pull($key)
{
    $value=$this->get($key);
    $this->remove($key);
    return $value;
}
/**
 * Return all Session on App
 *
 * @return array
 */
public function all()
{
return $_SESSION;
}
/**
 * Destroy Session
 *
 * @return void
 */
public function destroy()
{
session_destroy();
unset($_SESSION);
}
} 