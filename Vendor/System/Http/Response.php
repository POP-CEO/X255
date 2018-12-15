<?php
namespace System\Http;

use System\Application;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Response
{
    /**
   * Application Object
   * 
   * @var \System\Application 
   */
  Private $app;
  /**
   * Contain All Header Key & value
   * 
   * @var type 
   */
  private $headers=[];
  /**
   * Contain All Containt Site
   * 
   * @var type 
   */
  private $content='';
  /**
   * Construct Function
   * @param Application $app
   */
  public function __construct(Application $app) {
    $this->app=$app;  
  }
  /**
   * Set Header Array
   * 
   * @param type $header
   * @param type $value
   */
  public function setHeader($header,$value) 
  {
      $this->headers[$header]=$value;
  }
  /**
   * Get Output Content And add to Content 
   * @param type $output
   */
  public function setOutput($output) 
  {
      $this->content=$output;
  }
  
  private function sendHeader()
    {
      foreach($this->headers as $header => $value){
            header($header.":".$value); 
            
         }
    }

  public function send()
  {
      $this->sendHeader();
      $this->sendOutput();
  }
  private function sendOutput()
  {
  echo $this->content;    
  }
}
