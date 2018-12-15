<?php
namespace System\View;

use System\Application;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ViewFactory
{
    /**
     * Application Object
     * 
     * @var \System\Application 
     */
    Private $app;
    /**
     * Construct Function
     * @param Application $app
     */
    public function __construct(Application $app)
    {
      $this->app=$app;  
    }
    /**
     * 
     * @param String $viewPath
     * @param array $data
     * @return \System\View\ViewFactory
     */
    public function render($viewPath,array $data=[])
            {
            return new View($this->app->file,$viewPath,$data);
            }
}