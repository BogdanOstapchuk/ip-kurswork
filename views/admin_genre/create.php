<!-- HEADER -->
<?php include ROOT . '/views/layouts/header-admin.php';?>
<!-- END HEADER -->

<!-- MAIN -->
<div class="container ">
    <div class="container-admin">
        <div class="posts">
            <div class="buttons">
                <a href="/admin/genre">&#10094;</a>
                <a href="/admin/genre" class="add-film">Редактировать</a>
            </div>
            <form action="#" method="post">
                <?php if (isset($errors) && is_array($errors)):?>
                    <ul class="errors">
                        <?php foreach ($errors as $error):?>
                            <li>- <?php echo $error;?></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif; ?>
                <p>Название жанра:</p>
                <input type="text" name="name" placeholder="" value="<?php echo $genre['name'];?>">
                <br/><br/>

                <p>Порядок сортировки: </p>
                <select name="sort_order">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
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