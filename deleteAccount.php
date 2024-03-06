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

// Обработка формы удаления аккаунта
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, была ли отправлена форма удаления аккаунта
    if (isset($_POST['delete_account'])) {
        // Получаем введенный пароль
        $enteredPassword = mysqli_real_escape_string($link, $_POST['password']);

        // Получаем соль и хэш пароля из базы данных
        $login = $_SESSION['login'];
        $query = "SELECT salt, password FROM users WHERE login='$login'";
        $result = mysqli_query($link, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $storedSalt = $row['salt'];
            $storedPasswordHash = md5($storedSalt . $enteredPassword); // Используем md5 для сравнения

            // Проверяем, соответствует ли введенный пароль хэшу в базе данных
            if ($storedPasswordHash === $row['password']) {
                // Если пароль верный, удаляем аккаунт
                $deleteQuery = "DELETE FROM users WHERE login=?";
                $deleteStmt = mysqli_prepare($link, $deleteQuery);
                mysqli_stmt_bind_param($deleteStmt, "s", $login);
                mysqli_stmt_execute($deleteStmt);

                // Разлогиниваем пользователя и перенаправляем на страницу логина
                session_unset();
                session_destroy();
                header('Location: index.php');
                exit();
            } else {
                // Если пароль неверный, выводим сообщение об ошибке
                $error = "Неверный пароль. Попробуйте еще раз.";
            }
        } else {
            die("Ошибка получения данных пользователя: " . mysqli_error($link));
        }
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление аккаунта</title>
    <link rel="icon" href="image/icon.png" type="image/x-icon">
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
    <style>
        /* Стили для формы удаления аккаунта */

        @font-face {
    font-family: 'HeliosExtThin-Italic';
    src: url('../up/fonts/HeliosExtThin-Italic.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

        body {
            font-family: "HeliosExtThin-Italic", sans-serif;
    background: url('image/fon5.jpg') center fixed;
    background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
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
        .delete-account-container {
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center; /* Выравнивание по центру */
            margin: 10px 0 50px; /* Немного ниже и меньший отступ снизу */
        }

        h1 {
            color: #fff; /* нежно-розовый цвет текста */
            margin-bottom: 20px; /* отступ снизу */
        }

        label {
            margin-top: 10px;
            color: #fff
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

        input[type="submit"] {
            font-family: "HeliosExtThin-Italic", sans-serif;
            width: 100%;
            background-color: #4f6a80; /* нежно-розовый цвет кнопки */
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            padding: 10px; /* увеличиваем отступы для кнопки */
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #688297; /* темно-нежно-розовый цвет кнопки при наведении */
        }

        .back-button {
            width: 90%;
            background-color: #4f6a80; /* Цвет кнопки "Назад" */
            color: white;
            font-size: 20px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s; /* Плавное изменение цвета при наведении */
        }

        .back-button:hover {
            background-color: #688297; /* Цвет кнопки "Назад" при наведении */
        }
    </style>
</head>
<body>
    <div class="delete-account-container">
        <h1>Удаление аккаунта</h1>
        <form action="deleteAccount.php" method="POST">
            <label for="password">Введите пароль для подтверждения:</label>
            <input type="password" name="password" required>

            <?php if (isset($error)) : ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

            <input type="submit" name="delete_account" value="Удалить аккаунт">
        </form>

        <!-- Кнопка "Назад" -->
        <a href="profile.php" class="back-button">Назад</a>
    </div>
</body>
</html>
