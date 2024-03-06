<?php
// Начало сессии
session_start();

// Подключение к базе данных
$link = mysqli_connect("localhost", "admin", "admin", "test");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Авторизация пользователя
if (!empty($_POST['login_auth']) && !empty($_POST['password_auth'])) {
    $loginAuth = mysqli_real_escape_string($link, $_POST['login_auth']);
    $passwordAuth = mysqli_real_escape_string($link, $_POST['password_auth']);

    $checkUserQuery = "SELECT * FROM users WHERE login='$loginAuth'";
    $checkUserResult = mysqli_query($link, $checkUserQuery);

    if (mysqli_num_rows($checkUserResult) > 0) {
        $userData = mysqli_fetch_assoc($checkUserResult);
        $salt = $userData['salt'];
        $saltedPassword = md5($salt . $passwordAuth);

        // Проверка соответствия хеша из базы введенному паролю
        if ($saltedPassword === $userData['password']) {
            // Авторизация успешна
            $_SESSION['auth'] = true;
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['login'] = $userData['login'];

            // Перенаправление на страницу профиля
            header('Location: about.php');
            exit();
        } else {
            echo "<p><b>Неверный логин или пароль.</b></p>";
        }
    } else {
        echo "<p><b>Неверный логин или пароль.</b></p>";
    }
}

mysqli_close($link);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="icon" href="image/icon.png" type="image/x-icon">
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
</head>
<body>
<!-- Форма для авторизации -->
<form action="" method="POST">
    <h1>Авторизация</h1>
    <label for="login_auth">Логин:</label>
    <input type="text" name="login_auth" required>
    <br>

    <label for="password_auth">Пароль:</label>
    <input type="password" name="password_auth" required>
    <br>

    <input type="submit" value="Войти">
    <a href="register.php">Еще нет аккаунта</a>

</form>


</body>
</html>

<style>
/* Добавленные стили для котенка */
@font-face {
    font-family: 'HeliosExtThin-Italic';
    src: url('../УП/fonts/HeliosExtThin-Italic.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

body {
    font-family: "HeliosExtThin-Italic", sans-serif;
    background: url('image/fon.png') center fixed;
    background-size: cover;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    position: relative;
}

body::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("fon.jpg"); /* путь к изображению круга */
    opacity: 0.4; /* прозрачность кругов */
    pointer-events: none; /* чтобы круги не мешали взаимодействию с содержимым страницы */
    z-index: -1; /* поместить круги под содержимым страницы */
    filter: blur(0px); /* размытие фона */
}

form {
    background-color: #2E3B4E;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: center;
    margin: 50px 0; /* чтобы форма не прилипала к верху */
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
    color: #fff; /* нежно-розовый цвет текста */
}

input {
    width: calc(100% - 16px);
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #fff; /* нежно-розовая рамка */
    border-radius: 4px;
    font-size: 14px;
    color: #333;
}

input[type="submit"] {
    background-color: #4f6a80; /* нежно-розовый цвет кнопки */
    color: #fff;
    font-size: 20px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #688297; /* темно-нежно-розовый цвет кнопки при наведении */
}

.error-message {
    color: #ff0000;
    margin-bottom: 10px;
}
h1{
    color: #fff;
}
p {
    background-color: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    color: #ff0000;
}
/* Основные стили ссылок */
a {
    text-decoration: none;
    color: #fff; /* Цвет обычной ссылки */
    position: relative;
    display: inline-block;
    transition: color 0.3s ease-in-out;
    font-size: 15px
}

/* Эффект при наведении */
a::before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background-color: transparent;
    transform: scaleX(0);
    transform-origin: 0 50%;
    transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
}

a:hover {
    color: #76bd04; /* Новый цвет при наведении */
}

a:hover::before {
    background-color: #76bd04; /* Цвет эффекта при наведении */
    transform: scaleX(1);
}

</style>
