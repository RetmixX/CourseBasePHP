<?php

namespace App\View;

class View{
    private $tempatePath;

    public function __construct($templatePath)
    {
        $this->tempatePath = $templatePath;
    }

    public function renderHTML($templateName, $vars=[], $statusCode = 200){
        http_response_code($statusCode);
        extract($vars);
        ob_start();
        include $this->tempatePath."/".$templateName;
        $buffer = ob_get_contents();
        ob_end_clean();

        if (!empty($buffer)) echo $buffer;

        else echo "Ошибка рендера!";
    }
}
