<?php
// Начало сессии
session_start();

// Проверка авторизации
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    // Если пользователь не авторизован, перенаправляем на страницу логина
    header('Location: index.php');
    exit();
}

// Подключение к базе данных
$link = mysqli_connect("localhost", "admin", "admin", "test");

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Получение логина пользователя из сессии
$login = $_SESSION['login'];

// Обработка формы смены пароля
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, была ли отправлена форма смены пароля
    if (isset($_POST['change_password'])) {
        // Получаем введенные значения
        $oldPassword = mysqli_real_escape_string($link, $_POST['old_password']);
        $newPassword = mysqli_real_escape_string($link, $_POST['new_password']);
        $confirmPassword = mysqli_real_escape_string($link, $_POST['confirm_password']);

        // Получаем хеш и соль текущего пароля пользователя из базы данных
        $getPasswordQuery = "SELECT password, salt FROM users WHERE login=?";
        $getPasswordStmt = mysqli_prepare($link, $getPasswordQuery);
        mysqli_stmt_bind_param($getPasswordStmt, "s", $login);
        mysqli_stmt_execute($getPasswordStmt);
        $passwordResult = mysqli_stmt_get_result($getPasswordStmt);

        if ($passwordRow = mysqli_fetch_assoc($passwordResult)) {
            $oldSaltedPassword = md5($passwordRow['salt'] . $oldPassword);

            // Проверяем, совпадает ли введенный старый пароль с текущим паролем пользователя
            if ($oldSaltedPassword === $passwordRow['password']) {
                // Проверяем, совпадают ли новый пароль и подтверждение
                if ($newPassword === $confirmPassword) {
                    // Проверяем, что новый пароль не совпадает со старым
                    if ($newPassword !== $oldPassword) {
                        // Генерируем новую соль и хеш для пароля
                        $newSalt = generateSalt();
                        $newSaltedPassword = md5($newSalt . $newPassword);

                        // Обновляем пароль и соль в базе данных
                        $updatePasswordQuery = "UPDATE users SET password=?, salt=? WHERE login=?";
                        $updatePasswordStmt = mysqli_prepare($link, $updatePasswordQuery);
                        mysqli_stmt_bind_param($updatePasswordStmt, "sss", $newSaltedPassword, $newSalt, $login);
                        mysqli_stmt_execute($updatePasswordStmt);

                        echo "<p><h3>Пароль успешно изменен.</h3></p>";
                    } else {
                        echo "<p><b>Новый пароль не должен совпадать со старым.</b></p>";
                    }
                } else {
                    echo "<p><b>Новый пароль и подтверждение не совпадают.</b></p>";
                }
            } else {
                echo "<p><b>Введен неверный текущий пароль.</b></p>";
            }
        } else {
            echo "<p><b>Ошибка получения данных пользователя.</b></p>";
        }
    }
}

// Функция для генерации соли
function generateSalt()
{
    $salt = '';
    $saltLength = 99; // длина соли
    
    for ($i = 0; $i < $saltLength; $i++) {
        $salt .= chr(mt_rand(33, 126)); // символ из ASCII-table
    }
    
    return $salt;
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Смена пароля</title>
    <link rel="icon" href="image/icon.png" type="image/x-icon">
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
    <style>
    /* Стили для формы смены пароля */

    @font-face {
    font-family: 'HeliosExtThin-Italic';
    src: url('../up/fonts/HeliosExtThin-Italic.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

    body {
        font-family: "HeliosExtThin-Italic", sans-serif;
    background: url('image/fon4.jpg') center fixed;
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
        background-color: #333;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center;
        margin: 50px 0; /* чтобы форма не прилипала к верху */
    }

    label {
        display: block;
        margin-top: 10px;
        color: #fff
    }
    h1{
        color: #fff;
    }

    b{
        color: #e74c3c;
    }

    h3{ 
        color: #76bd04;
    }

    input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #4a7800; /* нежно-розовая рамка */
        border-radius: 4px;
        font-size: 14px;
        color: #333;
    }

    input[type="submit"],
    input[type="button"] {
        font-family: "HeliosExtThin-Italic", sans-serif;
        background-color: #4f6a80; /* нежно-розовый цвет кнопки */
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        padding: 10px; /* увеличиваем отступы для кнопки */
        border: none;
        border-radius: 4px;
        margin-top: 10px;
    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
        background-color: #688297; /* темно-нежно-розовый цвет кнопки при наведении */
    }
    </style>
</head>
<body>
    <form action="changePassword.php" method="POST">
        <h1>Смена пароля</h1>
        <label for="old_password">Текущий пароль:</label>
        <input type="password" name="old_password" required>

        <label for="new_password">Новый пароль (от 6 до 12 символов):</label>
        <input type="password" name="new_password" minlength="6" maxlength="12" required>

        <label for="confirm_password">Подтвердите новый пароль:</label>
        <input type="password" name="confirm_password" required>

        <input type="submit" name="change_password" value="Подтвердить изменения">
        <input type="button" value="Назад" onclick="location.href='profile.php';">
    </form>
</body>
</html>
