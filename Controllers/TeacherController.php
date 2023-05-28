<?php

namespace Controllers;

use Models\Teacher;
use Controllers\validations\validation;

class TeacherController extends Controller
{

    private $teacher ;

    public function __construct()
    {
        $this->teacher = new Teacher();
    }


    public function index() 
    {
        $teachers = $this->teacher->all();
        return  $this->View('Teachers/index',compact('teachers'));
    }

    public function create()
    {
        return  $this->View('Teachers/create');
    }

    public function store()
    {

        $validate = new validation($_POST,[
            "Nom" => ["min:2","required"],
            "Prenom" => ["min:2","required"],
            "Naissance" => ["required"],
            "Sexe" => ["required"],
            "Grade" => ["required"],
            "Salaire" => ["required"],
            "Prime" => ["required"]
        ]);
        
        if(!$validate->validate()){
            header('location:/Gestion/professeur/create');
            exit();
        }
        $this->teacher->create($_POST);
        header('location:/Gestion/professeur/create');
    }

    public function edit(int $id)
    {
        $teacher = $this->teacher->find($id,'IDP');
        return  $this->View('Teachers/edit',compact('teacher'));
    }

    public function update(int $id)
    {
          
        $validate = new validation($_POST,[
            "Nom" => ["min:2","required"],
            "Prenom" => ["min:2","required"],
            "Naissance" => ["required"],
            "Sexe" => ["required"],
            "Grade" => ["required"],
            "Salaire" => ["required"],
            "Prime" => ["required"]
        ]);
        
        if(!$validate->validate()){
            header("location:/Gestion/professeur/edit/$id");
            exit();
        }
        $this->teacher->update($_POST,$id,"IDP");
        header("location:/Gestion/professeur/edit/$id");
    }

    public function remove(int $id)
    {
        $this->teacher->delete($id,"IDP");
        header('location:/Gestion/professeurs');
    }

}