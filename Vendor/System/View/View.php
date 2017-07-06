<?php
namespace System\View;

use System\File;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class View implements ViewInterface 
{
    /**
     * File Object
     * 
     * @var \System\File 
     */
    private $file;
    /**
     * View Path
     * 
     * @var String 
     */
    private $viewPath;
    /**
     * Passed Data Variables To the View Path
     * 
     * @var array 
     */
    private $data=[];
    /**
     * The Output From the View File
     * 
     * @var string 
     */
    private $output;
    /**
     * Construct Function
     * 
     * @param \System\View\File $file
     * @param type $viewPath
     * @param array $data
     */
    public function __construct(File $file,$viewPath,array $data)
    {
        $this->file=$file;
        $this->preparePath($viewPath);
        $this->data=$data;
    }
    /**
     * Prepare View Path
     * 
     * @param type $viewPath
     * @return  void
     */
    private function preparePath($viewPath)
    {
     $relativeViewPath='App/Views/'.$viewPath.'.php';

     $this->viewPath = $this->file->to($relativeViewPath); 

         if(!$this->viewFileExists($relativeViewPath))
         {
             
             die("<b>This File Is Not </b>"." ".$viewPath);
         }
    }
    /**
     * Determine If the View file exists
     * 
     * @return Bool 
     */
    private function viewFileExists($viewPath)
    {
        return $this->file->exists($viewPath);
    }
    /**
     * {@inherDoc}
     */
    public function getOutput()
    {
        if(is_null($this->output)){
        extract($this->data);
        ob_start();
        require $this->viewPath;
        $this->output= ob_get_clean();
        }
        return $this->output;
                }
     /**
     * Convert the view object to String in Printing
     * 
     * @return String
     */
    public function __toString() {
        return $this->getOutput();  
    }

}