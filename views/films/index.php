<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->
<!-- MAIN -->
<div class="container sort-container">
    <h1>Фильмы</h1>
    <form action="/films/" method="post" class="sort-form">
        <div class="row-1">
            <?php if ($_POST['years'] ?? ''): ?>
                <select name="years">
                    <option value="default">Выберите год</option>
                    <?php foreach ($years as $year):?>
                        <option value="<?php echo $year['year'];?>" <?php if ($_POST['years'] ==  $year['year']) echo 'selected';?>><?php echo $year['year'];?></option>
                    <?php endforeach; ?>
                </select>
            <?php else:?>
                <select name="years">
                    <option value="default">Выберите год</option>
                    <?php foreach ($years as $year):?>
                        <option value="<?php echo $year['year'];?>"><?php echo $year['year'];?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif;?>
            <?php if ($_POST['countries'] ?? ''): ?>
            <select name="countries">
                <option value="default">Выберите страну</option>
                <?php foreach ($countries as $country):?>
                    <option value="<?php echo $country['country'];?>" <?php if ($_POST['countries'] ==  $country['country']) echo 'selected';?>><?php echo $country['country'];?></option>
                <?php endforeach; ?>
            </select>
            <?php else:?>
            <select name="countries">
                <option value="default">Выберите страну</option>
                <?php foreach ($countries as $country):?>
                    <option value="<?php echo $country['country'];?>"><?php echo $country['country'];?></option>
                <?php endforeach; ?>
            </select>
            <?php endif;?>
        </div>
        <div class="row-2">
            <?php if ($_POST['rating'] ?? ''): ?>
            <select name="rating">
                <option value="default">Выберите рейтинг</option>
                <option value="9" <?php if ($_POST['rating'] ==  9) echo 'selected';?>>Больше 9</option>
                <option value="8" <?php if ($_POST['rating'] ==  8) echo 'selected';?>>Больше 8</option>
                <option value="7" <?php if ($_POST['rating'] ==  7) echo 'selected';?>>Больше 7</option>
                <option value="6" <?php if ($_POST['rating'] ==  6) echo 'selected';?>>Больше 6</option>
                <option value="5" <?php if ($_POST['rating'] ==  5) echo 'selected';?>>Больше 5</option>
            </select>
            <?php else:?>
                <select name="rating">
                    <option value="default">Выберите рейтинг</option>
                    <option value="9" >Больше 9</option>
                    <option value="8" >Больше 8</option>
                    <option value="7" >Больше 7</option>
                    <option value="6" >Больше 6</option>
                    <option value="5" >Больше 5</option>
                </select>
            <?php endif; ?>
            <input type="submit" name="submit" value="Поиск" class="sort-btn">
        </div>
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
        <?php endif; ?>
    </div>
</div>
<!-- END MAIN -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->