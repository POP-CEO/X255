<?php
namespace App\Controllers\Admin;

use System\Controllers;

class loginController extends Controllers
{

/**
 * Display Login Form
 *
 * @return mixed 
 */
public function index()
{
  $loginModel=$this->load->model('login');      
    if($loginModel->isLogged()){
        return $this->url->redirect('/admin');
    }
$data['errors']=$this->error;
return $this->view->render('admin/users/login',$data);
}

/**
 * Submit Login Form 
 *
 * @return mixed
 */
public function submit()
{
if($this->isValid()){
  $loginModel=$this->load->model('login');  
$loginUser=$loginModel->user();
if($this->request->post('remember')){
$this->cookie->set('login',$loginUser->code);
}else{
$this->session->set('login',$loginUser->code);
}

$json=[];
$json['Success']='Welcom Back'.$loginUser->first_name;
$json['redirect']=$this->url->link('/admin');
return $this->json($json); 
}else{
$json=[];
$json['error']=$this->error;
return $this->json($json);
}

}   

public function isValid()
{
$email=$this->request->post('email');
$password=$this->request->post('password');

if(! $email){
    $this->error[]='Please Insert Email Address';
}elseif(! filter_var($email,FILTER_VALIDATE_EMAIL)){
    $this->error[]='Please Insert Valid Email';
}

if(! $password){
    $this->error[]='Please Insert password';
}

if(! $this->error){
    $loginModel=$this->load->model('login');
    if(! $loginModel->isValidLogin($email,$password)){
        $this->error[]='Invalid Login Data';
    }
}

return empty($this->error);
}
}
