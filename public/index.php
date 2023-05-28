<?php

use Routes\Route;

require '../vendor/autoload.php';

define("VIEWS",dirname(__DIR__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);

$router = new Route();

/**
 * Route for a  student
 */
$router->map('GET', '/', 'Controllers\StudentControllers#welcome' );
$router->map('GET', '/Gestion/etudiants', 'Controllers\StudentControllers#index' );
$router->map('GET', '/Gestion/etudiant/create', 'Controllers\StudentControllers#create');
$router->map('POST', '/Gestion/etudiant/create', 'Controllers\StudentControllers#store');
$router->map('GET', '/Gestion/etudiant/delete/[i:id]', 'Controllers\StudentControllers#remove');
$router->map('POST', '/Gestion/etudiant/edit/[i:id]', 'Controllers\StudentControllers#update');
$router->map('GET', '/Gestion/etudiant/edit/[i:id]', 'Controllers\StudentControllers#edit');

/**
 * Route for a teacher
 */
$router->map('GET', '/Gestion/professeurs', 'Controllers\TeacherController#index' );
$router->map('GET', '/Gestion/professeur/create', 'Controllers\TeacherController#create');
$router->map('POST', '/Gestion/professeur/create', 'Controllers\TeacherController#store');
$router->map('GET', '/Gestion/professeur/delete/[i:id]', 'Controllers\TeacherController#remove');
$router->map('GET', '/Gestion/professeur/edit/[i:id]', 'Controllers\TeacherController#edit');
$router->map('POST', '/Gestion/professeur/edit/[i:id]', 'Controllers\TeacherController#update');

/**
 * Route for a Faculty
 */
$router->map('GET', '/Gestion/facultes', 'Controllers\FaculteController#index' );
$router->map('GET', '/Gestion/faculte/create', 'Controllers\FaculteController#create');
$router->map('POST', '/Gestion/faculte/create', 'Controllers\FaculteController#store');
$router->map('GET', '/Gestion/faculte/delete/[i:id]', 'Controllers\FaculteController#remove');
$router->map('GET', '/Gestion/faculte/edit/[i:id]', 'Controllers\FaculteController#edit');
$router->map('POST', '/Gestion/faculte/edit/[i:id]', 'Controllers\FaculteController#update');


/**
 * Route for a Module
 */
$router->map('GET', '/Gestion/modules', 'Controllers\ModuleController#index' );
$router->map('GET', '/Gestion/module/create', 'Controllers\ModuleController#create');
$router->map('POST', '/Gestion/module/create', 'Controllers\ModuleController#store');
$router->map('GET', '/Gestion/module/delete/[i:id]', 'Controllers\ModuleController#remove');
$router->map('GET', '/Gestion/module/edit/[i:id]', 'Controllers\ModuleController#edit');
$router->map('POST', '/Gestion/module/edit/[i:id]', 'Controllers\ModuleController#update');


/**
 * Route for a Departement
 */
$router->map('GET', '/Gestion/professeurs', 'Controllers\TeacherController#index' );
$router->map('GET', '/Gestion/professeur/create', 'Controllers\TeacherController#create');
$router->map('POST', '/Gestion/professeur/create', 'Controllers\TeacherController#store');
$router->map('GET', '/Gestion/professeur/delete/[i:id]', 'Controllers\TeacherController#remove');
$router->map('GET', '/Gestion/professeur/edit/[i:id]', 'Controllers\TeacherController#edit');
$router->map('POST', '/Gestion/professeur/edit/[i:id]', 'Controllers\TeacherController#update');


$router->run();


