<!-- HEADER -->
<?php include ROOT . '/views/layouts/header-admin.php';?>
<!-- END HEADER -->

<!-- MAIN -->
<div class="container ">
    <div class="container-admin">
        <div class="posts">
                <h1>Управление фильмами</h1>
            <div class="buttons">
                <a href="/admin">&#10094;</a>
                <a href="/admin/film/create" class="add-film">Добавить фильм</a>
            </div>
            <table>
                <thead>
                <tr class="title-row">
                    <th class="id">ID</th>
                    <th class="title">Название</th>
                    <th class="author">Год</th>
                    <th class= "edit"> </th>
                    <th class="dell"> </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($filmsList as $film): ?>
                    <tr class="post">
                        <td><?php echo $film['id']?></td>
                        <td><?php echo $film['name_ru']?></td>
                        <td><?php echo $film['year']?> год</td>
                        <td><a href="/admin/film/update/<?php echo $film['id']?>"><i class="fa fa-edit"></i></a></td>
                        <td><a href="/admin/film/delete/<?php echo $film['id']?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <!-- PAGINATION -->
            <?php echo $pagination->get(); ?>
            <!-- END PAGINATION -->
        </div>
    </div>
    </div>
</div>
<!-- END MAIN -->

<!-- FOOTER -->
<?php include ROOT . '/views/layouts/footer-admin.php';?>
<!-- END FOOTER -->