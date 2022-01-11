<?php

class AdminUserController extends AdminBase
{
    public function actionIndex($page = 1)
    {
        self::checkAdmin();
        $usersList = User::getUserListWithPage($page);
        $total = User::getUsersList();
        $pagination = new Pagination(count($total), $page, User::SHOW_BY_DEFAULT_USER, 'page-');

        require_once (ROOT . '/views/admin_user/index.php');

        return true;
    }
    public function actionCreate()
    {
        self::checkAdmin();
        $user['name'] = '';
        $user['email'] = '';
        $user['password'] = '';
        $user['role'] = '';

        $result = false;

        $usersList = User::getUsersList();

        if (isset($_POST['submit'])){
            $user['name'] = $_POST['name'];
            $user['email'] = $_POST['email'];
            $user['password'] = $_POST['password'];
            $user['role'] = $_POST['role'];
            $errors = false;
            if(!User::checkName($user['name'])){
                $errors[] = 'Имя короче 2 символов';
            }
            if(!User::checkEmail($user['email'])){
                $errors[] = 'Неправильный email';
            }
            if(!User::checkPassword($user['password'])){
                $errors[] = 'Пароль короче 6 символов';
            }
            if(User::checkEmailExists($user['email'])){
                $errors[] = 'Такой email уже зарегестрирован!';
            }
            if ($errors == false){
                $user['password'] = md5($user['password']);
                $result = User::createUser($user);
                header("Location: /admin/user");
            }
        }
        require_once (ROOT . '/views/admin_user/create.php');
        return true;
    }
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $user['name'] = '';
        $user['email'] = '';
        $user['role'] = '';

        $errors = false;

        $user = User::getUserById($id);

        if (isset($_POST['submit'])){
            $user['name'] = $_POST['name'];
            $user['email'] = $_POST['email'];
            $user['password'] = $_POST['password'];
            $user['role'] = $_POST['role'];

            if(!User::checkName($user['name'])){
                $errors[] = 'Имя короче 2 символов';
            }
            if(!User::checkEmail($user['email'])){
                $errors[] = 'Неправильный email';
            }
            if(!User::checkPassword($user['password'])){
                $errors[] = 'Пароль короче 6 символов';
            }
            if ($errors == false){
                $user['password'] = md5($user['password']);
                $result = User::updateUserById($id, $user);
                header("Location: /admin/user");
            }
        }
        require_once (ROOT . '/views/admin_user/update.php');
        return true;
    }
    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])){
            User::deleteUserById($id);
            header("Location: /admin/user");
        }
        require_once (ROOT . '/views/admin_user/delete.php');
        return true;
    }
}