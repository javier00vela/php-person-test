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

/* ROUTES Const */

if(!defined('LOGIN_PATH')){
    define('LOGIN_PATH',"/user/login");
}

if(!defined('PANEL_PATH')){
    define('PANEL_PATH',"/person/panel");
}

if(!defined('REGISTER_PATH')){
    define('REGISTER_PATH',"/user/register");
}

/* External Routes */

if(!defined('PERSON_LIST_EXTERNAL')){
    define('PERSON_LIST_EXTERNAL',"http://www.mocky.io/v2/5d9f39263000005d005246ae");
}

if(!defined('COUNTRIES_LIST_EXTERNAL')){
    define('COUNTRIES_LIST_EXTERNAL',DIR_URL."/src/json/countries.json");
}


/* CUSTOMER REQUEST */


if(!defined('COUNTRIES_REQUEST')){
    define('COUNTRIES_REQUEST',"countries");
}

if(!defined('LIST_PERSON_REQUEST')){
    define('LIST_PERSON_REQUEST',"person");
}

if(!defined('FILTER_PERSON_REQUEST')){
    define('FILTER_PERSON_REQUEST',"person_filter");
}

if(!defined('EXIST_PERSON_REQUEST')){
    define('EXIST_PERSON_REQUEST',"person_exist");
}








?>