<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->

<!-- MAIN -->
<div class="container save-container">
    <h2>Сохраненные фильмы</h2>
    <form action="/cabinet/save/" method="post">
        <input name="submit" type="submit" value="Сохранить фильмы">
    </form>
    <div class="films">
        <?php if(!$films):?>
            <div class="tear">
                <p>Фильмы еще не загружено.</p>
                <i class="fas fa-sad-tear"></i>
            </div>
        <?php else: ?>
        <?php foreach ($films as $film):?>
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
<!-- END MAIN -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->