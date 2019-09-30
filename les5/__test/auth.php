
<?php
//не забываем стартануть сессию
session_start();

/**
 * Функция авторизации по логину паролю
 * Возвращает true и авторизует если логин пароль подходят
 * Возвращает false если не подходят
 * Авторизация путем создания сессии login с именем пользователя
 */
function auth($login, $pass)
{
    //Получить логин пользователя из БД

    //можно сделать универсальный метод getOneWhere
    //$user = static::getOneWhere('login', $login);

    //$user получаем по $login из БД
    //сделаем заглушку, $user допустим массив вернет, или объект можно
    $user = [
        'login' => 'admin',
        'pass' => 123
    ];
    if ($pass == $user['pass']) {
        //если пароль верный, введенный == паролю в бд создаем сессию
        $_SESSION['login'] = $login;
        return true;
    }
    return false;
}
/**
 * Сервисная функция, возвращающая true или false в зависимости авторизован ли пользователь
 * Можно использовать для отрисовки либо блока приветсвися, либо формы логина
 */
function isAuth() {
    return isset($_SESSION['login']) ? true: false;
}
/**
 * Сервисная функция, возвращающая имя авторизованного пользователя, либо Guest если
 * пользователь не авторизован
 */
function getName() {
    return isAuth() ? $_SESSION['login'] : "Guest";
}

//И пример использования данных функций

//если пришли данные из формы логина, пытаемся авторизовать
if (isset($_POST['send'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if (!auth($login, $pass)) Die("Логин или пароль не верный!");

}
//разлогинивание
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: /");
    exit();
}

$name = getName();
//данную логику можно реализовать в layouts
//а методы выше раскидать по смыслу в Users и в UserController
?>
<?if (isAuth()):?>
    Добро пожаловать <?=$name?>, <a href="?logout">выход</a>
<?else:?>
<form method="post">
    <input type="text" name="login">
    <input type="password" name="pass">
    <input type="submit" name="send">
</form>
<?endif;?>
