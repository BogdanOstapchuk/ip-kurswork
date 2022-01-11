<?php

class FilmsController
{
    public function actionIndex()
    {

        $films = array();
        $films = Film::getAll("Фильм");

        $years = array();
        $years = Film::getAllYears();

        $countries = array();
        $countries = Film::getAllCountries();

        $films = Film::sortFilms('Фильм');
        require_once (ROOT . '/views/films/index.php');
        return true;
    }
}