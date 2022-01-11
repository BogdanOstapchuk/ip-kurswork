<?php

class AdminGenreController extends AdminBase
{
    public function actionIndex($page = 1)
    {
        self::checkAdmin();
        $genresList = Genres::getGenreListWithPage($page);
        $total = Genres::getGenresList();
        $pagination = new Pagination(count($total), $page, Genres::SHOW_BY_DEFAULT_GENRES, 'page-');
        require_once (ROOT . '/views/admin_genre/index.php');

        return true;
    }
    public function actionCreate()
    {
        self::checkAdmin();
        $genre['name'] = '';
        $genre['status'] = '';
        $genre['sort_order'] = '';

        $result = false;

        $genresList = Genres::getGenresList();
        if (isset($_POST['submit'])){
            $genre['name'] = $_POST['name'];
            $genre['status'] = $_POST['status'];
            $genre['sort_order'] = $_POST['sort_order'];

            $errors = false;

            if(!Genres::checkName($genre['name'])){
                $errors[] = 'Название жанра не может быть короче 2 символов';
            }
            if(!Genres::checkRepit($genresList, $genre['name'])){
                $errors[] = 'Жанр с таким названием уже существует';
            }
            if ($errors == false){
                $result = Genres::createGenre($genre);
                header("Location: /admin/genre");
            }
        }
        require_once (ROOT . '/views/admin_genre/create.php');
        return true;
    }
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $genre['name'] = '';
        $genre['status'] = '';
        $genre['sort_order'] = '';

        $errors = false;

        $genre = Genres::getGenreById($id);
        if (isset($_POST['submit'])){
            $genre['name'] = $_POST['name'];
            $genre['status'] = $_POST['status'];
            $genre['sort_order'] = $_POST['sort_order'];

            if(!Genres::checkName($genre['name'])){
                $errors[] = 'Название жанра не может быть короче 2 символов';
            }
            if ($errors == false){
                $result = Genres::updateGenreById($id, $genre);
                header("Location: /admin/genre");
            }
        }
        require_once (ROOT . '/views/admin_genre/update.php');
        return true;
    }
    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])){
            Genres::deleteGenreById($id);
            header("Location: /admin/genre");
        }
        require_once (ROOT . '/views/admin_genre/delete.php');
        return true;
    }
}