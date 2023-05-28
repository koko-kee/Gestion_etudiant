<?php

namespace Controllers;

class Controller
{


    protected $flash;

    public function __construct()
    {
        

        if (session_status() === PHP_SESSION_NONE){
            
            session_start();
        }
        
        $this->flash = new FlashMessage();

    }

    public  function  View ($path , $params = null)
    {
        ob_start();
        require VIEWS. $path .".php";
        $content = ob_get_clean();
        require VIEWS . "Layout.php";
    }

    
}