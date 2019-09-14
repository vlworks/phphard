<?php

class Autoload
{
    public function loadClass($className)
    {
        echo "<pre>";

        # использую для отладки
        //var_dump($className);

        # вариант с разбиениением и склеиванием массива, сложнее читается
//        $implode = implode('/',
//                        array_splice(
//                        explode('\\', $className), 1, 2));

        # вариант с заменой строки, легче читается, хотя ...
        $implode = str_replace('app/', '', str_replace('\\', '/', $className));

        $fileName = "../{$implode}.php";

        # использую для отладки
        //var_dump($fileName);

        include $fileName;
    }
}