<?php

namespace helpers\autoloader;

class Autoloader
{

    private static $path = [
        "interfaces",
        "models",
        "config",
        "core"
    ];

    private static $dependenciesPath = "vendor/autoload.php";


    public static function initialization()
    {
        Autoloader::loaderFilesDir();
        Autoloader::loaderDependencies();
        Autoloader::loadController();
    }

    private static function loadController()
    {
        if (isset($_GET["controller"])) {
            $controllerObject = \core\ControllerFront::loadController($_GET["controller"]);
            \core\ControllerFront::dispatchAction($controllerObject);
        }
    }

    private static function loaderFilesDir()
    {
        $isSubpath = false;
        foreach (Autoloader::$path as $folder) {
            foreach (glob("{$folder}/*") as $files) {
                if (!is_file($files)) {
                    foreach (glob("{$files}/*.php") as $subfolder) {
                        require_once $subfolder;
                        $isSubpath = true;
                    }
                }
                if (!$isSubpath) {
                    require_once $files;
                }
            }
            $isSubpath = false;
        }
    }

    private static function loaderDependencies()
    {
        require_once Autoloader::$dependenciesPath;
    }
}
