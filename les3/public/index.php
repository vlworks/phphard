<?

use app\models\Basket;
use app\models\Product;
use app\models\User;
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);
echo "<pre>";

# уже есть в базе
//$user = new User('moderator', '12345', '');
//$user->insert();

$product = new Product('imglink', 'Мяч', 'Детский резинвый мяч', 22);

//$product->insert();

//$product->delete();

//$product->image = 'update img';
//$product->name = 'update name';
//$product->description = 'update description';
//$product->price = 1000000;
//$product->update();

## мысли вслух - задание со звездочкой, продублировал отдельно Obj

$getproduct = (new Product())->getOneObj(3);
var_dump($getproduct);

## можно еще в queryAll передавать необязательный параметр для fetchAll? чтобы к примеру добавлять PDO::FETCH_KEY_PAIR и т.п. - или я не прав??

