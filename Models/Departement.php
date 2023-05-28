<?php

namespace Models;

use Models\Faculte;
class Departement extends Model
{

   protected $table = "departement";



   public function showFaculty($id)
   {
      $faculte = new Faculte();
      return $faculte->find($id,'CodeF');
   }
}