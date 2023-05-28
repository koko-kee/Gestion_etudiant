<?php

namespace Controllers;

use Models\Teacher;

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

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

}