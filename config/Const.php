<?php

/* DB Const Defined */

if(!defined('DB_DSN')){
    define('DB_DSN',"mysql:host=localhost;dbname=person_php");
}

if(!defined('DB_USER')){
    define('DB_USER',"root");
}

if(!defined('DB_PASSWORD')){
    define('DB_PASSWORD',"");
}


/* General Const */

if(!defined('NAME_PROJECT')){
    define('NAME_PROJECT',"php-person-test");
}


if(!defined('DIR_URL')){
    define('DIR_URL',"http://localhost/".NAME_PROJECT);
}


/* HTTP Const */

if(!defined('GET')){
    define('GET',"GET");
}

if(!defined('POST')){
    define('POST',"POST");
}

?>