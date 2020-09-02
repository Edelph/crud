<?php
require "vendor/autoload.php";

use app\Router;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$Router = new Router();


$Router
    ->get('/admin','view/list','admin')
    ->get('/','home','home')
    ->get('/create','view/create','create')
    ->get('/edite[i:id]','view/edit','edite')
    ->get('/delete[i:id]','view/delete','delete')
    ->get('/add','view/add','add')

 ->run();
