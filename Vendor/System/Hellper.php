<?php
use System\Application;
if (! function_exists('assets')){
    function assets($path)
    {
      $app=Application::getInstans();
        return $app->url->link('Public/'.$path);

    }
}

if (! function_exists('url')){
    function url($path)
    {
      $app=Application::getInstans();
        return $app->url->link($path);

    }
}