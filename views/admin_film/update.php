<!-- HEADER -->
<?php include ROOT . '/views/layouts/header-admin.php';?>
<!-- END HEADER -->

<!-- MAIN -->
<div class="container ">
    <div class="container-admin">
        <div class="posts">
            <div class="buttons">
                <a href="/admin/film">&#10094;</a>
                <a href="/admin/film" class="add-film">Редактировать</a>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                <?php if (isset($errors) && is_array($errors)):?>
                    <ul class="errors">
                        <?php foreach ($errors as $error):?>
                            <li>- <?php echo $error;?></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif; ?>
                <p>Название фильма RU:</p>
                <input type="text" name="name_ru" placeholder="" value="<?php echo $film['name_ru'];?>">
                <p>Название фильма En:</p>
                <input type="text" name="name_en" placeholder="" value="<?php echo $film['name_en'];?>">
                <p>Рейтинг: </p>
                <input type="text" name="rating" placeholder="" value="<?php echo $film['rating'];?>">

                <p>Год</p>
                <input type="text" name="year" placeholder="" value="<?php echo $film['year'];?>">

                <p>Время фильма в мин:</p>
                <input type="text" name="time" placeholder="" value="<?php echo $film['time'];?>">
                <p>Тип:</p>
                <select name="type">
                    <option value="Фильм" <?php if ($film['type'] == 'Фильм') echo 'selected=selected'?>>Фильм</option>
                    <option value="Мультфильм" <?php if ($film['type'] == 'Мультфильм') echo 'selected=selected'?>>Мультфильм</option>
                    <option value="Сериал" <?php if ($film['type'] == 'Сериал') echo 'selected=selected'?>>Сериал</option>
                </select>
                <p>Жанр:</p>
                <select name="id_genre">
                    <?php if (is_array($genresList)):?>
                        <?php foreach ($genresList as $genre):?>
                            <option value="<?php echo $genre['id'];?>"
                            <?php if ($film['id_genre'] == $genre['id']) echo 'selected=selected'?>>
                                <?php echo $genre['name'];?>
                            </option>
                        <?php endforeach; ?>
                    <? endif; ?>
                </select>
                <br/><br/>

                <p>Cтрана</p>
                <input type="text" name="country" placeholder="" value="<?php echo $film['country'];?>">

                <p>Изображение превью:</p>
                <img width="100" src="<?php echo Film::getPreviewImg($film['img_preview']);?>" alt="">
                <input type="file" name="img_preview" placeholder="" value="<?php echo $film['img_preview'];?>">
                <p>Изображение:</p>
                <img width="100" " src="<?php echo Film::getImg($film['img']);?>" alt="">
                <input type="file" name="img" placeholder="" value="<?php echo $film['img'];?>">

                <p>Ссылка на трейлер </p>
                <input type="text" name="trailer" placeholder="" value="<?php echo $film['trailer'];?>">
                <p>Детальное описание</p>
                <textarea name="description"><?php echo $film['description'];?></textarea>

                <br/><br/>

                <p>Минимальный возраст для просмотра:</p>
                <select name="age">
                    <option value="18" <?php if ($film['age'] == 18) echo 'selected=selected'?>>18+</option>
                    <option value="16"  <?php if ($film['age'] == 16) echo 'selected=selected'?>>16+</option>
                    <option value="12"  <?php if ($film['age'] == 12) echo 'selected=selected'?>>12+</option>
                    <option value="6"  <?php if ($film['age'] == 6) echo 'selected=selected'?>>6+</option>
                    <option value="0"  <?php if ($film['age'] == 0) echo 'selected=selected'?>>0+</option>
                </select>

                <br/><br/>

                <p>Новинка</p>
                <select name="is_new">
                    <option value="1" <?php if ($film['is_new'] == 1) echo 'selected=selected'?>>Да</option>
                    <option value="0" <?php if ($film['is_new'] == 0) echo 'selected=selected'?>>Нет</option>
                </select>

                <br/><br/>

                <p>Рекомендуемые</p>
                <select name="is_recommended">
                    <option value="1" <?php if ($film['is_recommended'] == 1) echo 'selected=selected'?>>Да</option>
                    <option value="0" <?php if ($film['is_recommended'] == 0) echo 'selected=selected'?>>Нет</option>
                </select>

                <br/><br/>

                <p>Статус</p>
                <select name="status">
                    <option value="1" <?php if ($film['status'] == 1) echo 'selected=selected'?>>Отображается</option>
                    <option value="0" <?php if ($film['status'] == 0) echo 'selected=selected'?>>Скрыт</option>
                </select>

                <br/><br/>

                <input type="submit" name="submit" class="create-btn" value="Сохранить">

                <br/><br/>

            </form>
        </div>
    </div>
</div>
</div>
<!-- END MAIN -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer-admin.php';?>
<!-- END FOOTER -->