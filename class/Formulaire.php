<?php
namespace app;

class Formulaire
{
    private $data;

    public function __construct(?array $data = array())
    {
        $this->data = $data; 
    }

    private function getValue(string $name):string
    {
        return isset($this->data[$name])? $this->data[$name] : null;
    }


    public function input(string $name):string
    {
        $value = " value=\"". $this->getValue($name). "\"";
        $name = "name = \"".$name."\"";

        return "<input type='text' $value $name class = 'form-control'> ";
    }


}