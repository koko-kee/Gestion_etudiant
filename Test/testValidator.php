<?php
namespace Test;

class Validation 
{
    private $data;
    private $options;
    private $errors = array();

    public function __construct(array $data, array $options = null)
    {
        $this->data = $data;
        $this->options = $options;
    }

    public function validate()
    {
        foreach ($this->data as $postKey => $postValue) {
            foreach ($this->options as $key => $rules) {
                if ($postKey == $key) {
                    foreach ($rules as $rule) {
                        if ($rule == "required") {
                            $this->required($postValue, $postKey);
                        } else {
                            $this->min_max($rule,$postValue,$postKey);
                        }
                    }
                }
            }
        }

        if (empty($this->errors)) {

            return true;

       } else {

            $this->flash->addErrorMessage($this->errors);
       }
    }

    public function required($value, $key)
    {
        if (empty($value)) {
            $lower = strtolower($key);
            $this->errors[$key] = "Le champ $lower est requis";
        }
    }

    public function min_max($rule,$postValue,$postKey)
    {
        $var = explode(":", $rule);
        if ($var[0] == "min") {
            $count = strlen($postValue);
            if ($count < (int)$var[1]) {
                $this->errors[$postKey] = "Cette chaîne est trop courte. Elle doit avoir au minimum $var[1] caractères";
            }
        }else{
            $count = strlen($postValue);
            if ($count > (int)$var[1]) {
                $this->errors[$postKey] = "Cette chaîne est trop long. Elle doit avoir au maximum $var[1] caractères";
            }
        }
    }
}


$datas = [
    "Nom" => "Koneoooooo",
    "Prenom" => "Mo",
    "Adresse" => ""
];

$validation = new Validation($datas, [
    "Nom" => ["required","max:10"],
    "Prenom" => ["required","min:5"],
    "Adresse" => ["required"],
]);
$validation->validate();