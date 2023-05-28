<?php

use Routes\Route;

require '../vendor/autoload.php';

define("VIEWS",dirname(__DIR__).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR);

$router = new Route();

/**
 * Route for a  student
 */
$router->map('GET', '/', 'Controllers\StudentControllers#welcome' );
$router->map('GET', '/Gestion/etudiant', 'Controllers\StudentControllers#index' );
$router->map('GET', '/Gestion/etudiant/create', 'Controllers\StudentControllers#create','create_student' );
$router->map('POST', '/Gestion/etudiant/create', 'Controllers\StudentControllers#store', 'new_student');
$router->map('GET', '/Gestion/etudiant/delete/[i:id]', 'Controllers\StudentControllers#remove','delete_student');
$router->map('POST', '/Gestion/etudiant/edit/[i:id]', 'Controllers\StudentControllers#update','update_student');
$router->map('GET', '/Gestion/etudiant/edit/[i:id]', 'Controllers\StudentControllers#edit','edit_student');

/**
 * Route for a teacher
 */
$router->map('GET', '/Gestion/professeur', 'Controllers\TeacherController#index' );
$router->map('GET', '/Gestion/professeur/create', 'Controllers\TeacherController#create');
$router->map('POST', '/Gestion/professeur/create', 'Controllers\TeacherController#store');
$router->map('GET', '/Gestion/professeur/delete/[i:id]', 'Controllers\TeacherController#remove');
$router->map('POST', '/Gestion/professeur/edit/[i:id]', 'Controllers\TeacherController#update');
$router->map('GET', '/Gestion/professeur/edit/[i:id]', 'Controllers\TeacherController#edit');
$router->run();


