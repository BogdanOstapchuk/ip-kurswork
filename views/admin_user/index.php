<!-- HEADER -->
<?php include ROOT . '/views/layouts/header-admin.php';?>
<!-- END HEADER -->

<!-- MAIN -->
<div class="container ">
    <div class="container-admin">
        <div class="posts">
            <h1>Управление пользователями</h1>
            <div class="buttons">
                <a href="/admin">&#10094;</a>
                <a href="/admin/user/create" class="add-film">Добавить пользователя</a>
            </div>
            <table>
                <thead>
                <tr class="title-row">
                    <th class="id">ID</th>
                    <th class="email">Email</th>
                    <th class="role">Роль</th>
                    <th class= "edit"> </th>
                    <th class="dell"> </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($usersList as $user): ?>
                    <tr class="post">
                        <td><?php echo $user['id']?></td>
                        <td><?php echo $user['email']?></td>
                        <td><?php echo $user['role']?></td>
                        <td><a href="/admin/user/update/<?php echo $user['id']?>"><i class="fa fa-edit"></i></a></td>
                        <td><a href="/admin/user/delete/<?php echo $user['id']?>"><i class="fas fa-trash-alt"></i></a></td>
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