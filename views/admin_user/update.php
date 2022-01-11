<!-- HEADER -->
<?php include ROOT . '/views/layouts/header-admin.php';?>
<!-- END HEADER -->

<!-- MAIN -->
<div class="container ">
    <div class="container-admin">
        <div class="posts">
            <div class="buttons">
                <a href="/admin/user">&#10094;</a>
                <a href="/admin/user" class="add-film">Редактировать</a>
            </div>
            <form action="#" method="post">
                <?php if (isset($errors) && is_array($errors)):?>
                    <ul class="errors">
                        <?php foreach ($errors as $error):?>
                            <li>- <?php echo $error;?></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif; ?>
                <p>Имя:</p>
                <input type="text" name="name" placeholder="" value="<?php echo $user['name'];?>">
                <br/><br/>
                <p>Email:</p>
                <input type="text" name="email" placeholder="" value="<?php echo $user['email'];?>">
                <br/><br/>
                <p>Пароль:</p>
                <input type="password" name="password" placeholder="" value="">
                <br/><br/>
                <p>Роль</p>
                <select name="role">
                    <option value="" <?php if ($user['role'] == "") echo 'selected=selected'?>>Пользователь</option>
                    <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected=selected'?>>Админ</option>
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