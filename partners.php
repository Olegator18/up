<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продажа Автомобильных Дисков</title>
    <link rel="stylesheet" href="partners.css"> <!-- Создайте файл со стилями styles.css для оформления страницы -->
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

        
        <div class="product-card">
            <a href="https://www.workwheelsusa.com/">
            <img src="image/Work.jpg" alt="Диск 1">
            <h2>Work</h2>
        </a>
        </div>
        

        
        <div class="product-card">
            <a href="https://www.bbs.com/en/home">
            <img src="image/BBS.jpg" alt="Диск 1">
            <h2>BBS</h2>
        </a>
        </div>
        

        
        <div class="product-card">
            <a href="https://enkei.com/">
            <img src="image/Enkei.jpg" alt="Диск 1">
            <h2>Enkei</h2>
        </a>
        </div>        
        

        
        <div class="product-card" style=" height: 300px;">
        <a href="https://www.ssr-wheels.com/">
            <img src="image/SSR.png" alt="Диск 1" style=" height: 150px; margin-bottom: 50px; margin-top: 50px">
            <h2>SSR</h2>
        </a>
        </div>
        

        
        <div class="product-card">
            <a href="https://rays-wheels.net/en/">
            <img src="image/Volk.jpg" alt="Диск 1">
            <h2>Volk</h2>
        </a>
        </div>
        

        
        <div class="product-card" >
            <a href="http://wheelsi.com/yamato-wheels/">
            <img src="image/YAMATO.jpg" alt="Диск 1" style=" width: 550px; height: 150px; margin-bottom: 50px; margin-top: 50px">
            <h2>Yamato</h2>
        </a>
        </div>
        

        
        <div class="product-card">
            <a href="https://www.ozracing.com/">
            <img src="image/O.Z.jpg" alt="Диск 1">
            <h2>O.Z</h2>
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
