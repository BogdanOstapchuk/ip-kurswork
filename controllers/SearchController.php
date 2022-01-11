<?php

class SearchController
{
    public function actionIndex()
    {
        $search = explode(" ", $_POST['search']);
        if($_POST['search'])
            $filmsList = Film::searchFilms($search);

        require_once (ROOT . '/views/search/index.php');
        return true;
    }
}