<?php
namespace System;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
abstract  class Controllers 
{
   /**
    * Application Object 
    * 
    * @var \System\Application
    */ 
   protected $app;
   /**
    * Error 
    *
    * @var array
    */
   protected $error=[];   
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
    
}
