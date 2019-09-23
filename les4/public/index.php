<?
use app\models\{Basket, Product, User};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName)  . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo "Не правильный контроллер";
}


/**
 * @var Product $product
 */

//$product = new Product("Сникерс", "Вкусный", 12);
//$product->save();
//$product->delete();

echo "<pre>";
$product = Product::showLimit(4);
//var_dump($product);

//$product->setName("Сникерс2");

//$product->save();

//var_dump(($product));
//var_dump(get_class_methods($product));

