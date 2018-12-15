<?php
namespace App;

use System\Application;

$app=Application::getInstans();
//Admin Route
$app->route->add('/admin/login','Admin/login');
$app->route->add('/admin/login/submit','Admin/login@submit','POST');

//DashBoard
$app->route->add('/admin','Admin/dashboard');
$app->route->add('Admin/dashboard','Admin/dashboard');

//Admin =>users
$app->route->add('/admin/users','Admin/users');
$app->route->add('/admin/users/add','Admin/users@add');
$app->route->add('/admin/users/submit','Admin/users@submit','POST');
$app->route->add('/admin/users/edit:id','Admin/users@edit');
$app->route->add('/admin/users/save:id','Admin/users@save','POST');
$app->route->add('/admin/users/delete:id','Admin/users@delete');

//Admin => POST
$app->route->add('/admin/posts','Admin/post');
$app->route->add('/admin/posts/add','Admin/posts@add');
$app->route->add('/admin/posts/submit','Admin/posts@submit','POST');
$app->route->add('/admin/posts/edit:id','Admin/posts@edit');
$app->route->add('/admin/posts/save:id','Admin/posts@save','POST');
$app->route->add('/admin/posts/delete:id','Admin/posts@delete');
$app->route->add('/admin/posts/:id/comments','Admin/comments');
$app->route->add('/admin/comments/edit/:id','Admin/comments@edit');
$app->route->add('/admin/comments/save/:id','Admin/comments@save','POST');
$app->route->add('/admin/comments/delete/:id','Admin/comments@delete','POST');


//Admin =>usersGroup
$app->route->add('/admin/user-groups','Admin/usersGroup');
$app->route->add('/admin/user-groups/add','Admin/usersGroup@add');
$app->route->add('/admin/user-groups/submit','Admin/usersGroup@submit','POST');
$app->route->add('/admin/user-groups/edit:id','Admin/usersGroup@edit');
$app->route->add('/admin/user-groups/save:id','Admin/usersGroup@save','POST');
$app->route->add('/admin/user-groups/delete:id','Admin/usersGroup@delete');


//Admin =>Setting
$app->route->add('/admin/settings','Admin/settings');
$app->route->add('/admin/settings/save','Admin/settings@save','POST');

//Admin =>contacts
$app->route->add('/admin/contacts','Admin/contacts');
$app->route->add('/admin/contacts/reply/:id','Admin/settings@reply','POST');
$app->route->add('/admin/contacts/send/:id','Admin/settings@send','POST');

//Admin => Categories
$app->route->add('/admin/Categories','Admin/Categories'); 
$app->route->add('/admin/Categories/add','Admin/Categories@add');
$app->route->add('/admin/Categories/submit','Admin/Categories@submit','POST');
$app->route->add('/admin/Categories/edit:id','Admin/Categories@edit');
$app->route->add('/admin/Categories/save:id','Admin/Categories@save','POST');
$app->route->add('/admin/Categories/delete:id','Admin/Categories@delete');
 
//Admin => Ads
$app->route->add('/admin/ads','Admin/ads');
$app->route->add('/admin/ads/add','Admin/ads@add');
$app->route->add('/admin/ads/submit','Admin/ads@submit','POST');
$app->route->add('/admin/ads/edit:id','Admin/ads@edit');
$app->route->add('/admin/ads/save:id','Admin/ads@save','POST');
$app->route->add('/admin/ads/delete:id','Admin/ads@delete');




$app->route->add('/','Home');
$app->route->add('/logout','Logout');
$app->route->notFound('/404');
$app->route->add('/404','NotFound');