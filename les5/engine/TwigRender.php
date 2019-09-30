<?php

namespace app\engine;

use app\interfaces\IRenderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRender implements IRenderer
{

    private $loader;
    private $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader('../twigtemplates');
        $this->twig = new Environment($this->loader);
    }

    public function renderTemplate($template, $params = [])
    {
        $templatePath = $template . ".tmpl";
        echo $this->twig->render($templatePath, $params);
    }
}