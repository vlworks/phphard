
<h2>Корзина</h2><hr>
<div class="basket" id="basket">
<? foreach ($products as $item): ?>
    <div class="basket-item" id="basket-<?= $item['id_basket']?>">
        <h2><?=$item['name']?></h2>
        <p>Описание:<?=$item['description']?></p>
        <p>Цена:<?=$item['price']?></p>

        <button data-id="<?= $item['id_basket']?>" class="delete">Удалить</button>
    </div>
<? endforeach; ?>
    <b>
<?if(!$sum):?>
    <p>Корзина пуста</p>
<?else:?>
    <p id="sum">Сумма корзины: <?=$sum?></p>
<?endif;?>
    </b>
</div>


<script>
    let buttons = document.querySelectorAll('.delete');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/DelBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;

                if(answer.result){
                    let basketItem = document.getElementById('basket-' + id);
                    document.getElementById('basket').removeChild(basketItem);

                    let basketSum = document.getElementById('sum');
                    if(answer.sum){
                        basketSum.textContent = 'Сумма корзины: ' + answer.sum;
                    } else {
                        basketSum.textContent = 'Корзина пуста';
                    }
                }

            })();
        })
    })
</script>
