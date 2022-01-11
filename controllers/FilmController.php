<?php

class FilmController
{
    public function actionView($filmById)
    {
        $genres = array();
        $genres = Genres::getGenresList();

        $film = Film::getFilmById($filmById);


        require_once (ROOT .'/views/film/view.php');
        return true;
    }
}