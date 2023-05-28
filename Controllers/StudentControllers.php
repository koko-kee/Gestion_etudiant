<?php

namespace Controllers;

use Models\Student;
use Controllers\validations\validation;
use Models\Departement;

class StudentControllers  extends Controller
{

    private $students;
    private $departement;

    public function __construct()
    {
        $this->students = new Student();
        $this->departement = new Departement();

    }

    public function welcome()
    {
        return $this->View('welcome');
    }

    public function index()
    {
        $students = $this->students->all();
        return $this->View('Etudiants/index',compact('students'));
    }

    public function create()
    {
        $departements = $this->departement->all();
        return $this->View('Etudiants/create',compact('departements'));
    }


    public function store()
    {

        $validate = new validation($_POST,[

            "Nom" => ["min:2","required"],
            "Prenom" => ["min:2","required"],
            "Adresse" => ["min:5","required"],
            "Lieu" => ["required"],
            "Naissance" => ["required"],
            "Sexe" => ["required"],
            "Diplome" => ["required"],
            "NumD" => ["required"]
        ]);
        
        if(!$validate->validate()){
            header('location:/Gestion/etudiant/create');
            exit();
        }
        $this->students->create($_POST);
        header('location:/Gestion/etudiant/create');
    }

    public function edit(int $id)
    {
        $student = $this->students->find($id,'Matricule');
        $departements = $this->departement->all();
        return $this->View('Etudiants/edit',compact('student','departements'));
    }

    public function update(int $id)
    {
        $data  = $_POST;
        $validate = new validation($data,[
            "Nom" => ["min:2","required"],
            "Prenom" => ["min:2","required"],
            "Adresse" => ["min:3","required"],
            "Lieu" => ["required"],
            "Date_de_Naissance" => ["required"],
            "Sexe" => ["required"],
            "Diplome" => ["required"],
            "NumD" => ["required"]
        ]);
        
        if(!$validate->validate()){
            header("location:/Gestion/etudiant/edit/$id");
            exit();
        }
        $this->students->update($data,$id,'Matricule');
        header("location:/Gestion/etudiant/edit/$id");
    }

    public function remove(int $id)
    {
        $this->students->delete($id,"Matricule");
        header('location:/Gestion/etudiants');
    }
}