<?php

class Genres
{
    const SHOW_BY_DEFAULT_GENRES = 10;
    /**
     * Отримання списку жанрів
     */
    public static function getGenresList()
    {
        $db = Db::getConnection();
        $genresList = array();
        $result = $db->query("SELECT id, name, status FROM genres ORDER BY sort_order ASC");
        $i= 0;
        while ($row = $result->fetch()){
            $genresList[$i]['id']= $row['id'];
            $genresList[$i]['name']= $row['name'];
            $genresList[$i]['status']= $row['status'];
            $i++;
        }
        return $genresList;
    }
    /**
     * Отримання списку жанрів на конкретній сторінці пагінації
     */
    public static function getGenreListWithPage($page)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT_GENRES;
        $db = Db::getConnection();

        $films = array();
        $sql ="SELECT id, name, status FROM genres "
            . "WHERE status = 1 LIMIT "
            . self::SHOW_BY_DEFAULT_GENRES . " OFFSET ". $offset;
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()){
            $genresList[$i]['id'] = $row['id'];
            $genresList[$i]['name'] = $row['name'];
            $genresList[$i]['status'] = $row['status'];
            $i++;
        }
        return $genresList;
    }
    /**
     * Отпривання жанру за параметром id
     */
    public static function  getGenreById($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();

            $result = $db->query("SELECT * FROM genres WHERE id=" . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
    }
    /**
     * Перевірка на довжину назви жанру
     */
    public static function checkName($name)
    {
        if(strlen($name)>= 2){
            return true;
        }
        return false;
    }
    /**
     * Переырка на однакову назву жанру
     */
    public static function checkRepit($genres, $genreName)
    {
        foreach ($genres as $genre){
            if ($genre['name'] == $genreName){
                return false;
            }
        }
        return true;
    }
    /**
     * Створення жанру
     */
    public static function createGenre($genre)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO genres (name, status, sort_order) '
            . 'VALUES (:name, :status, :sort_order)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $genre['name'], PDO::PARAM_STR);
        $result->bindParam(':status', $genre['status'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $genre['sort_order'], PDO::PARAM_STR);
        return $result->execute();
    }
    /**
     * Зміна даних жанру
     */
    public static function updateGenreById($id, $genre)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `genres` SET `name`=:name,`sort_order`=:sort_order,`status`=:status WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $genre['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $genre['sort_order'], PDO::PARAM_STR);
        $result->bindParam(':status', $genre['status'], PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }
    /**
     * Видалення жанру
     */
    public static function deleteGenreById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM genres WHERE id= :id';
        $result = $db->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        return $result->execute();
    }
}