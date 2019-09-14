<?php

class Autoload
{
    private $path = [
        'models',
        'engine',
        'interfaces'
    ];

    public function loadClass($className)
    {
        foreach ($this->path as $path) {
            $fileName = "../{$path}/{$className}.php";
          //  var_dump($fileName);
            if (file_exists($fileName)) {
                include $fileName;
                break;
            }
        }
    }
}