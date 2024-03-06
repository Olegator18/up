<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продажа Автомобильных Дисков</title>
    <link rel="stylesheet" href="kovka.css"> <!-- Создайте файл со стилями styles.css для оформления страницы -->
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
        <div class="product-card" style="width: 550px; height: 550px;">
    <img src="image/BBS1.jpg" alt="Диск 1" style="width: 500px; height: 300px; margin-left: 30px;">
    <h2>BBS CI-R</h2>
    <p>Эти тапочки украсят вид вашей тачки, будь даже она самой не выделяемой в потоке</p>
    <p>Размер: 19</p>
    <p>Кол-во отверситий: 5</p>
    <p>Разболтовка: 110</p>
    <h2 style="margin-top: 20px; margin-bottom: 20px;">Цена: $699</h2>
    <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="BBS CI-R">
        <input type="hidden" name="product_price" value="699">
        <input type="hidden" name="product_razbolt" value="110">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="19">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
</div>

        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/BBS2.jpg" alt="Диск 1" style=" width: 500px; height: 300px; margin-left: 30px;">
            <h2>BBS SUPER RS</h2>
            <p>Эти легкие дисочки сразу показывают кто есть кто на дороге. Та самая классика, которая всегда имеет вид и будет актуальна в любое время</p>
            <p>Размер: 20</p>
            <p>Кол-во отверситий: 4</p>
            <p>Разболтовка: 114.3</p>
            <h2 style="margin-top: 10px; margin-bottom: 10px;">Цена: $899</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="BBS SUPER RS">
        <input type="hidden" name="product_price" value="899">
        <input type="hidden" name="product_razbolt" value="114.3">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="20">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 550px;">
        <img src="image/BBS3.jpg" alt="Диск 1" style=" width: 500px; height: 300px; margin-left: 30px;">
            <h2>BBS CC-R</h2>
            <p>Изумительные диски будут придавать вашей машине особый вид и привлекательность</p>
            <p>Размер: 19</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 100</p>
            <h2 style="margin-top: 20px; margin-bottom: 20px;">Цена: $749</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="BBS CC-R">
        <input type="hidden" name="product_price" value="749">
        <input type="hidden" name="product_razbolt" value="100">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="19">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 580px;">
        <img src="image/Enkei1.jpg" alt="Диск 1" style=" width: 350px; height: 350px;">
            <h2>Enkei GW8</h2>
            <p>Уникальные диски знают, как придать стиля вашему авто и выделиться из толпы</p>
            <p>Размер: 18</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 108</p>
            <h2 style="margin-top: 10px; margin-bottom: 10px;">Цена: $819</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Enkei GW8">
        <input type="hidden" name="product_price" value="819">
        <input type="hidden" name="product_razbolt" value="108">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="18">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 580px;">
        <img src="image/Enkei2.jpg" alt="Диск 1" style=" width: 350px; height: 350px;">
            <h2>Enkei VANQUISH</h2>
            <p>В этом экземпляре идеально выдержаны строгость и одновременно изящество, показывающее вкус владельца этих дисков</p>
            <p>Размер: 17</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 105</p>
            <h2>Цена: $649</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Enkei VANQUISH">
        <input type="hidden" name="product_price" value="649">
        <input type="hidden" name="product_razbolt" value="105">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="17">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 580px;">
        <img src="image/Enkei3.jpg" alt="Диск 1" style=" width: 350px; height: 350px;">
            <h2>Enkei RS05RR</h2>
            <p>Отличные диски на которые можно и нужно смотреть вечно, потому что они не оставят без внимания даже самого равнодушного человека</p>
            <p>Размер: 18</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 98</p>
            <h2>Цена: $779</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Enkei RS05RR">
        <input type="hidden" name="product_price" value="779">
        <input type="hidden" name="product_razbolt" value="98">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="18">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 580px;">
        <img src="image/Volk1.jpg" alt="Диск 1" style=" width: 350px; height: 350px;">
            <h2>Volk TE37 SAGA S-plus</h2>
            <p>Потрясающие диски, которые стали настоящей классикой JDM, эти диски стали любимы огромному количеству людей за свой внешний вид и качество</p>
            <p>Размер: 18</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 135</p>
            <h2>Цена: $699</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Volk TE37 SAGA S-plus">
        <input type="hidden" name="product_price" value="699">
        <input type="hidden" name="product_razbolt" value="135">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="18">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 580px;">
        <img src="image/Volk2.jpg" alt="Диск 1" style=" width: 350px; height: 350px;">
            <h2>Volk G16</h2>
            <p>Очнь красивые многоспицевые диски, как нельзя кстати подойдут на ваш автомобиль и станут неотъемлимой изюминкой</p>
            <p>Размер: 19</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 137</p>
            <h2>Цена: $749</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Volk G16">
        <input type="hidden" name="product_price" value="749">
        <input type="hidden" name="product_razbolt" value="137">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="19">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 580px;">
        <img src="image/Volk3.jpg" alt="Диск 1" style=" width: 350px; height: 350px;">
            <h2>Volk CE28N-plus</h2>
            <p>Большие и до смерти привлекательные тапки, это те экземпляры которые будут оставлять отвисшие челюсти у каждого кто их увидит</p>
            <p>Размер: 20</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 120.6</p>
            <h2>Цена: $899</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Volk CE28N-plus">
        <input type="hidden" name="product_price" value="899">
        <input type="hidden" name="product_razbolt" value="120.6">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="20">
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
