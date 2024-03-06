<?php
// Начало сессии
session_start();

// Разрушаем сессию и перенаправляем на страницу логина
session_destroy();
header('Location: index.php');
exit();
?>
