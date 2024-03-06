

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
<link rel="icon" href="image/icon.png" type="image/x-icon">
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">

<style>
    body {
    overflow-x: hidden;
}
.test {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(370px, 1fr));
    gap: 20px;
    justify-content: center;
    padding: 30px;
}

.product-card {
    width: 100%;
    height:450px;
    border: 2px solid #ddd;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    margin-bottom: 20px;
}

.product-card img {
    width: 100%;
    height: auto;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
}


        .product-card h2 {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .product-card p {
            font-size: 25px;
            margin-bottom: 5px;
        }

.delete {
    position: relative;
    font-family: "HeliosExtThin-Italic", sans-serif;
    margin-left: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 25px;
    font-size: 15px;
    background-color: #4f6a80;
    color: #FFF;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    font-weight: 700;
    bottom: 0;
}

    </style>
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

    <div class="test">


    
    <?php
// Подключение к базе данных
$conn = new mysqli("localhost", "admin", "admin", "test");

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка удаления товара из корзины
if (isset($_POST['delete_product'])) {
    $productId = $_POST['delete_product'];

    // SQL-запрос для удаления товара по его идентификатору
    $deleteSql = "DELETE FROM card WHERE id = $productId";

    if ($conn->query($deleteSql) === TRUE) {
        echo '<script>alert("Товар успешно удален из корзины!");</script>';
    } else {
        echo '<script>alert("Ошибка при удалении товара: ' . $conn->error . '");</script>';
    }
}

// Обработка покупки товара
if (isset($_POST['buy_product'])) {
    // Ваш код для обработки покупки товара
    echo '<script>alert("Товар успешно куплен!");</script>';
}

// Извлечение товаров из базы данных
$sql = "SELECT * FROM card";
$result = $conn->query($sql);

// Вывод товаров в виде карточек
while ($row = $result->fetch_assoc()) {
?>
    <div class="product-card">
        <h2><?php echo $row['product_name']; ?></h2>
        <p>Размер: <?php echo $row['product_size']; ?></p>
        <p>Цена: $<?php echo $row['product_price']; ?></p>
        <!-- Дополнительные параметры товара -->
        <p>Количество отверстий: <?php echo $row['product_otver']; ?></p>
        <p>Разболтовка: <?php echo $row['product_razbolt']; ?></p>
        <!-- Добавьте другие параметры по вашему выбору -->

        <!-- Кнопка удаления товара -->
        <form method="post" action="">
            <input type="hidden" name="delete_product" value="<?php echo $row['id']; ?>">
            <button class="delete" type="submit">Удалить из корзины</button>
        </form>

        <!-- Кнопка "Купить сейчас" -->
        <form method="post" action="">
            <input type="hidden" name="buy_product" value="<?php echo $row['id']; ?>">
            <a href="404.php" class="delete" type="submit">Купить сейчас</a>
        </form>
    </div>
<?php
}

// Закрытие соединения с базой данных
$conn->close();
?>





    </div>
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
