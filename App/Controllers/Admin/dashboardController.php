<?php
namespace App\Controllers\Admin;

use System\Controllers;
use System\Database;

class dashboardController extends Controllers
{

public function index()
{
return $this->view->render('admin/dashboard');
}
    
}