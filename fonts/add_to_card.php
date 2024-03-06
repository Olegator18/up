<?php
// Начало сессии
session_start();

// Проверка авторизации
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    // Если пользователь не авторизован, перенаправляем на страницу логина
    header('Location: auth.php');
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продажа Автомобильных Дисков</title>
    <link rel="stylesheet" href="contact.css"> <!-- Создайте файл со стилями styles.css для оформления страницы -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anta&family=Great+Vibes&family=Iceberg&family=Montserrat+Subrayada:wght@400;700&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo">
            <img href="about.php" src="image/logo.png" alt="Логотип">
        </div>
        <div class="contact-info">
            <p>+7(XXX)XXX-XX-XX </p>
            <p>oleglogv12@gmail.com</p>
            <p>г.Москва ул.Айвазовского 23</p>
        </div>
        <div class="user-actions">
            <a class="auth" href="auth.php">Авторизация</a>
            <a class="korz" href="korzina.php">Корзина</a>
        </div>
        <nav>
        <ul>
                <li><a href="about.php">Главная</a></li>
                <li><a href="catalog.php">Каталог</a>
                    <ul class="dropdown">
                        <li><a href="kovka.php">Кованные</a></li>
                        <li><a href="lotoi.php">Литые</a></li>
                        <li><a href="shtamp.php">Штампованные</a></li>
                    </ul>
                </li>
                <li><a href="product.php">Продукция</a></li>
                <li><a href="contact.php">Контакты</a></li>
                <li><a href="partners.php">Партнеры</a></li>
                <li><a href="profile.php">Профиль</a></li>
            </ul>
        </nav>
    </header>

    <?php
session_start();

// Пример товара (замените его на свои данные)
$product = array(
    'id' => 1,
    'name' => 'BBS CI-R',
    'price' => 699,
    'image' => 'image/BBS1.jpg',
);

// Добавляем товар в корзину
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$_SESSION['cart'][] = $product;

// Перенаправляем пользователя обратно на страницу товара или на страницу корзины
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
    
    

    <footer>
        <div class="contact-info-footer">
            <p>Телефон: +7 (XXX) XXX-XX-XX</p>
            <p>Email: oleglogv12@gmail.com</p>
            <p>Адрес: г.Москва ул.Айвазовского 23</p>
        </div>
        
        <div class="navigation">
    <div class="navigation-column">
        <a href="about.php">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="product.php">Продукция</a>
        
    </div>
    <div class="navigation-column">
        <a href="contact.php">Контакты</a>
        <a href="partners.php">Партнеры</a>
        <a href="profile.php">Профиль</a>
    </div>
</div>
<div href="about.php"  class="footer-logo">
            <img src="image/logo.png" alt="Логотип">
        </div>
        <div class="footer-links">
            <a href="polit_konfid.php">Политика конфиденциальности</a><br><br>
            <a href="oferta.php">Публичная оферта</a>
        </div>
    </footer>
</body>

</html>
