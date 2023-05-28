<?php

namespace Models;

use Database\dbConnexion;

abstract class Model   extends dbConnexion
{


    protected $table;

    public function requette(string $sql, array $params = null , bool $single = true , string $etat = null)
    {
        $fetchMode = $single  ? 'fetchAll' : 'fetch';
        $methode = is_null($params) ? 'query' : 'prepare';
        $instance = $this->getPDO();
        $pdoStatement = $instance->$methode($sql); 
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, get_class($this));

        if($methode == "query"){
            return $pdoStatement-> $fetchMode();
        }else{
            $pdoStatement->execute($params);
        }
        if($etat == "CREATE"){
            $lastInsertId = $instance->lastInsertId();
            return $lastInsertId;
        }elseif($etat == "UPDATE"){
            return true;
        }elseif($etat == "DELETE"){
            return true;
        }else{
            return $pdoStatement-> $fetchMode();
        }
    }


    public function create( array $data)
    {
        $values = [];
        $columns = [];

        foreach($data as $key => $value){

            array_push($columns,$key);

            if($key == "password"){
                array_push($values,password_hash($value,PASSWORD_DEFAULT));
            }
            array_push($values,$value);            
        }


        $placeholder = implode(" ," , array_fill(0 , count($values),"?"));
        $column = implode(" ,",$columns);

        return $this->requette("INSERT INTO {$this->table} ($column) VALUES ($placeholder)",$values,false,'CREATE');
    }


    public function update(array $data , int $id , string $id_name = "id" )
    {
        $values = [];
        $columns = [];

        foreach ($data as $key => $value) {
           
            array_push($values,$value);
            $columns [] = "$key = ?";
        }

        array_push($values,$id);

        $column  = implode(" ,",$columns);
        return $this->requette("UPDATE {$this->table} SET $column WHERE $id_name = ?",$values,false,"UPDATE");
    }



    public function delete(int $id , string $id_name = "id")
    {
        return $this->requette("DELETE FROM {$this->table} WHERE $id_name = ?",[$id],false,"DELETE");
    }


    public function all()
    {
        return $this->requette("SELECT * FROM {$this->table}",null);
    }

    public function find(int $id , string $name = 'id')
    {
        return $this->requette("SELECT * FROM {$this->table} WHERE $name = ? ",[$id],false);
    }

    public function findOrFail(int $id , string $name = 'id')
    {
        $result = $this->requette("SELECT $name FROM {$this->table} WHERE $name = ? ",[$id],false);
        if(empty($result)){
            require VIEWS."Error/404.php";
        }
        
    }

}