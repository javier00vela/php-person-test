<?php
namespace models\user;
class User
{
    public $table = "user";
    public $field = [
        ["name" => "document" ,"alias" => "Documento" ,  "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "password" , "alias" => "Contraseña" , "required" => true, "min" => 6 , "unique" => false , "is_mail" => false],
        ["name" => "person_id" , "alias" => "Documento" , "required" => false, "min" => 1 , "unique" => true , "is_mail" => false],
    ];

}
