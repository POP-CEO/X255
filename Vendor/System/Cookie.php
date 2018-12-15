<?php
namespace System;

class Cookie{
Private $app;

public function __construct(Application $app)
{
    $this->app=$app;
} 

/**
 * Set New value to Cookie
 *
 * @param string $key
 * @param mixed $value
 * @param int $mintes
 * @return void
 */
public function set($key,$value,$hours=1800)
{
setcookie($key,$value,time()+$hours * 3600,'','',false,true);
}
/**
 * GET value FromeCookie by the given Key
 *
 * @param string $key
 * @param null $default
 * @return mixed
 */
public function get($key,$default=null)
{
return isset($_COOKIE[$key]) ? $_COOKIE[$key] :$default;
}

/**
 * Determine if the Cookie Has Given Key
 *
 * @param string $key
 * @return bool
 */
public function has($key)
{
   return isset($_COOKIE[$key]); 
}
/**
 * Remove Cookie
 *
 * @param string $key
 * @return void
 */
public function remove($key)
{
setcookie($key,null,-1);
    
    unset($_COOKIE[$key]);
}

/**
 * Return all Cookie on App
 *
 * @return array
 */
public function all()
{
return $_COOKIE;
}
/**
 * Destroy Session
 *
 * @return void
 */
public function destroy()
{
foreach(array_keys($this->all()) as $key){
    $this->remove($key);
}
unset($_COOKIE);
}
} 