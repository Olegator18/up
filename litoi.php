<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продажа Автомобильных Дисков</title>
    <link rel="stylesheet" href="litoi.css"> <!-- Создайте файл со стилями styles.css для оформления страницы -->
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
        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/O.Z1.jpg" alt="Диск 1" style="width: 350px; height: 280px; margin-top: 40px; margin-bottom: 20px;">
            <h2>O.Z Gran Turismo HLT</h2>
            <p>Изящный итальянский продукт, ставший воплощением красоты и качества, такую работу можно назвать ювелирной</p>
            <p>Размер: 19</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 120</p>
            <h2 style="margin-top: 5px; margin-bottom: 5px;">Цена: $999</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="O.Z Gran Turismo HLT">
        <input type="hidden" name="product_price" value="999">
        <input type="hidden" name="product_razbolt" value="120">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Литые">
        <input type="hidden" name="product_size" value="19">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/O.Z2.jpg" alt="Диск 1" style="width: 350px; height: 280px; margin-top: 40px; margin-bottom: 20px;">
            <h2>O.Z Superturismo AERO-e</h2>
            <p>Необыкновенный дизайн с переплетением качества, это то что сделает вашу машину еще более уникальной среди остальных</p>
            <p>Размер: 20</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 130</p>
            <h2 style="margin-top: 5px; margin-bottom: 5px;">Цена: $799</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="O.Z Superturismo AERO-e">
        <input type="hidden" name="product_price" value="799">
        <input type="hidden" name="product_razbolt" value="130">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Литые">
        <input type="hidden" name="product_size" value="20">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/O.Z3.jpg" alt="Диск 1" style="width: 350px; height: 280px; margin-top: 40px; margin-bottom: 20px;">
            <h2>O.Z Superturismo GT</h2>
            <p>SUPERTURISMO GT — это легендарный руль гоночного мира, который не нуждается в представлении.</p>
            <p>Размер: 17</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 139</p>
            <h2 style="margin-top: 5px; margin-bottom: 5px;">Цена: $599</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="O.Z Superturismo GT">
        <input type="hidden" name="product_price" value="599">
        <input type="hidden" name="product_razbolt" value="139">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Литые">
        <input type="hidden" name="product_size" value="17">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/Yamato1.jpg" alt="Диск 1" style="width: 280px; height: 280px; margin-top: 40px; margin-bottom: 10px;">
            <h2>YAMATO Renjiro</h2>
            <p>Сдержанность и уверенность, вот как можно охарактеризовать эти тапочки, которые между прочим Made in Japan</p>
            <p>Размер: 17</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 139.1</p>
            <h2>Цена: $249</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="YAMATO Renjiro">
        <input type="hidden" name="product_price" value="249">
        <input type="hidden" name="product_razbolt" value="139.1">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Литые">
        <input type="hidden" name="product_size" value="17">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/Yamato2.jpg" alt="Диск 1" style="width: 280px; height: 280px; margin-top: 40px; margin-bottom: 20px;">
            <h2>YAMATO Yoshinori</h2>
            <p>Элегантные и придающие вид колеса залог совершенства вашего автомобиля. С этими дисками оно явно у вас в руках</p>
            <p>Размер: 19</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 150</p>
            <h2 style="margin-top: 5px; margin-bottom: 5px;">Цена: $349</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="YAMATO Yoshinori">
        <input type="hidden" name="product_price" value="349">
        <input type="hidden" name="product_razbolt" value="150">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Литые">
        <input type="hidden" name="product_size" value="19">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/Yamato3.jpg" alt="Диск 1" style="width: 280px; height: 280px; margin-top: 40px; margin-bottom: 20px;">
            <h2>YAMATO Noboru</h2>
            <p>Хорошие Японские диски для тех, кто ищет качественный и недорогой продукт для своего железного друга</p>
            <p>Размер: 18</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 140</p>
            <h2 style="margin-top: 5px; margin-bottom: 5px;">Цена: $299</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="YAMATO Noboru">
        <input type="hidden" name="product_price" value="299">
        <input type="hidden" name="product_razbolt" value="140">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Литые">
        <input type="hidden" name="product_size" value="18">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 570px;">
            <img src="image/SSR3.jpg" alt="Диск 1" style=" width: 500px; height: 330px;">
            <h2>SSR FM TITAN</h2>
            <p>Японское качество и стиль - вот что движет этими спицами. Когда в дороге окружающие увидят эти диски, они сразу поймут, что за рулем настоящий ценитель </p>
            <p>Размер: 16</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 139.7</p>
            <h2 style="margin-top: 5px; margin-bottom: 5px;">Цена: $899</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="SSR FM TITAN">
        <input type="hidden" name="product_price" value="899">
        <input type="hidden" name="product_razbolt" value="139.7">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Литые">
        <input type="hidden" name="product_size" value="16">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 570px;">
            <img src="image/SSR2.jpg" alt="Диск 1" style=" width: 500px; height: 330px;">
            <h2>SSR GTX03</h2>
            <p>Легенды как уличного стритрейсинга, так и профессионального уровня гонок. Диски которые уже доказали свое превосходство</p>
            <p>Размер: 17</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 125</p>
            <h2 style="margin-top: 5px; margin-bottom: 5px;">Цена: $949</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="SSR GTX03">
        <input type="hidden" name="product_price" value="949">
        <input type="hidden" name="product_razbolt" value="125">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Литые">
        <input type="hidden" name="product_size" value="17">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 570px;">
            <img src="image/SSR1.jpg" alt="Диск 1" style=" width: 500px; height: 330px;">
            <h2>SSR GTX01RS</h2>
            <p>Очень красивые и вызывающие диски будут просто сводить с ума всех кто на них посмотрит, а водитель в свою очередь ощутит качество Японских мастеров</p>
            <p>Размер: 18</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 127</p>
            <h2 style="margin-top: 5px; margin-bottom: 5px;">Цена: $699</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="SSR GTX01RS">
        <input type="hidden" name="product_price" value="699">
        <input type="hidden" name="product_razbolt" value="127">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Литые">
        <input type="hidden" name="product_size" value="18">
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
