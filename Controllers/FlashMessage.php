<?php

namespace Controllers;

class FlashMessage 
{

    public function addErrorMessage( array $message)
    {
        $_SESSION['message'] = $message;
    }

    public function addsuccessMessage($message)
    {
        $_SESSION['flash_messages'] = $message;
    }
}
