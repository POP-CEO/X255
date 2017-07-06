<?php
namespace System;

abstract  class Model
{
   /**
    * Application Object 
    * 
    * @var \System\Application
    */ 
   protected $app;
    
    /**
     * Construct Function 
     * 
     * @param \System\Application $app 
     */
    public function __construct(Application $app) {
        $this->app=$app;
    }
    
    public function  __get($key)
    {
        return  $this->app->get($key);
    }
    /**
     * Call Databases Method dynamically
     * 
     * @param String $method
     * @param Array $Arg
     * @return Mixed
     */
    public function __call($method, $arg) {
       return call_user_func_array([$this->app->db,$method], $arg);
    }
}
