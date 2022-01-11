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
                <p>Название жанра:</p>
                <input type="text" name="name" placeholder="" value="<?php echo $genre['name'];?>">
                <br/><br/>

                <p>Порядок сортировки: </p>
                <select name="sort_order">
                    <option value="1" <?php if ($genre['sort_order'] == 1) echo 'selected=selected'?>>1</option>
                    <option value="2" <?php if ($genre['sort_order'] == 2) echo 'selected=selected'?>>2</option>
                    <option value="3" <?php if ($genre['sort_order'] == 3) echo 'selected=selected'?>>3</option>
                    <option value="4" <?php if ($genre['sort_order'] == 4) echo 'selected=selected'?>>4</option>
                    <option value="5" <?php if ($genre['sort_order'] == 5) echo 'selected=selected'?>>5</option>
                </select>
                <br/><br/>

                <p>Статус</p>
                <select name="status">
                    <option value="1" <?php if ($genre['status'] == 1) echo 'selected=selected'?>>Отображается</option>
                    <option value="0" <?php if ($genre['status'] == 0) echo 'selected=selected'?>>Скрыт</option>
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