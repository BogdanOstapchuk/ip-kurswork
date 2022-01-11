<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->
<div class="container film-container">
    <div class="info-film">
        <h1><?php echo $film['name_ru'];?></h1>
        <h3><?php echo $film['name_en'];?></h3>
        <div class="film-row">
            <div class="img-film">
                <img src="<?php echo Film::getImg($film['img']);?>" alt="film_poster">
            </div>
            <div class="more-info">
                <h2>Дополнительная информация</h2>
                <p>Рейтинг: <?php echo $film['rating'];?> </p>
                <p>Дата выхода: <?php echo $film['year'];?> </p>
                <p>Страна: <?php echo $film['country'];?> </p>
                <p>Тип: <?php echo $film['type'];?> </p>
                <p>Возраст: <?php echo $film['age'];?>+ </p>
                <p>Время: <?php echo $film['time'];?> мин </p>
            </div>
        </div>
           <div class="description">
               <h1>Сценарий:</h1>
               <p><?php echo $film['description'];?> </p>
           </div>
        <div class="trailer">
            <h1>Трейлер</h1>
            <iframe width="560" height="315" src="<?php echo $film['trailer'];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <div class="sidebar">
        <div class="search">
            <h3>Поиск</h3>
            <form action="/search/" method="post">
                <input
                        type="text"
                        name="search"
                        class="test-input"
                        placeholder="Поиск..."
                        required
                />
            </form>
        </div>
        <div class="genres">
            <h3>Жанры</h3>
            <ul>
                <?php foreach ($genres as $genreItem):?>
                    <li>
                        <a href="/genre/<?php echo $genreItem['id'];?>" id="<?php echo $genreItem['id'];?>">
                            <?php echo $genreItem['name'];?>

                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->

