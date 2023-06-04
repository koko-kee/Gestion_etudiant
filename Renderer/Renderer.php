<?php

namespace Renderer;

class Renderer
{

    public static function  view($viewPath,$params = null)
    {
        ob_start();
        require dirname(__DIR__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$viewPath.'.php';
        $content = ob_get_contents();
        require dirname(__DIR__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR .'Layout.php';
    }

}
