<?php

namespace Controllers;

use Controllers\validations\validation;
use Models\Departement;
use Models\Faculte;

class departementController extends Controller
{
    
    protected $departement ;
    protected $faculte;

    public function __construct()
    {
        $this->departement = new Departement ();
        $this->faculte = new Faculte();
    }

    public function index()
    {
        $departements = $this->departement->all();
        return $this->View('Departement/index',compact('departements'));
    }

    public function create()
    {
        $facultes = $this->faculte->all(); 
        return $this->View('Departement/create',compact('facultes'));
    }


    public function store()
    {

        $validate = new validation($_POST,[

            "Nom" => ["min:2","required"],
            "Capacite" => ["required"]
        ]);
        
        if(!$validate->validate()){
            header('location:/Gestion/departement/create');
            exit();
        }
        $this->departement->create($_POST);
        header('location:/Gestion/departement/create');
    }

    public function edit(int $id)
    {
        $departement = $this->departement->find($id,'NumD');
        $facultes = $this->faculte->all(); 
        return $this->View('Departement/edit',compact('departement','facultes'));
    }

    public function update(int $id)
    {
        $data  = $_POST;
        $validate = new validation($data,[
            
            "Nom" => ["min:2","required"],
            "Capacite" => ["required"]
        ]);
        
        if(!$validate->validate()){
            header("location:/Gestion/departement/edit/$id");
            exit();
        }
        $this->departement->update($data,$id,'NumD');
        header("location:/Gestion/departement/edit/$id");
    }

    public function remove(int $id)
    {
        $this->departement->delete($id,"NumD");
        header('location:/Gestion/departements');
    }
    
}