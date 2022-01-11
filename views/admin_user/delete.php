<!-- HEADER -->
<?php include ROOT . '/views/layouts/header-admin.php';?>
<!-- END HEADER -->

<!-- MAIN -->
<div class="container ">
    <div class="container-admin delete">
        <h1>Удалить пользователя № <?php echo $id;?></h1>
        <div class="buttons">
            <a href="/admin/film">&#10094;</a>
            <p>Вы действительно хотите удалить пользователя № <?php echo $id;?>?</p>
        </div>
        <form method="post">
            <input type="submit" name="submit" value="Да, удалить!">
        </form>
    </div>
</div>
<!-- END MAIN -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer-admin.php';?>
<!-- END FOOTER -->