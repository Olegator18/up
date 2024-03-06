<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продажа Автомобильных Дисков</title>
    <link rel="stylesheet" href="catalog.css"> <!-- Создайте файл со стилями styles.css для оформления страницы -->
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

    <section class="parallax-section">
    
        <div class="parallax"></div>
        <!-- Описание компании -->
        <div class="company-description">
            <h1>Добро пожаловать в мир качественных автомобильных дисков!</h1>
            <p>Мы предлагаем широкий ассортимент кованных, литых и штампованных дисков высокого качества.</p>
        </div>
    </section>

    <section class="product-cards">
        <!-- Карточки товаров с названием, описанием, ценой -->
        <!-- Можете использовать PHP для динамической генерации карточек из базы данных -->
    
        <div class="product-card">
            <a href="kovka.php"> 
            <img src="image/kovka.png" alt="Диск 1">
            <h2>Кованные</h2>
            </a>
        </div>
    

        <div class="product-card">
            <a href="litoi.php"> 
            <img src="image/litoi.png" alt="Диск 1">
            <h2>Литые</h2>
            </a>
        </div>

        <div class="product-card">
            <a href="shtamp.php"> 
            <img src="image/shtamp.png" alt="Диск 1">
            <h2>Штампованные</h2>
            </a>
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
