<?php

class AdminFilmController extends AdminBase
{
    public function actionIndex($page = 1)
    {
        self::checkAdmin();
        $filmsList = Film::getFilmListWithPage($page);
        $total = Film::getFilmList();
        $pagination = new Pagination(count($total), $page, Film::SHOW_BY_DEFAULT_FILM, 'page-');

        require_once (ROOT . '/views/admin_film/index.php');

        return true;
    }
    public function actionDelete($id)
    {
        self::checkAdmin();

        if (isset($_POST['submit'])){
            Film::deleteFilmById($id);
            header("Location: /admin/film");
        }
        require_once (ROOT . '/views/admin_film/delete.php');
        return true;
    }
    public function actionCreate()
    {
        self::checkAdmin();
        $film['name_ru'] = '';
        $film['name_en'] = '';
        $film['rating'] = '';
        $film['year'] = '';
        $film['country'] = '';
        $film['description'] = '';
        $film['time'] = '';
        $film['trailer'] = '';


        $result = false;

        $genresList = Film::getFilmsListAdmin();
        $times1 = time() . 1 . ".jpg";
        $times2 = time() . 2 . ".jpg";

        if (isset($_POST['submit'])){
            $film['name_ru'] = $_POST['name_ru'];
            $film['name_en'] = $_POST['name_en'];
            $film['id_genre'] = $_POST['id_genre'];
            $film['rating'] = $_POST['rating'];
            $film['year'] = $_POST['year'];
            $film['type'] = $_POST['type'];
            $film['country'] = $_POST['country'];
            $film['img'] = $times1;
            $film['img_preview'] = $times2;
            $film['description'] = $_POST['description'];
            $film['is_new'] = $_POST['is_new'];
            $film['is_recommended'] = $_POST['is_recommended'];
            $film['status'] = $_POST['status'];
            $film['age'] = $_POST['age'];
            $film['time'] = $_POST['time'];
            $film['trailer'] = $_POST['trailer'];

            $errors =false;
            if(!Film::checkNameRu($film['name_ru'])){
                $errors[] = 'Название не может быть короче 2 символов (RU)';
            }
            if(!Film::checkNameEn($film['name_en'])){
                $errors[] = 'Название не может быть короче 2 символов (EN)';
            }
            if(!Film::checkRating($film['rating'])){
                $errors[] = 'Введите рейтинг от 0 до 10';
            }
            if(!Film::checkYear($film['year'])){
                $errors[] = 'Введите год в диапазоне 1930-2030';
            }
            if(!Film::checkСountry($film['country'])){
                $errors[] = 'Название страны не может быть короче 2 символов!';
            }
            if(!Film::checkDescription($film['description'])){
                $errors[] = 'Описание не может быть короче 10 символов!';
            }
            if(!Film::checkTime($film['time'])){
                $errors[] = 'Введите время в минутах от 2 символов';
            }
            if(!Film::checkTrailer($film['trailer'])){
                $errors[] = 'Трейлер должен быть больше 20 символов!';
            }
            if ($errors == false){
                $result = Film::createFilm($film, $times1, $times2);
                if (is_uploaded_file($_FILES['img']['tmp_name'])){
                    move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/template/img/films_img/{$times1}");
                }
                if (is_uploaded_file($_FILES['img_preview']['tmp_name'])){
                    move_uploaded_file($_FILES['img_preview']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/template/img/film_poster/{$times2}");
                }
                header("Location: /admin/film");
            }
        }
        require_once (ROOT . '/views/admin_film/create.php');
        return true;
    }
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $film['name_ru'] = '';
        $film['name_en'] = '';
        $film['rating'] = '';
        $film['year'] = '';
        $film['country'] = '';
        $film['description'] = '';
        $film['time'] = '';
        $film['trailer'] = '';
        $film['img_preview'] = '';
        $film['img'] = '';

        $genresList = Film::getFilmsListAdmin();

        $film = Film::getFilmById($id);

        if (isset($_POST['submit'])){
            if (is_uploaded_file($_FILES['img']['tmp_name'])){
                $times1 = rand(1,9999) . 1 . ".jpg";
                $film['img'] = $times1;
            }elseif (is_uploaded_file($_FILES['img_preview']['tmp_name'])) {
                $times2 = rand(1,9999) . 2 . ".jpg";
                $film['img_preview'] = $times2;
            }
            $film['name_ru'] = $_POST['name_ru'];
            $film['name_en'] = $_POST['name_en'];
            $film['id_genre'] = $_POST['id_genre'];
            $film['rating'] = $_POST['rating'];
            $film['year'] = $_POST['year'];
            $film['type'] = $_POST['type'];
            $film['country'] = $_POST['country'];
            $film['description'] = $_POST['description'];
            $film['is_new'] = $_POST['is_new'];
            $film['is_recommended'] = $_POST['is_recommended'];
            $film['status'] = $_POST['status'];
            $film['age'] = $_POST['age'];
            $film['time'] = $_POST['time'];
            $film['trailer'] = $_POST['trailer'];

            Film::updateFilmById($id, $film);
            if (is_uploaded_file($_FILES['img']['tmp_name'])){
                move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/template/img/films_img/{$times1}");
            }
            if (is_uploaded_file($_FILES['img_preview']['tmp_name'])){
                move_uploaded_file($_FILES['img_preview']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/template/img/film_poster/{$times2}");
            }
            header("Location: /admin/film");
        }
        require_once (ROOT . '/views/admin_film/update.php');
        return true;
    }
}