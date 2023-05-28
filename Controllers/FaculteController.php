<?php
namespace Controllers;

use Models\Faculte;
use Controllers\validations\validation;

class FaculteController extends Controller
{

    protected $faculte ;

    public function __construct()
    {
        $this->faculte = new Faculte();
    }

    public function index()
    {
        $facultes = $this->faculte->all();
        return $this->View('Faculte/index',compact('facultes'));
    }

    public function create()
    {
        return $this->View('Faculte/create');
    }


    public function store()
    {

        $validate = new validation($_POST,[

            "Nom" => ["min:2","required"],
            "Description" => ["min:10","required"]
        ]);
        
        if(!$validate->validate()){
            header('location:/Gestion/faculte/create');
            exit();
        }
        $this->faculte->create($_POST);
        header('location:/Gestion/faculte/create');
    }

    public function edit(int $id)
    {
        $faculte = $this->faculte->find($id,'CodeF');
        return $this->View('Faculte/edit',compact('faculte'));
    }

    public function update(int $id)
    {
        $data  = $_POST;
        $validate = new validation($data,[
            
            "Nom" => ["min:2","required"],
            "description" => ["min:10","required"]
        ]);
        
        if(!$validate->validate()){
            header("location:/Gestion/faculte/edit/$id");
            exit();
        }
        $this->faculte->update($data,$id,'CodeF');
        header("location:/Gestion/faculte/edit/$id");
    }

    public function remove(int $id)
    {
        $this->faculte->delete($id,"CodeF");
        header('location:/Gestion/facultes');
    }
}