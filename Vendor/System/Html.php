<?php
namespace System;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Html
{
   /**
    * Application Object 
    * 
    * @var \System\Application
    */ 
   protected $app;

   private $title;
   private $description;
   private $keywords;

    /**
     * Construct Function 
     * 
     * @param \System\Application $app 
     */
    public function __construct(Application $app) {
        $this->app=$app;
    }
    
 public function setTitle($key)
 {
     $this->title=$title;
 }

 public function getTitle()
 {
    return $this->title;
 }

  public function setdescription($des)
 {
     $this->description=$description;
 }

 public function getdescription()
 {
    return $this->description;
 }

  public function setkeyword($keywords)
 {
     $this->keywords=$keywords;
 }

 public function getkeyword()
 {
    return $this->keywords;
 }    
}
