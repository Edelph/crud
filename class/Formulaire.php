<?php
namespace app;

class Formulaire
{
    private $data;
   
    public function __construct(?array $data = array())
    {
        $this->data = $data; 
    }
 
    private function getValue(string $name)
    {
        return isset($this->data[$name])? $this->data[$name] : null;
    }

    public function input(string $name, string $label):string
    {
        $value = " value=\"". $this->getValue($name). "\"";

        return <<<HTML
        <div class="form-group">
            <label for="$name">$label</label>
            <input type='text' $value name="$name" id="$name" class = 'form-control'>
        </div> 
HTML;
    }

    public function putBtn(string $type, string $color, string $content)
    {
        return <<< HTML
            <button type="$type" class="btn btn-$color">
                $content
            </button>
HTML;
    }


}