<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->

<!-- container -->
<div class="container search-container">
    <h1>Результаты поиска «<?php echo $_POST['search'];?>»</h1>
    <form action="/search/" method="post">
        <input
                type="text"
                name="search"
                class="test-input"
                placeholder="Поиск..."
                value="<?php echo $_POST['search'];?>"
                required
        />
        <div>
            <input class="search-btn" type="submit" name="submit" value="Поиск">
        </div>
    </form>
    <div class="films">
        <?php if(!$filmsList):?>
            <div class="tear">
                <p>Фильмов по вашему запроссу не найдено!</p>
                <i class="fas fa-sad-tear"></i>
            </div>
        <?php else: ?>
        <?php foreach ($filmsList as $film):?>
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
            </div>
        <?php endforeach; ?>
        <?php endif;?>
    </div>
</div>
<!-- END container -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->