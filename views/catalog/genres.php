<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->

<!-- MAIN -->
<div class="container main">
    <div class="main-container">
        <h1><?php echo $genreName;?></h1>
        <div class="films">
            <?php if(!$categoryFilms):?>
                <div class="tear">
                    <p>Фильмы с даным жанром еще не загружено.</p>
                    <i class="fas fa-sad-tear"></i>
                </div>
            <?php else: ?>
            <?php foreach ($categoryFilms as $film):?>
                <div class="film" id="1">
                    <div class="logo-film">
                        <?php if($film['rating'] > 8):?>
                            <img class="green" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />

                        <?php elseif($film['rating'] > 6):?>
                            <img class="orange" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />

                        <?php else:?>
                            <img class="green" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="photo-1" />

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
        <!-- PAGINATION -->
        <?php echo $pagination->get(); ?>
        <!-- END PAGINATION -->
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
                        <a href="/genre/<?php echo $genreItem['id'];?>" id="<?php echo $genreItem['id'];?>" class="<?php $str = $_SERVER['REQUEST_URI'];
                        preg_match_all("/\d+/", $str, $matches);
                        if ($matches[0][0] == $genreItem['id']) echo 'active';
                        ?>">
                            <?php echo $genreItem['name'];?>

                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
<!-- END MAIN -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->

