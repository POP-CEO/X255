<?php
namespace System\Http;

class Request{
/**
 * Url
 *
 * @var string
 */
  private $url; 
  /**
   * Base Url
   *
   * @var string
   */
  private $baseUrl; 
 /**
 * Prepare Url
 *
 * @return void
 */
  public function prepareUrl()
  {
    $script=dirname($this->Server('SCRIPT_NAME'));

    $requestUrl=$this->Server('REQUEST_URI');

    if(strpos($requestUrl,'?') ==true){
       list($requestUrl,$query)=explode('?',$requestUrl);

    }
   
    $this->url= rtrim(preg_replace('#^'.$script.'#','',$requestUrl));
    $this->baseUrl=$this->Server('REQUEST_SCHEME').'://'.$this->Server('HTTP_HOST').$script.'/';
  }
 /**
 * Get Value from $_SERVER By the Given Key
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
  public function Server($key,$default=null)
  {
return isset($_SERVER[$key]) ? $_SERVER[$key] : $default ;  
  }
 /**
 * Get Only Relative url (Clean URL)
 *
 * @return string
 */
  public function  url()
  {
 return $this->url;
  }

 /**
 * GET Value From $_GET by The Given Key 
 *
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
  public function get($key,$default=null)
  {
    return isset($_GET[$key]) ? $_GET[$key] : $default;
  }
  

 /**
 * GET Value From $_POST by The Given Key 
 *
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
  public function post($key,$default=null)
  {
    return isset($_POST[$key]) ? $_POST[$key] : $default;
  }

 /**
 * GET Current Request Method
 *
 * @return String
 */
  public function method()
  {
  return $this->Server('REQUEST_METHOD');
  }
 /**
 * GET Full url of the script
 *
 * @return String
 */
 public function baseUrl()
 {
 return $this->baseUrl;
 } 
}