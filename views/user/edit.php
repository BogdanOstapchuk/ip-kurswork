<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->

<!-- REGISTER -->
<div class="container register">
    <h2>Редактирование даных</h2>
    <?php if (!$result):?>
        <?php if (isset($errors) && is_array($errors)):?>
            <ul class="errors">
                <?php foreach ($errors as $error):?>
                    <li><?php echo $error;?></li>
                <?php endforeach;?>
            </ul>
        <?php endif; ?>
    <?php else: ?>
        <p class="correct-register">Даные изменены!</p>
    <?php endif; ?>
    <form action="#" method="post">
        <input type="name" name="name" placeholder="Имя" value="<?php echo $name;?>">
        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password;?>">
        <input type="submit" class="register-btn" name="submit" value="Изменить">
    </form>
</div>
<!-- END REGISTER -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->