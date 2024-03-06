<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продажа Автомобильных Дисков</title>
    <link rel="stylesheet" href="shtamp.css"> <!-- Создайте файл со стилями styles.css для оформления страницы -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anta&family=Great+Vibes&family=Iceberg&family=Montserrat+Subrayada:wght@400;700&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
<link rel="icon" href="image/icon.png" type="image/x-icon">
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
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
                        <li><a href="litoi.php">Литые</a></li>
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

    <section class="product-cards">
        <!-- Карточки товаров с названием, описанием, ценой -->
        <!-- Можете использовать PHP для динамической генерации карточек из базы данных -->
        
        <div class="product-card" style=" width: 550px; height: 580px;">
        <img src="image/shtamp1.jpg" alt="Диск 1" style=" width: 400px; height: 350px;">
            <h2>Штамп 1</h2>
            <p>Крепкие штампы на авто станут лучшим выбором для вас и вашего друга</p>
            <p>Размер: 12</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 100</p>
            <h2>Цена: $299</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Штамп 1">
        <input type="hidden" name="product_price" value="299">
        <input type="hidden" name="product_razbolt" value="100">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Штампованные">
        <input type="hidden" name="product_size" value="12">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 580px;">
        <img src="image/shtamp2.jpg" alt="Диск 1" style=" width: 350px; height: 350px;">
            <h2>Штамп 2</h2>
            <p>Симпотичные, еще и крепкие штамповки, неприхотливые и качественные</p>
            <p>Размер: 15</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 100</p>
            <h2>Цена: $249</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Штамп 2">
        <input type="hidden" name="product_price" value="249">
        <input type="hidden" name="product_razbolt" value="100">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Штампованные">
        <input type="hidden" name="product_size" value="15">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 580px;">
        <img src="image/shtamp3.jpg" alt="Диск 1" style=" width: 350px; height: 350px;">
            <h2>Штамп 3</h2>
            <p>Классические штампы, покрыты 4 слоями краски и лака, что обеспечивает их устойчивость к коррозии</p>
            <p>Размер: 14</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 98</p>
            <h2>Цена: $199</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Штамп 3">
        <input type="hidden" name="product_price" value="199">
        <input type="hidden" name="product_razbolt" value="98">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Штампованные">
        <input type="hidden" name="product_size" value="14">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        

        <!-- Добавьте другие карточки товаров по аналогии -->
    </section>


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
