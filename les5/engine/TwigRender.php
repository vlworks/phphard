<?php

namespace app\engine;

use app\interfaces\IRenderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRender implements IRenderer
{

    public function renderTemplate($template, $params = [])
    {
        $loader = new FilesystemLoader('../twigtemplates');
        $twig = new Environment($loader);
        $templatePath = $template . ".tmpl";
        echo $twig->render($templatePath, $params);
    }
}