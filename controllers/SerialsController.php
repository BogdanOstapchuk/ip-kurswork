<?php

class SerialsController
{
    public function actionIndex()
    {
        $serials = array();
        $serials = Film::getAll("Сериал");

        $years = array();
        $years = Film::getAllYears();

        $countries = array();
        $countries = Film::getAllCountries();

        $serials = Film::sortFilms("Сериал");
        require_once (ROOT . '/views/serials/index.php');
        return true;
    }
}