<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->

<!-- REGISTER -->
<div class="container register">
    <h2>Регестрация</h2>
    <?php if ($result):?>
     <p class="correct-register">Регестрация прошла успешно!</p>
    <?php else:?>
        <ul class="errors">
            <?php foreach ($errors as $error):?>
                <li><?php echo $error;?></li>
            <?php endforeach;?>
        </ul>
    <?php endif; ?>
    <form action="#" method="post">
        <input type="text "name="name" placeholder="Имя" value="<?php echo $name;?>">
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email;?>">
        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password;?>">
        <input type="submit" class="register-btn" name="submit" value="Регестрация">
        <p>У тебя есть аккаунта? <a href="/user/login"> Войди</a></p>

    </form>
</div>
<!-- END REGISTER -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->