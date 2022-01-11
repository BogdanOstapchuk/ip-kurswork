<?php

class Film
{
    const SHOW_BY_DEFAULT = 4;
    const SHOW_BY_DEFAULT_CATALOG = 8;
    const SHOW_BY_DEFAULT_FILM = 10;

    /**
     * Отримання фільмів з БД
     */
    public static function getFilmList()
    {
        $db = Db::getConnection();

        $filmsList = array();

        $result = $db->query("SELECT id, name_ru, rating, type, year, is_new, img_preview FROM film");
        $i = 0;
        while ($row = $result->fetch()){
            $filmsList[$i]['id'] = $row['id'];
            $filmsList[$i]['name_ru'] = $row['name_ru'];
            $filmsList[$i]['type'] = $row['type'];
            $filmsList[$i]['rating'] = $row['rating'];
            $filmsList[$i]['year'] = $row['year'];
            $filmsList[$i]['is_new'] = $row['is_new'];
            $filmsList[$i]['img_preview'] = $row['img_preview'];

            $i++;
        }
        return $filmsList;
    }
    /**
     * Отримання фільмів на вибраной строінці пагінації
     */
    public static function getFilmListWithPage($page)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT_CATALOG;
        $db = Db::getConnection();

        $sql ="SELECT id, name_ru, year FROM film "
            . "WHERE status = 1 LIMIT "
            . self::SHOW_BY_DEFAULT_FILM . " OFFSET ". $offset;
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()){
            $filmsList[$i]['id'] = $row['id'];
            $filmsList[$i]['name_ru'] = $row['name_ru'];
            $filmsList[$i]['year'] = $row['year'];
            $i++;
        }
        return $filmsList;
    }
    /**
     * Отримання фільмів для стрінки по 4шт SHOW_BY_DEFAULT
     */
    public static function getLatestFilm($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();

        $filmsList = array();

        $result = $db->query("SELECT id, name_ru, rating, type, year, is_new, img_preview FROM film WHERE status = '1' ORDER BY id DESC LIMIT $count");
        $i = 0;
        while ($row = $result->fetch()){
            $filmsList[$i]['id'] = $row['id'];
            $filmsList[$i]['name_ru'] = $row['name_ru'];
            $filmsList[$i]['type'] = $row['type'];
            $filmsList[$i]['rating'] = $row['rating'];
            $filmsList[$i]['year'] = $row['year'];
            $filmsList[$i]['is_new'] = $row['is_new'];
            $filmsList[$i]['img_preview'] = $row['img_preview'];

            $i++;
        }
        return $filmsList;
    }
    /**
     * Отримання фільмів для каталога
     */
    public static function getFilmLists($page = 1)
    {
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT_CATALOG;
            $db = Db::getConnection();
            $films = array();
            $result = $db->query("SELECT id, name_ru, rating, type, year, age, time, is_new, img_preview FROM film "
                ."WHERE status = '1' "
                ."ORDER BY id DESC "
                ." LIMIT ". self::SHOW_BY_DEFAULT_CATALOG
                ." OFFSET ". $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $films[$i]['id'] = $row['id'];
                $films[$i]['name_ru'] = $row['name_ru'];
                $films[$i]['type'] = $row['type'];
                $films[$i]['rating'] = $row['rating'];
                $films[$i]['year'] = $row['year'];
                $films[$i]['time'] = $row['time'];
                $films[$i]['age'] = $row['age'];
                $films[$i]['img_preview'] = $row['img_preview'];

                $i++;
            }
            return $films;
    }
    /**
     * Отримання фільмів по id жанрам
     */
    public static function getFilmsListByGenre($genreId = false, $page = 1)
    {
        if($genreId) {
            $page = intval($page);
            $offset =($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $films = array();
            $result = $db->query("SELECT id, name_ru, rating, type, year, age, time, is_new, img_preview FROM film "
            ."WHERE status = '1' AND id_genre = '$genreId' "
            ."ORDER BY id DESC "
            ." LIMIT ". self::SHOW_BY_DEFAULT
            ." OFFSET ". $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $films[$i]['id'] = $row['id'];
                $films[$i]['name_ru'] = $row['name_ru'];
                $films[$i]['type'] = $row['type'];
                $films[$i]['rating'] = $row['rating'];
                $films[$i]['year'] = $row['year'];
                $films[$i]['time'] = $row['time'];
                $films[$i]['age'] = $row['age'];
                $films[$i]['img_preview'] = $row['img_preview'];

                $i++;
            }
            return $films;
        }
    }
    /**
     * Отримання фільма за параметром id
     */
    public static function  getFilmById($id)
    {
        $id = intval($id);
        if ($id){
            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM film WHERE id=".$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
    }
    /**
     * Отримання фільмів по id для збереження
     */
    public static function  getFilmByIds($idsArray)
    {
        $films = array();
        $db = Db::getConnection();
        $array = explode(",", $idsArray);
        if($idsArray) {

            $sql = "SELECT * FROM film WHERE status='1' AND id IN ($idsArray)";
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            while ($row = $result->fetch()) {
                $films[$i]['id'] = $row['id'];
                $films[$i]['name_ru'] = $row['name_ru'];
                $films[$i]['year'] = $row['year'];
                $films[$i]['img_preview'] = $row['img_preview'];
                $films[$i]['rating'] = $row['rating'];
                $films[$i]['is_new'] = $row['is_new'];
                $films[$i]['type'] = $row['type'];
                $i++;
            }
            return $films;
        }
        return null;
    }
    /**
     * Отримання фільма за id категорії
     */
    public static function  getTotalFilmsInCategory($genreId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM film '
            . 'WHERE status="1" AND id_genre ="'.$genreId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row =  $result->fetch();
        return $row['count'];
    }
    /**
     * Отримання рекомендованих фільмів
     */
    public static function getFilmsIsRecommended()
    {
        $db = Db::getConnection();

        $filmsList = array();

        $result = $db->query("SELECT id, name_ru, year, img FROM film WHERE `is_recommended` = '1'");
        $i = 0;
        while ($row = $result->fetch()){
            $filmsList[$i]['id'] = $row['id'];
            $filmsList[$i]['name_ru'] = $row['name_ru'];
            $filmsList[$i]['year'] = $row['year'];
            $filmsList[$i]['img'] = $row['img'];

            $i++;
        }
        return $filmsList;
    }
    /**
     * Отримання нових фільмів
     */
    public static function getFilmsIsNew()
    {
        $db = Db::getConnection();

        $filmsList = array();

        $result = $db->query("SELECT id, name_ru, rating, img_preview, is_new, type, year FROM film WHERE `is_new` = '1'");
        $i = 0;
        while ($row = $result->fetch()){
            $filmsList[$i]['id'] = $row['id'];
            $filmsList[$i]['name_ru'] = $row['name_ru'];
            $filmsList[$i]['rating'] = $row['rating'];
            $filmsList[$i]['img_preview'] = $row['img_preview'];
            $filmsList[$i]['is_new'] = $row['is_new'];
            $filmsList[$i]['type'] = $row['type'];
            $filmsList[$i]['year'] = $row['year'];
            $i++;
        }
        return $filmsList;
    }
    /**
     * Видалення фільмів по id
     */
    public static function deleteFilmById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM film WHERE id= :id';
        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        return $result->execute();
    }
    /**
     * Отримання посортованих жарів
     */
    public static function getFilmsListAdmin()
    {
        $db = Db::getConnection();

        $genresList = array();

        $result = $db->query("SELECT id, name, status, sort_order FROM genres ORDER BY sort_order ASC");
        $i = 0;
        while ($row = $result->fetch()){
            $genresList[$i]['id'] = $row['id'];
            $genresList[$i]['name'] = $row['name'];
            $genresList[$i]['sort_order'] = $row['sort_order'];
            $genresList[$i]['status'] = $row['status'];
            $i++;
        }
        return $genresList;
    }
    /**
     * Створення фільму
     */
    public static function createFilm($film, $times1, $times2)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO `film`(`name_ru`, `name_en`, `id_genre`, `rating`, `year`, `type`, `country`, `img`, `img_preview`, `trailer`, `description`, `is_new`, `is_recommended`, `status`, `age`, `time`) VALUES (:name_ru, :name_en, :id_genre, :rating , :year, :type, :country, :img, :img_preview, :trailer, :description, :is_new, :is_recommended, :status, :age, :time)';
        $result = $db->prepare($sql);
        $result->bindParam(':name_ru', $film['name_ru'], PDO::PARAM_STR);
        $result->bindParam(':name_en', $film['name_en'], PDO::PARAM_STR);
        $result->bindParam(':id_genre', $film['id_genre'], PDO::PARAM_INT);
        $result->bindParam(':rating', $film['rating'], PDO::PARAM_STR);
        $result->bindParam(':year', $film['year'], PDO::PARAM_INT);
        $result->bindParam(':type', $film['type'], PDO::PARAM_STR);
        $result->bindParam(':country', $film['country'], PDO::PARAM_STR);
        $result->bindParam(':img', $times1, PDO::PARAM_STR);
        $result->bindParam(':img_preview', $times2, PDO::PARAM_STR);
        $result->bindParam(':trailer', $film['trailer'], PDO::PARAM_STR);
        $result->bindParam(':description', $film['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $film['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $film['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $film['status'], PDO::PARAM_INT);
        $result->bindParam(':age', $film['age'], PDO::PARAM_INT);
        $result->bindParam(':time', $film['time'], PDO::PARAM_INT);

        return $result->execute();
    }
    /**
     * Перевірки для форми ддодавання та реестрації
     */
    public static function checkNameRu($name)
    {
        if(strlen($name)>= 2){
            return true;
        }
        return false;
    }
    public static function checkNameEn($name)
    {
        if(strlen($name)>= 2){
            return true;
        }
        return false;
    }
    public static function checkRating($rating)
    {
        if($rating > 10 ){
            return false;
        }
        if($rating < 0 ){
            return false;
        }
        return true;
    }
    public static function checkYear($year)
    {
        if($year > 2030 ){
            return false;
        }
        if($year < 1930 ){
            return false;
        }
        return true;
    }
    public static function checkСountry($country)
    {
        if(strlen($country)>= 2){
            return true;
        }
        return false;
    }
    public static function checkDescription($description)
    {
        if(strlen($description)>= 10){
            return true;
        }
        return false;
    }
    public static function checkTime($time)
    {
        if(strlen($time)>= 2){
            return true;
        }
        return false;
    }
    public static function checkTrailer($trailer)
    {
        if(strlen($trailer)>= 20){
            return true;
        }
        return false;
    }
    /**
     * Зміна даних фільму
     */
    public static function updateFilmById($id, $film)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE `film` SET `name_ru`=:name_ru,`name_en`=:name_en,`id_genre`=:id_genre,`rating`=:rating,`year`=:year,`type`=:type,`country`=:country,`img`=:img,`img_preview`=:img_preview,`trailer`=:trailer,`description`=:description,`is_new`=:is_new,`is_recommended`=:is_recommended,`status`=:status,`age`=:age,`time`=:time WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':name_ru', $film['name_ru'], PDO::PARAM_STR);
        $result->bindParam(':name_en', $film['name_en'], PDO::PARAM_STR);
        $result->bindParam(':id_genre', $film['id_genre'], PDO::PARAM_INT);
        $result->bindParam(':rating', $film['rating'], PDO::PARAM_STR);
        $result->bindParam(':year', $film['year'], PDO::PARAM_INT);
        $result->bindParam(':type', $film['type'], PDO::PARAM_STR);
        $result->bindParam(':country', $film['country'], PDO::PARAM_STR);
        $result->bindParam(':img', $film['img'], PDO::PARAM_STR);
        $result->bindParam(':img_preview', $film['img_preview'], PDO::PARAM_STR);
        $result->bindParam(':trailer', $film['trailer'], PDO::PARAM_STR);
        $result->bindParam(':description', $film['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $film['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $film['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $film['status'], PDO::PARAM_INT);
        $result->bindParam(':age', $film['age'], PDO::PARAM_INT);
        $result->bindParam(':time', $film['time'], PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }
    /**
     * Завантаження фото
     */
    public static function getImg($img)
    {
        $noImg ='no-img.jpg';
        $path = '/template/img/films_img/';

        $pathToFilmImg = $path . $img;

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToFilmImg)){
            return $pathToFilmImg;
        }
        return $path . $noImg;
    }
    /**
     * Завантаження фото
     */
    public static function getPreviewImg($img)
    {
        $noImg ='no-img.jpg';
        $path = '/template/img/film_poster/';

        $pathToFilmImg = $path . $img;

         if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToFilmImg)){
             return $pathToFilmImg;
         }
         return $path . $noImg;
    }
    /**
     * Пошук фільмів
     */
    public static function searchFilms($search)
    {
        $db = Db::getConnection();
            $count = count($search);
            $array = array();
            $searchFilms = array();
            $i = 0;
            foreach ($search as $key) {
                $i++;
                if ($i < $count) $array[] = "CONCAT (`name_ru`, `name_en`) LIKE '%" . $key . "%' OR "; else $array[] = "CONCAT (`name_ru`, `name_en`) LIKE '%" . $key . "%' ";
            }
            $sql = implode("", $array);
            $result = $db->query("SELECT * FROM `film` WHERE " .$sql);
            $i = 0;
            while ($row = $result->fetch()){
                $searchFilms[$i]['id'] = $row['id'];
                $searchFilms[$i]['name_ru'] = $row['name_ru'];
                $searchFilms[$i]['rating'] = $row['rating'];
                $searchFilms[$i]['img_preview'] = $row['img_preview'];
                $searchFilms[$i]['is_new'] = $row['is_new'];
                $searchFilms[$i]['type'] = $row['type'];
                $searchFilms[$i]['year'] = $row['year'];
                $i++;
            }
            return $searchFilms;
    }
    /**
     * Пошук фільмів за роком
     */
    public static function searchFilmsByYear($year)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM `film` WHERE `year` = " .$year);
        $i = 0;
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $searchFilms[$i]['id'] = $row['id'];
                $searchFilms[$i]['name_ru'] = $row['name_ru'];
                $searchFilms[$i]['rating'] = $row['rating'];
                $searchFilms[$i]['img_preview'] = $row['img_preview'];
                $searchFilms[$i]['is_new'] = $row['is_new'];
                $searchFilms[$i]['type'] = $row['type'];
                $searchFilms[$i]['year'] = $row['year'];
                $i++;
            }
            return $searchFilms;
        }
        return false;
    }
    /**
     * Пошук фільмів за типом(Фільм,Мультфільм,Серіал)
     */
    public static function getAll($name)
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM `film` WHERE `type` =  '" . $name . "'");
        $i = 0;

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $serials[$i]['id'] = $row['id'];
                $serials[$i]['name_ru'] = $row['name_ru'];
                $serials[$i]['rating'] = $row['rating'];
                $serials[$i]['img_preview'] = $row['img_preview'];
                $serials[$i]['is_new'] = $row['is_new'];
                $serials[$i]['type'] = $row['type'];
                $serials[$i]['year'] = $row['year'];
                $i++;
            }
            return $serials;
        }
        return false;
    }
    /**
     * Пошук всіх столиць для сортування
     */
    public static function getAllCountries()
    {
        $db = Db::getConnection();
        $country = array();
        $result = $db->query("SELECT `country` FROM `film`");
        $i = 0;
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $country[$i]['country'] = $row['country'];
                $i++;
            }
            $country = array_unique($country, SORT_REGULAR);
            return $country;
        }
        return false;
    }
    /**
     * Пошук всіх років для сортування
     */
    public static function getAllYears()
    {
        $db = Db::getConnection();
        $years = array();
        $result = $db->query("SELECT `year` FROM `film`");
        $i = 0;
        if (!$row = $result->fetch() == null) {
            while ($row = $result->fetch()) {
                $years[$i]['year'] = $row['year'];
                $i++;
            }
            $years = array_unique($years, SORT_REGULAR);
            return $years;
        }
        return false;
    }
    /**
     * Сортування фільмів
     */
    public static function sortFilms($type)
    {
        $db = Db::getConnection();
        $mas = array();
        $result = $db->query("SELECT * FROM `film` WHERE `type` = '$type'");
            if (!empty($_POST['submit'])) {
                $mas = [$_POST['years'], $_POST['countries'], $_POST['rating']];
                if ($mas[0] != 'default' && $mas[1] != 'default' && $mas[2] != 'default') {
                    $result = $db->query("SELECT * FROM `film` WHERE `type` = '$type' AND `year` = '$mas[0]' AND `country` = '$mas[1]' AND `rating` > $mas[2]");
                } elseif ($mas[0] == 'default' && $mas[1] != 'default' && $mas[2] != 'default') {
                    $result = $db->query("SELECT * FROM `film` WHERE `type` = '$type' AND `country` = '$mas[1]' AND `rating` > $mas[2]");
                } elseif ($mas[0] != 'default' && $mas[1] == 'default' && $mas[2] != 'default') {
                    $result = $db->query("SELECT * FROM `film` WHERE `type` = '$type' AND `year` = '$mas[0]' AND `rating` > $mas[2]");
                } elseif ($mas[0] != 'default' && $mas[1] != 'default' && $mas[2] == 'default') {
                    $result = $db->query("SELECT * FROM `film` WHERE `type` = '$type' AND `year` = '$mas[0]' AND `country` = '$mas[1]'");
                } elseif ($mas[0] != 'default' && $mas[1] == 'default' && $mas[2] == 'default') {
                    $result = $db->query("SELECT * FROM `film` WHERE `type` = '$type' AND `year` = '$mas[0]'");
                } elseif ($mas[0] == 'default' && $mas[1] != 'default' && $mas[2] == 'default') {
                    $result = $db->query("SELECT * FROM `film` WHERE `type` = '$type' AND `country` = '$mas[1]'");
                } elseif ($mas[0] == 'default' && $mas[1] == 'default' && $mas[2] != 'default') {
                    $result = $db->query("SELECT * FROM `film` WHERE `type` = '$type' AND `rating` > $mas[2]");
                } else {
                    $result = $db->query("SELECT * FROM `film` WHERE `type` = '$type'");
                }
        }
            $i = 0;
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch()) {
                    $listSortFilms[$i]['id'] = $row['id'];
                    $listSortFilms[$i]['name_ru'] = $row['name_ru'];
                    $listSortFilms[$i]['rating'] = $row['rating'];
                    $listSortFilms[$i]['img_preview'] = $row['img_preview'];
                    $listSortFilms[$i]['is_new'] = $row['is_new'];
                    $listSortFilms[$i]['type'] = $row['type'];
                    $listSortFilms[$i]['year'] = $row['year'];
                    $i++;
                }
                return $listSortFilms;
            }
        return false;
    }
}