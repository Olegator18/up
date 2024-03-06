<?php
// Начало сессии
session_start();

// Подключение к базе данных
$link = mysqli_connect("localhost", "admin", "admin", "test");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Регистрация пользователя
if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['birthdate']) && !empty($_POST['email']) && !empty($_POST['country']) && !empty($_POST['fio'])) {
    $login = mysqli_real_escape_string($link, $_POST['login']);

    // Проверка на занятость логина
    $checkLoginQuery = "SELECT * FROM users WHERE login=?";
    $checkLoginStatement = mysqli_prepare($link, $checkLoginQuery);
    mysqli_stmt_bind_param($checkLoginStatement, "s", $login);
    mysqli_stmt_execute($checkLoginStatement);
    $checkLoginResult = mysqli_stmt_get_result($checkLoginStatement);

    if (mysqli_num_rows($checkLoginResult) > 0) {
        echo "<p><b>Логин уже занят. Пожалуйста, выберите другой логин.</b></p>";
    } else {
        $password = mysqli_real_escape_string($link, $_POST['password']);

        // Генерация соли
        function generateSalt()
        {
            $salt = '';
            $saltLength = 99; // длина соли
            
            for ($i = 0; $i < $saltLength; $i++) {
                $salt .= chr(mt_rand(33, 126)); // символ из ASCII-table
            }
            
            return $salt;
        }
        
        $salt = generateSalt();
        $saltedPassword = md5($salt . $password); // Преобразование пароля в соленый хеш

        $birthdate = mysqli_real_escape_string($link, $_POST['birthdate']);
        $email = mysqli_real_escape_string($link, $_POST['email']);
        $country = mysqli_real_escape_string($link, $_POST['country']);
        $fio = mysqli_real_escape_string($link, $_POST['fio']);

        // Вставка данных в базу данных
        $query = "INSERT INTO users (login, password, salt, birthdate, email, country, fio, registration_date, status) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), 'user')";

        $insertStatement = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($insertStatement, "sssssss", $login, $saltedPassword, $salt, $birthdate, $email, $country, $fio);
        mysqli_stmt_execute($insertStatement);

        // Получение id нового пользователя
        $userIdQuery = "SELECT id FROM users WHERE login=?";
        $userIdStatement = mysqli_prepare($link, $userIdQuery);
        mysqli_stmt_bind_param($userIdStatement, "s", $login);
        mysqli_stmt_execute($userIdStatement);
        $userIdResult = mysqli_stmt_get_result($userIdStatement);
        $userId = mysqli_fetch_assoc($userIdResult)['id'];

        // Автоматическая авторизация и сохранение id, логина и статуса в сессии
        $_SESSION['auth'] = true;
        $_SESSION['user_id'] = $userId;
        $_SESSION['login'] = $login;
        $_SESSION['status'] = 'user';

        // Перенаправление на страницу профиля
        header('Location: about.php');
        exit();
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="icon" href="image/icon.png" type="image/x-icon">
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
    <style>
        /* Ваши стили CSS */
        @font-face {
    font-family: 'HeliosExtThin-Italic';
    src: url('../up/fonts/HeliosExtThin-Italic.ttf') format('truetype');
    font-weight: normal;
    font-style: normal;
}

        body {
    font-family: "HeliosExtThin-Italic", sans-serif;
    background: url('image/fon6.jpg') center fixed;
    background-size: cover;
    color: #000000; /* белый текст */
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
    height: 100%; /* путь к изображению круга */
    opacity: 0.4; /* прозрачность кругов */
    pointer-events: none; /* чтобы круги не мешали взаимодействию с содержимым страницы */
    z-index: -1; /* поместить круги под содержимым страницы */
    filter: blur(0px); /* размытие фона */
}

form {
    background-color: #333; /* темный фон формы */
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
    color: #fff; /* цвет текста для меток */
}

input {
    font-family: "HeliosExtThin-Italic", sans-serif;
    font-weight: 700;
    width: calc(100% - 16px);
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #fff; /* цвет рамки */
    border-radius: 4px;
    font-size: 14px;
    color: #000000; /* белый текст */
}

input[type="submit"] {
    background-color: #4f6a80; /* цвет кнопки */
    color: #fff;
    font-size: 20px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #688297; /* цвет кнопки при наведении */
}

.error-message {
    color: #ff0000;
    margin-bottom: 10px;
}

h1{
    color: #fff;
}

p {
    background-color: #333; /* темный фон параграфа */
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    color: #ff0000;
}

select {
    width: calc(100% - 16px);
    padding: 8px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #fff;
    border-radius: 4px;
    font-size: 14px;
    color: #000;
}

.back-button {
            background-color: #4f6a80; /* Цвет кнопки "Назад" */
            font-weight: 700;
            color: white;
            font-size: 20px;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            border: 1px solid #fff;
            width: 86%;
            transition: background-color 0.3s; /* Плавное изменение цвета при наведении */
        }

        .back-button:hover {
            background-color: #688297; /* Цвет кнопки "Назад" при наведении */
        }

    </style>
</head>
<body>

    <form action="" method="POST">
    <h1>Регистрация</h1>
        <label for="login">Логин (от 4 до 10 символов):</label>
        <input type="text" name="login" id="loginInput" minlength="4" maxlength="10" pattern="[A-Za-z0-9_]+" title="Логин должен содержать только латинские символы, цифры и нижние подчеркивания" required>
        <br>

        <label for="password">Пароль (от 6 до 12 символов):</label>
        <input type="password" name="password" minlength="6" maxlength="12" required>
        <br>

        <label for="fio">ФИО:</label>
<input type="text" name="fio" pattern="^[А-Яа-яёЁ]+(-[А-Яа-яёЁ]+)?\s[А-Яа-яёЁ]+\s[А-Яа-яёЁ]+$" title="Введите корректное ФИО" required>


        <br>

        <label for="birthdate">Дата рождения:</label>
        <input type="date" name="birthdate" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>

        <label for="country">Страна:</label>
        <select name="country" required>
            <option value="Россия">Россия</option>
            <option value="Армения">Армения</option>
            <option value="Франция">Франция</option>
            <option value="Китай">Китай</option>
            <option value="Америка">Америка</option>
            <option value="Италия">Италия</option>
            <option value="Португалия">Португалия</option>
            <option value="Германия">Германия</option>
            <option value="Греция">Греция</option>
            <option value="Аргентина">Аргентина</option>
        </select>
        <br>

        <input type="submit" value="Зарегистрироваться">
        <a href="index.php" class="back-button">Назад</a>
    </form>

    <script>
        function checkLogin() {
            var loginInput = document.getElementById("loginInput");
            var russianRegex = /[а-яА-Я]/;

            if (russianRegex.test(loginInput.value)) {
                alert("Логин не должен содержать русские символы.");
            } else {
                alert("Логин прошел проверку.");
            }
        }
    </script>
</body>
</html>
