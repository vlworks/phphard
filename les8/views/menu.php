<a href="/"> Главная </a>
<a href="/product/catalog/"> Каталог </a>
<a href="/basket/"> Корзина <span id="count"><?=$count?></span></a>
<?if($user === 'admin'):?>
<a href="/order/">Заказы</a>
<?endif;?>