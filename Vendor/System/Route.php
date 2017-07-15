<?php
namespace System;

class Route
{
/**
 * System\Allication
 *
 * @var [type]
 */    
private $app;

private $notFound;

private $routes=[];

public function __construct(Application $app)
{
$this->app=$app;
}
/**
 * Add New Route
 * @param String $url
 * @param String $action
 * @param String $requestMethod
 * @return void
 */
public function add($url,$action,$requestMethod='GET')
{
$route=[
'url'=>$url,
'pattern'=>$this->generatePattern($url),
'action'=>$this->getAction($action),
'Method'=>strtoupper($requestMethod)
];

$this->routes[]=$route;
}

public function generatePattern($url)
{
// /blog/post/this-is-title/2512
// /blog/:text/:id
// :text([a-zA-Z0-9-]+)
// :id(\d+)
// #^ $#
    $pattern='#^';
    $pattern.=str_replace([':text',':id'],['([a-zA-Z0-9_]+)','(\d+)'],$url);
    $pattern.='$#';
    return $pattern;
}

public function getAction($action)
{
$action=str_replace('/','\\',$action);
return strpos($action,'@') !==false ? $action : $action.'@index';
}

public function notFound($url)
{
$this->notFound=$url;

}
public function ProperRoutes()
{
foreach($this->routes as $route){

    if($this->isMatchings($route['pattern'])){  
    $arguments=$this->osn($route['pattern']);
    list($controle,$method)=explode('@',$route['action']);
return [$controle,$method,$arguments];
    }   

}
return $this->app->url->redirect($this->notFound);
}
public function isMatchings($pattern)
{
return preg_match($pattern,$this->app->request->url());

}

private function osn($pattern)
{
preg_match($pattern,$this->app->request->url(),$matches);
array_shift($matches);
return $matches;
}
}