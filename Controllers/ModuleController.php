<?php
namespace Controllers;

use Models\Module;
use Controllers\validations\validation;

class ModuleController extends Controller
{

    protected $module ;

    public function __construct()
    {
        $this->module = new Module();
    }

    public function index()
    {
        $modules = $this->module->all();
        return $this->View('Module/index',compact('modules'));
    }

    public function create()
    {

        return $this->View('Module/create');
    }


    public function store()
    {

        $validate = new validation($_POST,[

            "Nom" => ["min:2","required"],
            "description" => ["min:10","required"]
        ]);
        
        if(!$validate->validate()){
            header('location:/Gestion/module/create');
            exit();
        }
        $this->module->create($_POST);
        header('location:/Gestion/module/create');
    }

    public function edit(int $id)
    {
        $module = $this->module->find($id,'CodeM');
        return $this->View('Module/edit',compact('module'));
    }

    public function update(int $id)
    {
        $data  = $_POST;
        $validate = new validation($data,[
            
            "Nom" => ["min:2","required"],
            "description" => ["min:10","required"]
        ]);
        
        if(!$validate->validate()){
            header("location:/Gestion/module/edit/$id");
            exit();
        }
        $this->module->update($data,$id,'CodeM');
        header("location:/Gestion/module/edit/$id");
    }

    public function remove(int $id)
    {
        $this->module->delete($id,"CodeM");
        header('location:/Gestion/modules');
    }
}