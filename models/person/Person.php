<?php
namespace models\person;
class Person
{
    public $table = "person";
    public $field = [
        ["name" => "firt_name" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "last_name" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "email" , "required" => true, "min" => 3 , "unique" => true , "is_mail" => true],
        ["name" => "document" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "phone_number" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "job_title" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "country" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "state" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
        ["name" => "city" , "required" => true, "min" => 3 , "unique" => false , "is_mail" => false],
    ];

}
