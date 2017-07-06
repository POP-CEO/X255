<?php
namespace System;

class Application{
	/**
	 * Array
	 *
	 * @var private Array
	 */
private $cont=[];

/**
 * Application Object
 *
 * @var \System\Application
 */

private static $instance;

/**
 * construct function
 *
 * @param File object $file
 */

private function __construct(File $file)
{
	$this->Add_cont('file',$file);
	$this->reg();
	$this->loadhelper();
	self::$instance=$this;
}
/**
 * Get Aplication instans
 *
 * @param  $file
 * @return \System\Application
 */

public static function getInstans($file=null)
{
if(is_null(self::$instance)){
	self::$instance=new static($file);
}
return self::$instance;
}
/**
 * add key | value
 *
 * @param mixed $key
 * @param mixed $value
 */

public function Add_cont($key,$value)
{
  $this->cont[$key]=$value;

}


/**
 * autoload_register function
 *
 * @return i
 */

private function reg()
{
spl_autoload_register([$this,'load']);
}


public function load($class)
{
if(strpos($class,'App') === 0 ){
$file=$class.".php";

}else{
$file='Vendor/'.$class.".php";
}
if($this->file->exists($file)){
$this->file->getfilesRquire($file);
	}
}



public function coreClass(){
	return [
		'request'		=>'System\\Http\\Request',
		'response'		=>'System\\Http\\Response',
		'session'		=>'System\\Session',
		'cookie'		=>'System\\cookie',
		'user'			=>'App\\Controllers\\user',
		'route' 		=>'System\\Route',
		'load' 			=>'System\\Loader',
    	'view'          =>'System\\View\\ViewFactory',
         'db'           =>'System\\Database',
	     'cookie'       =>'System\\Cookie',
		  'url'         =>'System\\Url'
	];
}

public function get($key)
{
if(! $this->isSharing($key)){
if($this->isCoreAlias($key)){
	$this->Add_cont($key,$this->createNewCore($key));
	}else{
	       die('<b>'.$key.'</b> Not found aplication ');
	     }
}
return $this->cont[$key];
}


public function isSharing($key){
return isset($this->cont[$key]);
}

public function __get($key){
return $this->get($key);
}

public function isCoreAlias($key){
$coreClass=$this->coreClass();
return isset($coreClass[$key]);
 }

public function createNewCore($key){
$core=$this->coreClass();
$object=$core[$key];
return new $object($this);
}

private function loadhelper()
{
	$this->file->getfilesRquire('Vendor/System/Hellper.php');
}

 public function run()
{
	$this->session->start();
	$this->request->prepareUrl();
	$this->file->getfilesRquire('App/index.php');
	list($controller,$method,$arguments)=$this->route->ProperRoutes();
        
	$output= (string) $this->load->action($controller,$method,$arguments);
        $this->response->setOutput($output);
        $this->response->send();
}

}