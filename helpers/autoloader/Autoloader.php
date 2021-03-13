<?php

namespace helpers\autoloader;

class Autoloader
{

    private static $path = [
        "models",
        "config",
        "core"
    ];

    private static function loaderFiles()
    {
        foreach (Autoloader::$path as $folder) {
           
            foreach (glob("{$folder}/*") as $files) {
              
                 if (!is_file($files)) {
                    foreach (glob("{$files}/*.php") as $subfolder) {
                         require_once $subfolder;
                         return;
                    }
                 }
                 return require_once $files;
            }
        }
    }


    public static function initialization()
    {
        Autoloader::loaderFiles();
    }
}
