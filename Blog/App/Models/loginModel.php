<?php
namespace App\Models;

use System\Model;

class loginModel extends Model
{
/**
* Table Name 
*
* @var string
*/ 
protected $table='users';
/**
 * Login user 
 *
 * @var \StdClass
 */
protected $users;
/**
 * Determine if the given login data is valid
 * @param string $email
 * @param string $password
 * @return bool
 */
 public function isValidLogin($email,$password)
 {
    $users=$this->where('email=?',$email)->fetchs($this->table); 
    if(! $users){
        return false;
    }
    $this->users=$users;
 return password_verify($password,$users->password);
    
 }
 /**
  * Get Login user data
  *
  * @return \stdClass
  */
 public function user()
 {
     return $this->users;
 }

/**
 * Determine Wherther the user is logged in
 * @return bool
 */
public function isLogged()
{
 if($this->cookie->has('login')){
     $code=$this->cookie->get('login');
 } elseif($this->session->has('login')){
     $code=$this->session->get('login');
 }else{
     $code ='';
 }   
 $user=$this->where('code=?',$code)->fetchs($this->table);
 if (! $user){
     return false;
 }
 $this->users=$user;
} 
}
