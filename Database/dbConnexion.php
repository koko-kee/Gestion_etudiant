<?php

namespace Database;

use PDO;

abstract class dbConnexion extends PDO
{
 
    private $host = "localhost";
    private $dbname = "gestion_ecole";
    private $password = "";
    private $username = "root";
    private  $pdo = null ;


    public function __construct()
    {
        $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }


    protected function getPDO()
    {

        return $this->pdo;
    }

}