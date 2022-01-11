<?php

class User
{
    const SHOW_BY_DEFAULT_USER = 10;
    /**
     * Регестрація
     */
    public static function register($name, $email, $password)
    {
        // З'єднаняя з БД
        $db = Db::getConnection();
        // SQL запит
        $sql = 'INSERT INTO user (name, email, password) '
            . 'VALUES (:name, :email, :password)';
        // Хешування паролю
        $password = md5($password);
        // Підготовляє запит до виконання та повертає пов'язаний із цим запитом об'єкт
        $result = $db->prepare($sql);
        //Прив'язує параметри запиту до змінних
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Отримання користувачів на вибраной строінці пагінації
     */
    public static function getUserListWithPage($page)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT_USER;

        $db = Db::getConnection();

        $sql ="SELECT id, email, role FROM user LIMIT "
            . self::SHOW_BY_DEFAULT_USER . " OFFSET ". $offset;
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()){
            $filmsList[$i]['id'] = $row['id'];
            $filmsList[$i]['email'] = $row['email'];
            $filmsList[$i]['role'] = $row['role'];
            $i++;
        }
        return $filmsList;
    }
    /**
     * Перевірка для форми входу/егестрації
     */
    public static function checkName($name)
    {
        if(strlen($name)>= 2){
            return true;
        }
        return false;
    }
    public static function checkPassword($password)
    {
        if(strlen($password)>= 6){
            return true;
        }
        return false;
    }
    /**
     * Перевірка на валідацію Email
     */
    public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    /**
     * Перевірка на існування Email в БД
     */
    public static function checkEmailExists($email){
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()){
            return true;
        }
        return false;

    }
    /**
     * Перевірка чи дані співпадаюсь в формі входу та бд
     */
    public static  function  checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $password = md5($password);
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);

        $result->execute();
        $user = $result->fetch();
        if ($user){
            return $user['id'];
        }
        return false;
    }
    /**
     * Передача id ористувача з сесії
     */
    public static  function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }
    /**
     * Перевірка на авторизацію
     */
    public static function checkLogged()
    {
        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }
    /**
     * Перевірка чи користувач гость
     */
    public static function isGuest()
    {
        if(isset($_SESSION['user'])){
            return false;
        }
        return true;
    }
    /**
     * Пошук користувача по id
     */
    public static function getUserById($id)
    {
        if ($id){
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }
    /**
     * Зміна даних користувача
     */
    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();
        $password = md5($password);
        $sql = "UPDATE user SET name = :name, password = :password WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->execute();
    }
    /**
     * Збереження збережених фільмів
     */
    public static function addSaves($id, $save)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user SET save = :save WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':save', $save, PDO::PARAM_STR);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->execute();
    }
    /**
     * Список користувачів
     */
    public static function getUsersList()
    {
        $db = Db::getConnection();
        $usersList = array();
        $result = $db->query("SELECT id, email, role, name, password FROM user");
        $i= 0;
        while ($row = $result->fetch()){
            $usersList[$i]['id']= $row['id'];
            $usersList[$i]['email']= $row['email'];
            $usersList[$i]['role']= $row['role'];
            $usersList[$i]['name']= $row['name'];
            $usersList[$i]['password']= $row['password'];
            $i++;
        }
        return $usersList;
    }
    /**
     * Створення нового користувача
     */
    public static function createUser($user)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO `user`(`email`, `name`, `password`, `role`) VALUES (:email,:name,:password,:role)";
        $result = $db->prepare($sql);
        $result->bindParam(':email', $user['email'], PDO::PARAM_STR);
        $result->bindParam(':name', $user['name'], PDO::PARAM_STR);
        $result->bindParam(':password', $user['password'], PDO::PARAM_STR);
        $result->bindParam(':role', $user['role'], PDO::PARAM_STR);

        return $result->execute();
    }
    /**
     * Зміна даних користувача
     */
    public static function updateUserById($id, $user)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `user` SET `email`=:email,`name`=:name,`password`=:password, `role`=:role WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $user['email'], PDO::PARAM_STR);
        $result->bindParam(':name', $user['name'], PDO::PARAM_STR);
        $result->bindParam(':password', $user['password'], PDO::PARAM_STR);
        $result->bindParam(':role', $user['role'], PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }
    /**
     * Видалення користувача
     */
    public static function deleteUserById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM user WHERE id= :id';
        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        return $result->execute();
    }
}