<h2>Каталог</h2>
<?foreach ($catalog as $item):?>
    <a href="/?c=product&a=card&id=<?=$item['id']?>"><h3><?=$item['name']?></h3></a>
    <p>Цена: <?=$item['price']?></p>
<?endforeach;?>
