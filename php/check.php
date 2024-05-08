<?php
$login = filter_var(trim($_POST['login']));

$password = filter_var(trim($_POST['password']));



if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Нелопустимая длина логина";
    exit();
} else if (mb_strlen($password) < 2 || mb_strlen($password) > 50) {
    echo "Нелопустимая длина пароля";
    exit();
}

$password = md5($password);

$mysql = new mysqli('localhost', 'svetlana', 'pa$$word', 'registered');
$mysql->query("INSERT INTO `users` (`login`, `password`) VALUES('$login', '$password')");
$mysql->close();
