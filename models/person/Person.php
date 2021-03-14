<?php
namespace models\person;
class Person
{
    public $table = "person";
    public $field = [
        ["name" => "firt_name" ,"alias" => "Nombres" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "last_name" ,"alias" => "Apellidos" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "email" ,"alias" => "Correo" , "required" => true, "min" => 3 , "unique" => true , "is_mail" => true],
        ["name" => "document" ,"alias" => "Documento" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "phone_number" ,"alias" => "Teléfono" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "job_title" ,"alias" => "Puesto" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "country" ,"alias" => "País" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "state" ,"alias" => "Estado" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "city" ,"alias" => "Ciudad" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
    ];

}
