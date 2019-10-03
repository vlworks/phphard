<?php


namespace app\controllers;

use app\engine\Render;
use app\interfaces\IRenderer;
use app\models\Basket;
use app\models\repositories\BasketRepository;
use app\models\repositories\UserRepository;
use app\models\User;

abstract class Controller
{
    private $action;
    private $defaultAction = "index";
    private $layout = 'main';
    private $useLayouts = true;
    private $renderer;

    /**
     * Controller constructor.
     * @param $renderer
     */
    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }


    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404";
        }
    }

    public function render($template, $params = [])
    {
        if ($this->useLayouts) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'content' => $this->renderTemplate($template, $params),
                'auth' => (new UserRepository())->isAuth(),
                'username' => (new UserRepository())->getName(),
                'menu' => $this->renderTemplate('menu', [
                    'count' => (new BasketRepository())->getCountWhere('session_id', session_id())

                ])
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->renderTemplate($template, $params);
    }

}