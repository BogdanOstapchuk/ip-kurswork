<?php

class CatalogController
{
    public function actionIndex($page = 1)
    {
        $genres = array();
        $genres = Genres::getGenresList();


        $latestFilms = array();
        $latestFilms = Film::getFilmLists($page);
        $total = count(Film::getFilmList());


        $pagination = new Pagination($total, $page, Film::SHOW_BY_DEFAULT_CATALOG, 'page-');

        require_once (ROOT .'/views/catalog/index.php');
        return true;
    }
    public function actionGenre($genresId, $page = 1)
    {

        $genres = Genres::getGenresList();
        if (isset($genres)){
            $categoryFilms = array();
            $categoryFilms = Film::getFilmsListByGenre($genresId, $page);
            $genreName = Genres::getGenreById($genresId);
            $genreName = $genreName['name'];
            $total = Film::getTotalFilmsInCategory($genresId);
            $pagination = new Pagination($total, $page, Film::SHOW_BY_DEFAULT, 'page-');
        }


        require_once (ROOT .'/views/catalog/genres.php');
        return true;
    }
}