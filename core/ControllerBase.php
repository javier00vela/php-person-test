<?php

namespace Core;

use Smarty;

class ControllerBase
{

    private $class;
    private  $smarty = null;
    private $routesAuth = [
        "Person"
    ];

    public function __construct($class)
    {
        $this->class = $class;
        \helpers\autoloader\Autoloader::initSession();
        $this->middlewareSession();
        $this->getInstanceSmarty();
        $this->getConfigSmarty();
    }


    protected function view(string $view, array $data)
    {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        return $this->smarty->display("{$view}.tpl");
    }

    private function middlewareSession()
    {
        foreach ($this->routesAuth as  $value) {
            if (empty($_SESSION["userAuth"]) && $this->class == "{$value}Controller") {
                $this->redirect("/user/login");
            }
        }
    }

    protected function redirect(string $route)
    {
        header("Location: " . DIR_URL . "{$route}");
    }

    private function getConfigSmarty()
    {
        $this->smarty->setTemplateDir("views/");
        $this->smarty->setCompileDir('cache/templates_c');
        $this->smarty->setCacheDir('cache/');
        /** Include Header Template to generla views */
        $this->smarty->assign("URL", DIR_URL);
        $this->smarty->assign("SESSION", $_SESSION);
        $this->smarty->display("templates/header.tpl");
    }

    private function getInstanceSmarty()
    {
        if (empty($this->smarty)) {
            $this->smarty = new Smarty();
        }
    }
}
