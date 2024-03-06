<?php
// Подключение к базе данных (замените данными вашей базы данных)
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "test";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Обработка запроса добавления товара в корзину
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_name"]) && isset($_POST["product_price"]) && isset($_POST["product_razbolt"]) && isset($_POST["product_otver"]) && isset($_POST["product_tip"]) && isset($_POST["product_size"])) {
        $productName = $_POST["product_name"];
        $productPrice = $_POST["product_price"];
        $productRazbolt = $_POST["product_razbolt"];
        $productOtver = $_POST["product_otver"];
        $productTip = $_POST["product_tip"];
        $productSize = $_POST["product_size"];


        // SQL-запрос для вставки данных в таблицу корзины
        $sql = "INSERT INTO card (product_name, product_price, product_razbolt, product_otver, product_tip, product_size) VALUES ('$productName', '$productPrice', '$productRazbolt', '$productOtver', '$productTip', '$productSize')";



        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Товар успешно добавлен в корзину!");</script>';
        } else {
            echo '<script>alert("Ошибка при добавлении товара: ' . $conn->error . '");</script>';
        }
    }
}

// Закрытие подключения
$conn->close();
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Продажа Автомобильных Дисков</title>
    <link rel="stylesheet" href="about.css"> <!-- Создайте файл со стилями styles.css для оформления страницы -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anta&family=Great+Vibes&family=Iceberg&family=Montserrat+Subrayada:wght@400;700&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
<link rel="icon" href="image/icon.png" type="image/x-icon">
<link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
</head>

<body>
    <header>
        <div href="about.php"  class="logo">

            <img src="image/logo.png" alt="Логотип">
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
            <h3>Мы предлагаем широкий ассортимент кованных, литых и штампованных дисков высокого качества.</h3>
        </div>
    </section>

    
    <h1 style="text-align:center; margin: 20px;">Каталог автомобильных дисков</h1>
    <section class="product-cards">
        <!-- Карточки товаров с названием, описанием, ценой -->
        <!-- Можете использовать PHP для динамической генерации карточек из базы данных -->
        <div class="product-card" style="width: 550px; height: 550px;">
    <img src="image/BBS1.jpg" alt="Диск 1" style="width: 500px; height: 300px;">
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
            <img src="image/BBS2.jpg" alt="Диск 1" style=" width: 500px; height: 300px;">
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
        <img src="image/BBS3.jpg" alt="Диск 1" style=" width: 500px; height: 300px;">
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

        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/Work1.png" alt="Диск 1" style=" width: 300px; height: 280px;">
            <h2>Work EMITZ</h2>
            <p>Эти безумно вызывающие рельсы обожают знатоки понимающие, что такое настоящий стиль, помимо своей изящности они радуют владельцев своим удивительно легким весом для своих параметров </p>
            <p>Размер: 21</p>
            <p>Кол-во отверситий: 4</p>
            <p>Разболтовка: 112</p>
            <h2 style="margin-top: 10px; margin-bottom: 10px;">Цена: $879</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Work EMITZ">
        <input type="hidden" name="product_price" value="879">
        <input type="hidden" name="product_razbolt" value="112">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="21">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/Work2.jpg" alt="Диск 1" style=" width: 300px; height: 300px;">
            <h2>Work ZEAST BST1</h2>
            <p>Такие малышки всегда будут радовать своим видом на вашей ласточке даже в самый трудный день</p>
            <p>Размер: 20</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 115</p>
            <h2 style="margin-top: 20px; margin-bottom: 20px;">Цена: $499</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Work ZEAST BST1">
        <input type="hidden" name="product_price" value="499">
        <input type="hidden" name="product_razbolt" value="115">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="20">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

        <div class="product-card" style=" width: 550px; height: 550px;">
            <img src="image/Work3.png" alt="Диск 1" style=" width: 300px; height: 300px;">
            <h2>Work GNOSIS CVS</h2>
            <p>Красавцы, которых обожают как профессиональные тюнеры, так и любители надеть на свою лайбу выделяющиеся диски.</p>
            <p>Размер: 21</p>
            <p>Кол-во отверситий: 5</p>
            <p>Разболтовка: 118</p>
            <h2 style="margin-top: 20px; margin-bottom: 20px;">Цена: $569</h2>
            <form method="post" action="about.php">
        <input type="hidden" name="product_name" value="Work GNOSIS CVS">
        <input type="hidden" name="product_price" value="569">
        <input type="hidden" name="product_razbolt" value="118">
        <input type="hidden" name="product_otver" value="5">
        <input type="hidden" name="product_tip" value="Кованные">
        <input type="hidden" name="product_size" value="21">
        <button type="submit" class="korz">Добавить в корзину</button>
    </form>
        </div>

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
    </section>
    <div class="history">
<h2>История создания и развития компании "Rays Wheels":</h2><br>

<p>Начало пути "Rays Wheels" уходит в далекий 1973 год, когда группа предприимчивых инженеров и страстных автолюбителей объединили свои усилия, чтобы создать нечто уникальное в мире автомобильной индустрии. Именно тогда зародилась компания, которая вскоре стала одним из ведущих производителей автомобильных дисков в мире.

<p>С течением лет "Rays Wheels" не только утвердились на рынке, но и смогли завоевать сердца миллионов автолюбителей. В своей истории компания прошла через множество вызовов и трудностей, но каждое преодоленное испытание сделало ее только сильнее. Она выросла из мастерской по производству дисков в мирового лидера в автомобильной индустрии.

<br><h2>Информация о сфере и направлении деятельности компании:</h2><br>

<p>"Rays Wheels" специализируется в производстве высококачественных автомобильных дисков, предназначенных для самых требовательных автолюбителей. Компания известна своим стремлением к инновациям, современным технологиям и уникальному дизайну. Диски "Rays" не только обеспечивают выдающуюся производительность, но и придают автомобилю стильный и элегантный вид.

<p>Направление деятельности компании охватывает производство широкого спектра дисков – от легких и прочных кованных моделей до стильных и функциональных литых вариантов. "Rays Wheels" стремится удовлетворить потребности клиентов в различных стилях, размерах и характеристиках дисков, предлагая индивидуальные решения для каждого автомобиля.

<br><h2>Планы и задачи компании:</h2><br>

<p>Предстоящие годы для "Rays Wheels" обещают быть захватывающими. Компания нацелена на дальнейшее расширение своего влияния на мировом рынке автомобильных аксессуаров. Планы включают в себя разработку новых технологий, улучшение дизайна и функциональности дисков, а также укрепление партнерских отношений с ведущими производителями автомобилей.

<p>"Rays Wheels" стремится не только к производству выдающихся дисков, но и к созданию полного автомобильного опыта. Компания активно участвует в различных автоспортивных мероприятиях, поддерживает автомобильные сообщества и продолжает вдохновлять водителей по всему миру на новые подвиги на дорогах и трассах.

<br><br><a href="product.php" class="ssilki">О продукции</a>  <a href="contact.php" class="ssilki">Контакты</a>

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
