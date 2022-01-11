<?php

class CabinetController
{
    public function actionindex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once (ROOT . '/views/parlor/index.php');
        return true;
    }
    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = '';

        $result = false;

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $password = $_POST['password'];
        }
        $errors = false;

        if(!User::checkName($name)){
            $errors[] = 'Имя короче 2 символов';
        }
        if(!User::checkPassword($password)){
            $errors[] = 'Пароль короче 6 символов';
        }
        if ($errors == false){
            $result = User::edit($userId, $name, $password);
        }
        require_once(ROOT . '/views/user/edit.php');

        return true;
    }
    public function actionSave()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $filmsInSave = false;
        if (isset($_SESSION['films'])) {
            $filmsInSave = $_SESSION['films'];
        }
        if ($filmsInSave){
            $filmsIds = array();
            $filmsIds = array_keys($filmsInSave);

            $idsString = implode(',', $filmsIds);

            foreach ($_SESSION['films'] as $id => $quantity){
                if ($quantity == 0){
                    unset( $_SESSION['films'][$id] );
                }
            }
            $idsString = $_SESSION['films'];
            $filmsIds = array_keys($idsString);
            unset($filmsIds[0]);
            $filmsIds = implode(',', $filmsIds);
            $idsString = $user['save'] .',' . $filmsIds;
            $result = explode(',', $idsString);
            $idsString = array_diff($result, array_diff_assoc($result, array_unique($result)));

            $idsString = array_unique($idsString, SORT_REGULAR);
            $string = implode(',', $idsString);
            $idsString = trim($string, ",");
            $films = Film::getFilmByIds($idsString);
        }else{
            $idsString = $user['save'];
            $films = Film::getFilmByIds($idsString);
        }

        if (isset($_POST['submit'])) {
            $result = User::addSaves($user['id'], $idsString);
        }
        require_once (ROOT.'/views/user/save.php');
        return true;
    }
}