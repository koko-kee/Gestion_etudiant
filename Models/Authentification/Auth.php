<?php

namespace Models\Authentification;

use Models\Model;

class Auth  extends Model
{
    private $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function loginUser()
    {
        $user = $this->requette("SELECT * FROM utilisateur WHERE email = ?",[$this->data['email']],false);
        if($user == false){
          return null;
        }
        if(password_verify($this->data['password'],$user->password))
        {
            return $user;
        }
    }

    public function user()
    {

    }

    public function requireRole()
    {
        
    }
}