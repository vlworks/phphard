<?

use app\models\Basket;
use app\models\Product;
use app\models\User;
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);



$product = new Product('link2', 'GoodName2', 'GoodDescription2', 155);

echo "<pre>";

$product->insert();

