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

    private function getConfigSmarty(){
        $this->smarty->setTemplateDir("views/");
        $this->smarty->setCompileDir('cache/templates_c');
        $this->smarty->setCacheDir('cache/');
    }

    private function getInstanceSmarty(){
        if(empty( $this->smarty)){
            $this->smarty = new Smarty();
        }
    }


}
