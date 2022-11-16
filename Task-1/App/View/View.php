<?php

namespace App\View;

class View{
    private $tempatePath;
    private $extractVar = [];

    public function __construct($templatePath)
    {
        $this->tempatePath = $templatePath;
    }

    public function setVar($name, $value){
        $this->extractVar[$name] = $value;
    }

    public function renderHTML($templateName, $vars=[], $statusCode = 200){
        http_response_code($statusCode);
        extract($this->extractVar);
        extract($vars);
        ob_start();
        include $this->tempatePath."/".$templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        if (!empty($buffer)) echo $buffer;

        else echo "Ошибка рендера!";
    }
}
