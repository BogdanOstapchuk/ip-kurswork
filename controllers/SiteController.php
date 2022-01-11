<?php

class SiteController
{
    public function actionIndex()
    {
        $genres = array();
        $genres = Genres::getGenresList();

        $latestFilms = array();
        $latestFilms = Film::getLatestFilm(8);

        $isRecommended = array();
        $isRecommended = Film::getFilmsIsRecommended();

        $isNew = array();
        $isNew = Film::getFilmsIsNew();

        $searchFilmsYear = array();
        $searchFilmsYear = Film::searchFilmsByYear(2021);

        require_once (ROOT .'/views/site/index.php');
        return true;
    }
    public function actionError()
    {

        require_once (ROOT .'/views/site/404.php');
        return true;
    }
}