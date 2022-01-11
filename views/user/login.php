<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->

<!-- REGISTER -->
<div class="container register">
    <h2>Вход</h2>
        <?php if (isset($errors) && is_array($errors)):?>
            <ul class="errors">
                <?php foreach ($errors as $error):?>
                    <li><?php echo $error;?></li>
                <?php endforeach;?>
            </ul>
        <?php endif; ?>
    <form action="#" method="post">
        <input type="email" name="email" placeholder="E-mail" value="<?php echo $email;?>">
        <input type="password" name="password" placeholder="Пароль" value="<?php echo $password;?>">
        <input type="submit" class="register-btn" name="submit" value="Войти">
        <p>У тебя нет аккаунта? <a href="/user/register"> Зарегестрируйся</a></p>
    </form>
</div>
<!-- END REGISTER -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->