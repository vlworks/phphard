<?

use app\engine\Render;
use app\models\{Basket, Product, User};
use app\engine\Db;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);
require_once '../vendor/autoload.php'; // TWIG



$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName)  . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo "Не правильный контроллер";
}

$loader = new FilesystemLoader('../twigtemplates');
$twig = new Environment($loader);

echo $twig->render('index.tmpl', ['name' => 'Test']);


/**
 * @var Product $product
 */

//$product = new Product("Сникерс", "Вкусный", 12);
//$product->save();
//$product->delete();

//$product = Product::getOne(3);

//$product->setName("Сникерс2");

//$product->save();

//var_dump(($product));
//var_dump(get_class_methods($product));

