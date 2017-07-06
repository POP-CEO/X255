<?php
namespace System\View;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface ViewInterface
{
    /**
     * Get the View Output
     * 
     * @return string
     */
    public function getOutput();
    
    /**
     * Convert the view object to String in Printing
     * 
     * @return String
     */
    
    public function __toString();
}