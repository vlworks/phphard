<h2>Управление заказами</h2>

<table border="1">
    <tr>
        <th>#</th>
        <th>Имя</th>
        <th>Телефон</th>
        <th>Адрес</th>
        <th>Статус заказа</th>
    </tr>
    <?foreach ($orders as $item):?>
    <tr>
        <td><?=$item['id']?></td>
        <td><?=$item['name']?></td>
        <td><?=$item['phone']?></td>
        <td><?=$item['adres']?></td>
        <td class="isOrder<?=$item['id']?>">
            <?if(!$item['status']):?>
            Заказ не обработан
            <button class="order" data-id="<?=$item['id']?>">Обработать</button>
            <?else:?>
            Заказ обработан
            <?endif;?>
        </td>
    </tr>
    <?endforeach;?>
</table>
