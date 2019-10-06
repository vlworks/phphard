<?if($user === 'admin'):?>
    <h2>Управление заказами</h2>

    <table border="0">
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Адрес</th>
            <th>Состав заказа</th>
            <th>Статус заказа</th>
        </tr>
        <?foreach ($orders as $item):?>
        <tr>
            <td><?=$item['id']?></td>
            <td><?=$item['name']?></td>
            <td><?=$item['phone']?></td>
            <td><?=$item['adres']?></td>
            <td><a href="index/?order_session=<?=$item['session_id']?>">Показать</a></td>
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
<?endif;?>

<?if($details):?>
    <hr>
    <? foreach ($details as $item): ?>
        <div id="<?= $item['id_basket'] ?>">
            <h2><?=$item['name']?></h2>
            <p>Описание:<?=$item['description']?></p>
            <p>Цена:<?=$item['price']?></p>
        </div>
    <? endforeach; ?>
<?endif;?>


<script>
    let buttons = document.querySelectorAll('.order');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/ChangeOrder/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                let $isOrder = document.querySelector('.isOrder' + id);
                $isOrder.textContent = 'Заказ обработан';
                console.log(answer);
            })();
        })
    });
</script>
