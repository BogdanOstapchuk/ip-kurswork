<!-- HEADER -->
<?php include ROOT . '/views/layouts/header-admin.php';?>
<!-- END HEADER -->

<!-- MAIN -->
<div class="container ">
    <div class="container-admin">
        <div class="posts">
            <h1>Управление жанрами</h1>
            <div class="buttons">
                <a href="/admin">&#10094;</a>
                <a href="/admin/genre/create" class="add-film">Добавить жанр</a>
            </div>
            <table>
                <thead>
                <tr class="title-row">
                    <th class="id">ID</th>
                    <th class="title">Название</th>
                    <th class="status">Статус</th>
                    <th class= "edit"> </th>
                    <th class="dell"> </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($genresList as $genre): ?>
                    <tr class="post">
                        <td><?php echo $genre['id']?></td>
                        <td><?php echo $genre['name']?></td>
                        <td><?php echo $genre['status']?></td>
                        <td><a href="/admin/genre/update/<?php echo $genre['id']?>"><i class="fa fa-edit"></i></a></td>
                        <td><a href="/admin/genre/delete/<?php echo $genre['id']?>"><i class="fas fa-trash-alt"></i></a></td>
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