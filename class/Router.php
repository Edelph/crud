<?php 
namespace app;

use AltoRouter;

class Router
{
    private $AltoRouter;



    public function __construct()
    {
        $this->AltoRouter = new AltoRouter();

    }

    public function get(string $url=null, string $path, ?string $name = null):self
    {
        $this->AltoRouter->map('GET',$url,$path,$name);

        return $this;
    }

    public function run()
    {
        $match = $this->AltoRouter->match();
        $params = $match['params'];
        $view = "public/". $match['target'] . ".php";
        $Router = $this;

            ob_start();
            require $view ;       
            $content = ob_get_clean(); 
            require "style/default/default.php";     
    }

    public function Url(string $name, array $params = [])
    {
      return $this->AltoRouter->generate($name, $params);
    }

}