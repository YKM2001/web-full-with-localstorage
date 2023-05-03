<?php
    require_once('../crud/db/db.php');

    $sql = mysqli_query($con, "SELECT * FROM `products` WHERE `categories` = 'экшен'");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action page</title>
    <!-- ? fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- ? icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- ? Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- ? styles -->
    <link rel="stylesheet" href="./styles/categories.css">
</head>
<body>
    <!-- ? header -->
    <header>
        <section class="header">
            <div class="header__container container">
                <div class="header__dropdown">
                    <p class="header__catalog">Каталог
                        <div class="arrow">
                            <span class="material-symbols-outlined">
                                expand_more
                            </span>
                        </div>
                    </p>
                    <ul>
                        <li>
                            <a href="action.php">Экшен</a>
                        </li>
                        <li>
                            <a href="indie.php">Инди</a>
                        </li>
                        <li>
                            <a href="adventures.php">Приключения</a>
                        </li>
                        <li>
                            <a href="strategies.php">Стратегии</a>
                        </li>
                        <li>
                            <a href="anime.php">Аниме</a>
                        </li>
                        <li>
                            <a href="races.php">Гонки</a>
                        </li>
                    </ul>
                </div>
                <nav class="header__menu">
                    <ul class="header__list">
                        <li class="header__item">
                            <a href="index.html" class="header__link">Главная</a>
                        </li>
                    </ul>
                </nav>
                <div class="header__item">
                    <div class="basket__wrapper">
                        <div class="basket__icon">
                            <span class="material-symbols-outlined">
                                shopping_cart
                            </span>
                        </div>
                        <div class="basket__count">0</div>
                        <div class="basket">
                            <ul class="basket__list">
                            </ul>
                            <div class="basket__controllers">
                                <a href="buyItems.php" class="basket__buy">Купить товары</a>
                                <button class="basket__delete">Удалить все товары</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
   
    <div class="wrapper">
        <main class="main">
            <section class="action">
                <div class="action__container container">
                    <h1 class="categories__title">Экшен</h1>
                    <ul class="categories__list">
                            <?php
                                while($row = mysqli_fetch_assoc($sql)) {
                                    echo '
                                        <li class="categories__item">
                                            <article class="card">
                                                <div class="card__image">
                                                    <img src="../crud/'.$row['img'].'" id="card-img">
                                                </div>
                                                <div class="card__body">
                                                    <div class="card__name">'.$row['name'].'</div>
                                                    <div class="card__descr">'.$row['descr'].'</div>
                                                    <div class="card__price">'.$row['price'].'</div>
                                                </div>
                                                <button class="add">Добавить в корзину</button>
                                            </article>
                                        </li>
                                    ';
                                }
                            ?>
                    </ul>
                </div>
            </section>
        </main>
    </div>
    
    <!-- ? footer -->
    <footer>
        <section class="footer">
            <div class="footer__container container">
                <div class="footer__info">
                    Наши контакты: <br>
                    7(999)744-63-39 <br>
                    7(999)299-63-90 <br>
                    steamhotkeys.support.gmail.com 
                </div>
            </div>
        </section>
    </footer>
    <!-- ? Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>