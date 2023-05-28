<?php

namespace Controllers\validations;
use controllers\controller;
use Controllers\FlashMessage;

class validation extends Controller
{
    private $data;
    private $options;

    public function __construct(array $data, array $options = null)
    {
        parent::__construct();
        $this->data = $data;
        $this->options = $options;
    }

    public function validate()
    {
          $errors = [];

          foreach ($this->data as $postKey => $postValue) {

               foreach ($this->options as $key => $rules) {

                   if ($postKey == $key) {

                         foreach ($rules as $rule) {
                           if ($rule == "required") {

                              if (empty($postValue)) {

                                   $lower = strtolower($postKey);
                                   $errors[$key] = "Le champ $lower est requis";
                              }
                           } else {

                              $var = explode(":", $rule);

                              if ($var[0] == "min") {

                                   $count = strlen($postValue);

                                   if ($count < (int)$var[1]) {

                                        $errors[$postKey] = "Cette chaîne est trop courte. Elle doit avoir au minimum $var[1] caracteres";
                                   }
                              }
                         }
                       }
                   }
               }
          }

          if (empty($errors)) {

               return true;

          } else {

               $this->flash->addErrorMessage($errors);
          }
     }

     function check_password()
     {
          if($_POST['password'] != $_POST['confirm_password']){

               $errors['password'] = "Les valeurs ne correspondent pas.";
          }

          if(empty($errors)){

               return true;
               
          }else{

               $this->flash->addErrorMessage($errors);
          }


     }
}