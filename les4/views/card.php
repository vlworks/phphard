<?
/**
 * @var app\models\Product $product
 */
$page = (int)$_GET['id'];
?>

<h3><?=$product->name?></h3>
<p><?=$product->description?></p>
<p><?=$product->price?></p>

<p><a href="/?c=product&a=catalog&page=<?=$page?>">Назад</a></p>