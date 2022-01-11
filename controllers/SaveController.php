<?php

class SaveController
{
    public function actionAdd($id)
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);
        $strintSaved = $user['save'];
        echo Save::addFilm($id, $strintSaved);
        return true;
    }
}