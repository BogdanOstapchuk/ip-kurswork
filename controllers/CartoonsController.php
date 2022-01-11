<?php

class CartoonsController
{
    public function actionIndex()
    {
        $cartoons = array();
        $cartoons = Film::getAll("Мультфильм");

        $years = array();
        $years = Film::getAllYears();

        $countries = array();
        $countries = Film::getAllCountries();

        $cartoons = Film::sortFilms("Мультфильм");

        require_once (ROOT . '/views/cartoons/index.php');
        return true;
    }
}