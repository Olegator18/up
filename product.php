<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продажа Автомобильных Дисков</title>
    <link rel="stylesheet" href="product.css"> <!-- Создайте файл со стилями styles.css для оформления страницы -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anta&family=Great+Vibes&family=Iceberg&family=Montserrat+Subrayada:wght@400;700&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
<link rel="icon" href="image/icon.png" type="image/x-icon">
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
</head>

<body>
    <header>
        <div class="logo">
            <img src="image/logo.png" alt="Логотип">
        </div>
        <div class="contact-info-h">
            <p>+7(XXX)XXX-XX-XX </p>
            <p>oleglogv12@gmail.com</p>
            <p>г.Москва ул.Айвазовского 23</p>
        </div>
        <div class="user-actions">
            <a class="auth" href="index.php">Авторизация</a>
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
    <div class="banner">
    <img src="image/banner.jpg" alt="Магазин автомобильных дисков">
    <div class="banner-text">
        <h1>Магазин автомобильных дисков</h1>
        <p>Широкий выбор дисков высокого качества для вашего автомобиля.</p>
        <a href="catalog.php">Перейти в каталог</a>
    </div>
</div>

<section>
<div class="product-window">
        <h2>Диск "SSR SP1"</h2>

        <div class="product-details">
            <img src="image/fonkom1.webp" alt="SSR SP1">
            <div class="product-description">
                <h3><strong>Диаметр:</strong> 18 дюймов</h3>
                <h3><strong>Количество отверстий:</strong> 5</h3>
                <h3><strong>Материал изготовления:</strong> Алюминий</h3>
                <h3><strong>Тип диска:</strong> Кованный</h3>
                <h3><strong>Цена:</strong> $700</h3>
            </div>
        </div>

        <h3>
            Диск "SSR SP1" представляет собой кованный диск диаметром 18 дюймов
            с 5 отверстиями. Изготовлен из высококачественного алюминия. Идеальный выбор для вашего автомобиля.
        </h3>
<br><br>



<h1 style="text-align:center;">Отзывы о товаре</h1><br>

<?php
session_start();
// Проверка авторизации пользователя
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php'); // Перенаправление на страницу входа, если пользователь не авторизован
    exit();
}

// Подключение к базе данных с указанием кодировки UTF-8
$conn = new mysqli("localhost", "admin", "admin", "test");
$conn->set_charset("utf8");

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка формы отправки отзыва
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['review_id'])) {
        // Удаление отзыва
        $reviewId = $_POST['review_id'];
        $sqlDelete = "DELETE FROM reviews WHERE id = '$reviewId'";
        if ($conn->query($sqlDelete) === TRUE) {
            echo '<script>("Отзыв успешно удален!");</script>';
        } else {
            echo '<script>("Ошибка при удалении отзыва: ' . $conn->error . '");</script>';
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'add') {
        // Добавление отзыва
        $reviewText = $conn->real_escape_string($_POST["review_text"]);
        $userId = $_SESSION["user_id"];

        // SQL-запрос для добавления отзыва в базу данных
        $sqlInsert = "INSERT INTO reviews (user_id, review_text) VALUES ('$userId', '$reviewText')";
        if ($conn->query($sqlInsert) === TRUE) {
            echo '<script>("Отзыв успешно добавлен!");</script>';
        } else {
            echo '<script>("Ошибка при добавлении отзыва: ' . $conn->error . '");</script>';
        }
    }
}

// SQL-запрос для выборки отзывов с именем автора
$sqlSelect = "SELECT reviews.*, users.fio FROM reviews INNER JOIN users ON reviews.user_id = users.id";
$result = $conn->query($sqlSelect);

// Вывод отзывов

while ($row = $result->fetch_assoc()) {
    echo "<div style='border: 2px solid #000; padding: 10px; margin-bottom: 10px;'>";
    echo "<p style='font-size: 23px;'><strong>{$row['fio']}</strong> написал(а) {$row['timestamp']}:</p>";
    echo "<p style='font-size: 18px; font-weight: 700; class='dobOtziva'>{$row['review_text']}</p>";
    
    // Добавление кнопки удаления отзыва, только если отзыв принадлежит текущему пользователю
    if ($row['user_id'] == $_SESSION['user_id']) {
        echo "<form method='post' action='product.php'>";
        echo "<input type='hidden' name='action' value='delete'>";
        echo "<input type='hidden' name='review_id' value='{$row['id']}'>";
        echo "<input type='submit' value='Удалить отзыв' class='otziv'>";
        echo "</form>";
    }
    echo "</div>";
}

// Форма для отправки нового отзыва
echo "<form method='post' action='product.php'>";
echo "<input type='hidden' name='action' value='add'>";
echo "<textarea placeholder='Введите сообщение' name='review_text' rows='4' cols='50' required class='dobOtziva'></textarea>";
echo "<br>";
echo "<input type='submit' value='Добавить отзыв' class='otziv'>";
echo "</form>";

// Закрытие соединения с базой данных
$conn->close();
?>







        <br><br><br><br>
        <h2>Технические характеристики</h2>
        <ul>
            <li><h3>Диаметр диска: 18 дюймов</h3></li>
            <li><h3>Количество отверстий: 5</h3></li>
            <li><h3>Материал изготовления: Алюминий</h3></li>
            <li><h3>Тип диска: Кованный</h3></li>
            <li><h3>Дополнительные характеристики: Устойчив к высоким температурам, легкий вес</h3></li>
        </ul>
        <br><br>
        <h2>Цена и специальные предложения</h2><br>
        <h3>При покупке комплекта дисков БЕСПЛАТНАЯ отправка в любую точку России</h3>
        <!-- Если есть скидки или специальные предложения, укажите их здесь -->

        <br><br>
        <h2>Гарантии и возвраты</h2><br>
        <h3>
            Наши диски обеспечиваются гарантией качества. В случае неудовлетворительной покупки,
            обратитесь в наш отдел обслуживания для получения подробной информации о возврате.
        </h3>
        <br><br>
        <h2>Техническая поддержка</h2><br>
        <h3>
            Наша техническая поддержка всегда готова помочь вам. Свяжитесь с нами по телефону
            или отправьте запрос через форму обратной связи на нашем сайте.
        </h3>
        <br><br>
        <h2>Способы оплаты и доставки</h2><br>
        <h3>
            Мы принимаем различные способы оплаты, такие как кредитные карты, электронные платежи и другие.
            Доставка осуществляется в течение 5-7 рабочих дней после подтверждения заказа.
        </h3>
    </section>

    <footer>
        <div class="contact-info-footer">
            <h3>Телефон: +7 (XXX) XXX-XX-XX</h3>
            <h3>Email: oleglogv12@gmail.com</h3>
            <h3>Адрес: г.Москва ул.Айвазовского 23</h3>
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