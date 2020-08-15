<?php
require "../vendor/autoload.php";

if (isset ($_GET['p'])){
    $p = $_GET['p'];
}else{
    $p = "home";
}

    ob_start();
if ($p === "home"){
    require "view/home.php";
}elseif($p === "single"){
    require "view/single.php";
}
$content = ob_get_clean();

require dirname(__DIR__)."/style/default/default.php";
