<?php
namespace System;

class Loader
{
/**
 * Application 
 *
 * @var object
 */
 private $app;
/**
 * Controllers Array 
 *
 * @var array
 */
 private $controllers=[]; 
/**
 * modes Array
 *
 * @var array
 */
 private $models=[];
/**
 * Construct Function 
 *
 * @param Application $app
 */

 public function __construct(Application $app)
 {
    $this->app=$app; 
 }  

 public function action($controller,$method,$arguments)
 {
 $object=$this->controller($controller);
 return call_user_func([$object,$method],$arguments);
 }

 public function controller($cont)
 {
    $controller=$this->getControllerName($cont);
    if(! $this->hasController($controller)){
        $this->addController($controller);
    }

    return $this->getController($controller);
 }

  private function hasController($controller)
 {
    return array_key_exists($controller,$this->controllers);
 }

public function addController($controller)
 {

    $object=new $controller($this->app);
    $this->controllers[$controller]=$object;
    return $object;
 }


 private function getController($controller)
 {
  return $this->controllers[$controller];
 }

private function getControllerName($controller)
{
  $controller .='Controller';
  $controller ='App\\Controllers\\'.$controller;
  return $controller;
}
 public function model($mod)
 {
    $model=$this->getModelName($mod);
    if(! $this->hasModel($model)){
        $this->addModel($model);
    }

    return $this->getModel($model);
 }
   private function hasModel($model)
 {
    return array_key_exists($model,$this->models);
 }
 
 public function addModel($model)
 {

    $object=new $model($this->app);
    $this->models[$model]=$object;

 }
 
  private function getModel($model)
 {
  return $this->models[$model];
 }
private function getModelName($model)
{
  $model .='Model';
  $model ='App\\Models\\'.$model;
  return str_replace('/', '\\',$model);
}

}