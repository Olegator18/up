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

// Получение данных пользователя из базы данных
$login = $_SESSION['login'];
$query = "SELECT login, fio, birthdate, email, country, registration_date FROM users WHERE login='$login'";
$result = mysqli_query($link, $query);

if ($result) {
    $userData = mysqli_fetch_assoc($result);

    // Вычисление полного возраста пользователя
    $birthdate = new DateTime($userData['birthdate']);
    $currentDate = new DateTime();
    $age = $currentDate->diff($birthdate)->y;
} else {
    die("Ошибка получения данных пользователя: " . mysqli_error($link));
}


// Обработка формы редактирования
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, была ли отправлена форма редактирования
    if (isset($_POST['edit_mode'])) {
        // Устанавливаем флаг редактирования в сессии
        $_SESSION['edit_mode'] = true;
    } else {
        // Обрабатываем обновление данных, если форма была отправлена
        $newFio = mysqli_real_escape_string($link, $_POST['new_fio']);
        $newBirthdate = mysqli_real_escape_string($link, $_POST['new_birthdate']);
        $newEmail = mysqli_real_escape_string($link, $_POST['new_email']);
        $newCountry = mysqli_real_escape_string($link, $_POST['new_country']);

        // Обновление данных пользователя в базе данных
        $updateQuery = "UPDATE users SET fio=?, birthdate=?, email=?, country=? WHERE login=?";
        $updateStmt = mysqli_prepare($link, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "sssss", $newFio, $newBirthdate, $newEmail, $newCountry, $login);
        mysqli_stmt_execute($updateStmt);

        // Обновление данных в сессии
        $_SESSION['fio'] = $newFio;
        $_SESSION['birthdate'] = $newBirthdate;
        $_SESSION['email'] = $newEmail;
        $_SESSION['country'] = $newCountry;

        // Сбрасываем флаг редактирования в сессии
        unset($_SESSION['edit_mode']);

        // Перезагрузка страницы после редактирования
        header("Location: profile.php");
        exit();
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="icon" href="image/icon.png" type="image/x-icon">
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
    <style>
    /* Стили для профиля */

    @font-face {
    font-family: 'HeliosExtThin-Italic';
    src: url('../up/fonts/HeliosExtThin-Italic.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

    body {
        font-family: "HeliosExtThin-Italic", sans-serif;
    background: url('image/fon3.jpeg') center fixed;
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
      
        
        opacity: 0.4; /* прозрачность кругов */
        pointer-events: none; /* чтобы круги не мешали взаимодействию с содержимым страницы */
        z-index: -1; /* поместить круги под содержимым страницы */
        filter: blur(0px); /* размытие фона */
    }

    .profile-container {
        background-color: #333;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 400px;
        text-align: center; /* Выравнивание по центру */
        margin: 10px 0 50px; /* Немного ниже картинки и меньший отступ снизу */
        position: relative;
    }

    /* Новые стили для профиля */
    h1 {
        color: #fff; /* нежно-розовый цвет текста */
        margin-bottom: 20px; /* отступ снизу */
    }

    p {
        color: #fff;
        margin: 10px 0; /* добавляем отступы для параграфов */
        font-size: 20px;
    }

    /* Стили для кнопки выхода */
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
        margin-top: 20px; /* отступ сверху */
    }

    input[type="submit"]:hover {
        background-color: #688297; /* темно-нежно-розовый цвет кнопки при наведении */
    }

    .deleteAccount-button {
        font-family: "HeliosExtThin-Italic", sans-serif;
        width: 90%;
        background-color: #4f6a80; /* Цвет кнопки смены пароля */
        color: white;
        font-size: 20px;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        margin-top: 20px;
        transition: background-color 0.3s; /* Плавное изменение цвета при наведении */
    }

    .deleteAccount-button:hover {
        background-color: #688297; /* Цвет кнопки смены пароля при наведении */
    }
    .changePassword-button {
        font-family: "HeliosExtThin-Italic", sans-serif;
        width: 90%;
        background-color: #4f6a80; /* Цвет кнопки смены пароля */
        color: white;
        font-size: 20px;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        margin-top: 20px;
        transition: background-color 0.3s; /* Плавное изменение цвета при наведении */
    }

    .changePassword-button:hover {
        background-color: #688297; /* Цвет кнопки смены пароля при наведении */
    }

    /* Новые стили для формы редактирования */
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        margin-top: 10px;
        color: #fff;
    }

    input[type="text"],
    input[type="date"],
    input[type="email"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #4a7800; /* нежно-розовая рамка */
        border-radius: 4px;
        font-size: 14px;
        color: #333;
    }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Профиль пользователя</h1>
        <?php if (isset($_SESSION['edit_mode']) && $_SESSION['edit_mode']) : ?>
            <!-- Форма редактирования профиля -->
            <form action="profile.php" method="POST">
                <label for="new_fio">Новое ФИО:</label>
                <input type="text" name="new_fio" value="<?php echo isset($_SESSION['fio']) ? $_SESSION['fio'] : $userData['fio']; ?>" required>

                <label for="new_birthdate">Новая дата рождения:</label>
                <input type="date" name="new_birthdate" value="<?php echo isset($_SESSION['birthdate']) ? $_SESSION['birthdate'] : $userData['birthdate']; ?>" required>

                <label for="new_email">Новый Email:</label>
                <input type="email" name="new_email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : $userData['email']; ?>" required>

                <label for="new_country">Новая страна:</label>
                <input type="text" name="new_country" value="<?php echo isset($_SESSION['country']) ? $_SESSION['country'] : $userData['country']; ?>" required>

                <input type="submit" value="Сохранить изменения">
            </form>
        <?php else : ?>
            <!-- Отображение данных профиля -->
            <p><strong>Логин:</strong> <?php echo $userData['login']; ?></p>
            <p><strong>ФИО:</strong> <?php echo $userData['fio']; ?></p>
            <p><strong>Возраст:</strong> <?php echo $age; ?></p>
            <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
            <p><strong>Страна:</strong> <?php echo $userData['country']; ?></p>
            <p><strong>Дата регистрации:</strong> <?php echo $userData['registration_date']; ?></p>
        <?php endif; ?>

        <!-- Форма редактирования и кнопка "Редактировать" -->
        <?php if (!isset($_SESSION['edit_mode']) || !$_SESSION['edit_mode']) : ?>
            <form action="profile.php" method="POST">
                <input type="hidden" name="edit_mode" value="1">
                <input type="submit" value="Редактировать">
            </form>
        <?php endif; ?>

        <!-- Кнопка смены пароля -->
        <a href="deleteAccount.php" class="deleteAccount-button">Удалить аккаунт</a>
        
        <!-- Кнопка смены пароля -->
                <a href="changePassword.php" class="changePassword-button">Изменить пароль</a>

        <!-- Кнопка выхода -->
        <form action="logout.php" method="post">
            <input type="submit" value="Выйти">
        </form>
         <!-- Кнопка "Назад" -->
         <a href="about.php" class="deleteAccount-button">Назад</a>
    </div>

   

    <!-- Код стилей и скриптов не изменяется -->
   
</body>
</html>
