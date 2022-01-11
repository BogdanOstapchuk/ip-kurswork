<!-- HEADER -->
<?php include ROOT . '/views/layouts/header.php';?>
<!-- END HEADER -->

<!-- Cabinet -->
<div class="container cabinet">
    <h2>Кабинет</h2>
    <p>Добро пожаловать <?php echo $user['name'];?>!</p>
    <ul>
        <li><a href="/cabinet/edit">Настройки</a><i class="fas fa-user-cog"></i></li>
        <li><a href="/cabinet/save">Смотреть позже</a><i class="far fa-bookmark"></i></li>
        <li><a href="/support/">Помощь</a><i class="fas fa-headset"></i></li>
        <?php if ($user['role'] == 'admin'):?>
            <li><a href="/admin">Админ панель </a><i class="fas fa-user-shield"></i></li>
        <?php endif;?>
    </ul>
</div>
<!-- END Cabinet -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer.php';?>
<!-- END FOOTER -->