<?php
require "vendor/autoload.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$altorouter = new AltoRouter();

$altorouter->map('GET','/index.php','public/view/home.php','home');
$altorouter->map('GET','/single','public/view/single.php','single');

$match = $altorouter->match();

ob_start();

require $match['target'];
    
$content = ob_get_clean();

require "style/default/default.php";
