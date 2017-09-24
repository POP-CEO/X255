<?php
namespace System;

use system\Application;
 
class Url
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
    

    public function link($path)
    {
        return $this->app->request->baseUrl().trim($path,'/');
    }
    

    public function redirect($path)
    {
        header('location:'.$this->link($path));
    }


}
