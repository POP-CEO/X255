<?php
namespace App;

use System\Application;

$app=Application::getInstans();

$app->route->add('/','Home');
$app->route->add('/logout','Logout');
$app->route->notFound('/404');
$app->route->add('/404','NotFound');
