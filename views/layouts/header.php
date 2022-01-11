<!DOCTYPE html>
<html lang="ru" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link  href="/template/css/style.css" rel="stylesheet" ">
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
        crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            rel="stylesheet"
            href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="/template/slick/slick.css">
    <link rel="stylesheet" href="/template/slick/slick-theme.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    />
    <title>Movies</title>
</head>
<body>
<!-- HEADER -->
<header>
    <div class="container">
        <div class="row">
            <div class="logo">
                <h1><a href="/">Movies</a></h1>
            </div>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/catalog/">Каталог</a></li>
                <li><a href="/cabinet/save/">Сохраненные</a></li>
                <?php if (User::isGuest()):?>
                <li><a href="/user/login/"><i class="fas fa-sign-in-alt"></i> Вход</a></li>
                <?php else:?>
                <li>
                    <a href="/cabinet/">
                        <i class="fas fa-user"></i>
                        Кабинет
                    </a>
                    <ul>
                        <li><a href="/user/logout/">Выход</a></li>
                    </ul>
                </li>
                <?php endif;?>
            </ul>
        </nav>
        <div class="burger">
            <span></span>
        </div>
    </div>
</header>