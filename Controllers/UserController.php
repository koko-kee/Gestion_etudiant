<?php

namespace Controllers;

use Models\Authentification\Auth;

class UserController extends Controller
{


    public function __construct()
    {
        
    }

    public function login()
    {
        $auth = new Auth($_POST); 
        $auth->loginUser();
    }

}