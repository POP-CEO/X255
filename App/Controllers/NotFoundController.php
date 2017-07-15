<?php
namespace App\Controllers;

use System\Controllers;

class NotFoundController extends Controllers
{

public function index()
{
 
return $this->view->render('404');
}
    
}