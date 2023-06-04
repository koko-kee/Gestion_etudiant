<?php

namespace Models;

use PDO;
use Database\dbConnexion;



abstract class Model   extends dbConnexion
{


    protected $table;
    private $per_page = 5;
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

    public function Paginate($perPage, $index)
    {
        $this->per_page = $perPage;
        if(!is_null($index)){
            $offset = ($index - 1) * $perPage;
            return $this->requette("SELECT * FROM {$this->table} LIMIT $perPage OFFSET $offset", null);
        }
        return $this->requette("SELECT * FROM {$this->table} LIMIT $perPage",null);
    }


    public function count()
    {
        $stmt = $this->getPDO()->prepare("SELECT count(*) FROM {$this->table}");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_NUM);
        if ($result) {
            return $result[0]; 
        }
        return 0; 
    }


    
    public function getTotalPages()
    {
        $count = $this->count();
        return  ceil($count / $this->per_page);
    }


    public function link(string $routes)
    {
        $link = '
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>';
                
        for($i = 1; $i <= $this->getTotalPages(); $i++) {
            $link .= '
                <li class="page-item"><a class="page-link" href="'.$routes .'/page/' . $i . '">' . $i . '</a></li>';
        }
        $link .= '
               <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>';
        
        return $link;
    }
    

}