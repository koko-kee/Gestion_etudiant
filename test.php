<?php

$error = array();

function required($key,$value)
{
  global $error;
  if (empty($value)) {
    $lower = strtolower($key);
    $error[$key] = "Le champ $lower est requis";
  }
}

$datas = [

  "Nom" => "Kone",
  "Prenom" => "Mohamed",
  "Age" => 18,
  "Adresse" => ""

];

foreach($datas as $key => $data){
  
  required($key,$data);
}



var_dump($error);


// public function required($value ,$key)
// {
//     if(empty($value)){
//      $lower = strtolower($key);
//      return "Le champ $lower est requis";
//     }
// }

// public function min($value,$rule)
// {
//      $count = strlen($value);
//      if ($count < (int)$rule) {
//        return "Cette chaîne est trop courte. Elle doit avoir au minimum {$rule} caractères";
//      }
// }

// public function max($value,$rule)
// {
//      $count = strlen($value);
//      if ($count < (int)$rule){
//        return "Cette chaîne est trop long. Elle doit avoir au maximum {$rule} caractères";
//      }
// }