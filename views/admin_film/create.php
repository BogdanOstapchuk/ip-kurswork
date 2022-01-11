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
                    <option value="Фильм" selected="selected">Фильм</option>
                    <option value="Мультфильм">Мультфильм</option>
                    <option value="Сериал">Сериал</option>
                </select>
                <p>Жанр:</p>
                <select name="id_genre">
                    <?php if (is_array($genresList)):?>
                    <?php foreach ($genresList as $genre):?>
                    <option value="<?php echo $genre['id'];?>">
                        <?php echo $genre['name'];?>
                    </option>
                    <?php endforeach; ?>
                    <? endif; ?>
                </select>
                <br/><br/>

                <p>Cтрана</p>
                <input type="text" name="country" placeholder="" value="<?php echo $film['country'];?>">

                <p>Изображение превью:</p>
                <input type="file" name="img_preview" placeholder="" value="">
                <p>Изображение:</p>
                <input type="file" name="img" placeholder="" value="" >

                <p>Ссылка на трейлер </p>
                <input type="text" name="trailer" placeholder="" value="<?php echo $film['trailer'];?>">
                <p>Детальное описание</p>
                <textarea name="description"><?php echo $film['description'];?></textarea>

                <br/><br/>

                <p>Минимальный возраст для просмотра:</p>
                <select name="age">
                    <option value="18" selected="selected">18+</option>
                    <option value="16">16+</option>
                    <option value="12">12+</option>
                    <option value="6">6+</option>
                    <option value="0">0+</option>
                </select>

                <br/><br/>

                <p>Новинка</p>
                <select name="is_new">
                    <option value="1" selected="selected">Да</option>
                    <option value="0">Нет</option>
                </select>

                <br/><br/>

                <p>Рекомендуемые</p>
                <select name="is_recommended">
                    <option value="1" selected="selected">Да</option>
                    <option value="0">Нет</option>
                </select>

                <br/><br/>

                <p>Статус</p>
                <select name="status">
                    <option value="1" selected="selected">Отображается</option>
                    <option value="0">Скрыт</option>
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