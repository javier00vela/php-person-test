<?php

namespace Core;

use Smarty;
class ControllerBase 
{

    private  $smarty = null ;
    
    public function __construct()
    {
        $this->getInstanceSmarty();
        $this->getConfigSmarty();
    }


    protected function view(string $view , array $data)
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key,$value);
        }
        
        return $this->smarty->display("{$view}.tpl");
    }

    protected function redirect(string $route)
    {
       header("Location: ".DIR_URL."{$route}");
    }

    private function getConfigSmarty(){
        $this->smarty->setTemplateDir("views/");
        $this->smarty->setCompileDir('cache/templates_c');
        $this->smarty->setCacheDir('cache/');
        $this->smarty->assign("URL",DIR_URL);
    }

    private function getInstanceSmarty(){
        if(empty( $this->smarty)){
            $this->smarty = new Smarty();
        }
    }


}
