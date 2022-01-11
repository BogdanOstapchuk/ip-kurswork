<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->

<!-- CAROUSEL -->
<div class="container carousel-container">
    <h1>Топ фильмы по мненинию автора</h1>
    <div class="carousel">
        <div class="slides">
            <?php foreach ($isRecommended as $recommended):?>
            <div class="slider-item">
                <img src="/template/img/films_img/<?php echo $recommended['img'];?>" alt="photo-1" />
                <h5><a href="/film/<?php echo $recommended['id'];?>">«<?php echo $recommended['name_ru'];?>» <?php echo $recommended['year'];?> г.</a></h5>
            </div>
            <?php endforeach;?>
        </div>
        <div class="btn-block">
            <div id="left-button">&#10094;</div>
            <div id="right-button">&#10095;</div>
        </div>
        <div class="dots-block">
            <?php foreach ($isRecommended as $recommended):?>
            <div class="dots-item "></div>
            <?php endforeach;?>

        </div>
    </div>
</div>
<!-- END CAROUSEL -->

<!-- MAIN -->
<div class="container main">
    <div class="main-container">
        <h1>Последние поступления</h1>
        <div class="films">
            <?php foreach ($latestFilms as $film):?>
                <div class="film" id="1">
                    <div class="logo-film">
                        <?php if($film['is_new'] == 1):?>
                        <p>NEW</p>
                            <?php if($film['rating'] > 8):?>
                                <img class="green" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php elseif($film['rating'] > 6):?>
                                <img class="orange" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php else:?>
                                <img class="red" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php endif;?>
                        <?php else:?>
                            <?php if($film['rating'] > 8):?>
                                <img class="green" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php elseif($film['rating'] > 6):?>
                                <img class="orange" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php else:?>
                                <img class="red" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php endif;?>
                        <?php endif;?>

                    </div>
                    <div class="names-film">
                        <a href="/film/<?php echo $film['id'];?>">
                        <p class="names-ru"><?php echo $film['name_ru']?></p>
                        <p class="type-film"><?php echo $film['type']?> (<?php echo $film['year']?> год)</p>
                        </a>
                    </div>
                    <a href="#" class="add-to-save" data-id="<?php echo $film['id']?>"><i class="fas fa-bookmark"></i> Сохранить</a>
                </div>
            <?php endforeach; ?>
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
                    <a href="/genre/<?php echo $genreItem['id'];?>"
                    >
                        <?php echo $genreItem['name'];?>
                    </a>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<!-- END MAIN -->
<!-- MAIN 2 -->
<div class="container searchFilmsYear">
    <h1>Фильмы <?php echo $searchFilmsYear[0]['year'];?> года</h1>
    <div class="rev_slider">
        <?php if(!$searchFilmsYear):?>
            <div class="tear">
                <p>Фильмы <?php echo $searchFilmsYear[0]['year'];?> еще не загружено.</p>
                <i class="fas fa-sad-tear"></i>
            </div>
        <?php else: ?>
            <?php foreach ($searchFilmsYear as $film):?>
                <div class="film swiper-slide" id="1">
                    <div class="logo-film">
                        <?php if($film['is_new'] == 1):?>
                            <p>NEW</p>
                            <?php if($film['rating'] > 8):?>
                                <img class="green" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php elseif($film['rating'] > 6):?>
                                <img class="orange" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php else:?>
                                <img class="red" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php endif;?>
                        <?php else:?>
                            <?php if($film['rating'] > 8):?>
                                <img class="green" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php elseif($film['rating'] > 6):?>
                                <img class="orange" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php else:?>
                                <img class="red" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php endif;?>
                        <?php endif;?>
                    </div>
                    <div class="names-film">
                        <a href="/film/<?php echo $film['id'];?>">
                            <p class="names-ru"><?php echo $film['name_ru']?></p>
                            <p class="type-film"><?php echo $film['type']?> (<?php echo $film['year']?> год)</p>
                        </a>
                    </div>
                    <a href="#" class="add-to-save" data-id="<?php echo $film['id']?>"><i class="fas fa-bookmark"></i> Сохранить</a>
                </div>
            <?php endforeach; ?>
        <?php endif;?>
    </div>
</div>
<!-- END MAIN 2 -->

<!-- MAIN 3 -->
<div class="container searchFilmsYear">
    <h1>Новинки</h1>
    <div class="rev_slider">
        <?php if(!$isNew):?>
            <div class="tear">
                <p>Новинки еще не загружено.</p>
                <i class="fas fa-sad-tear"></i>
            </div>
        <?php else: ?>
            <?php foreach ($isNew as $film):?>
                <div class="film swiper-slide" id="1">
                    <div class="logo-film">
                        <?php if($film['is_new'] == 1):?>
                            <p>NEW</p>
                            <?php if($film['rating'] > 8):?>
                                <img class="green" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php elseif($film['rating'] > 6):?>
                                <img class="orange" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php else:?>
                                <img class="red" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php endif;?>
                        <?php else:?>
                            <?php if($film['rating'] > 8):?>
                                <img class="green" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php elseif($film['rating'] > 6):?>
                                <img class="orange" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php else:?>
                                <img class="red" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />
                            <?php endif;?>
                        <?php endif;?>
                    </div>
                    <div class="names-film">
                        <a href="/film/<?php echo $film['id'];?>">
                            <p class="names-ru"><?php echo $film['name_ru']?></p>
                            <p class="type-film"><?php echo $film['type']?> (<?php echo $film['year']?> год)</p>
                        </a>
                    </div>
                    <a href="#" class="add-to-save" data-id="<?php echo $film['id']?>"><i class="fas fa-bookmark"></i> Сохранить</a>
                </div>
            <?php endforeach; ?>
        <?php endif;?>
    </div>
</div>
<!-- END MAIN 3 -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->

