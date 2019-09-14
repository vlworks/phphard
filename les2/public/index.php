<?

use app\models\Product;
use app\models\User;
use app\engine\Db;
use app\models\Cart;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
echo $product->getOne(3);

$user = new User(new Db());
echo $user->getAll();

$cart = new Cart(new Db());
echo $cart->getOne(5);
