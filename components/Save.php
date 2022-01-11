<?php

class Save
{
    public static function addFilm($id, $strintSaved){
        $id = intval($id);

        $array = explode(",", $strintSaved);
        $filmsInSave = array();
        foreach($array as $key => $value){
            $filmsInSave[$value] = $value;
        }
        foreach($filmsInSave as $index){
            $filmsInSave[$index] = 1;
        }

        if (isset($_SESSION['films'])){
            $filmsInSave = $_SESSION['films'];
        }

        if (array_key_exists($id, $filmsInSave)){
            if ($filmsInSave[$id] === 1){
                $filmsInSave[$id] = 0;
            }else{
                $filmsInSave[$id] = 1;
            }
        }else{
            $filmsInSave[$id] = 1;
        }
        $_SESSION['films'] = $filmsInSave;
        echo '<pre>';print_r($_SESSION['films']);die();

        return self::countIteams();
    }
    public static function countIteams()
    {
        if (isset($_SESSION['films'])){
            $count = 0;
            foreach ($_SESSION['films'] as $id => $quantity){
                $count = $count + $quantity;
            }
            return $count;
        }else{
            return 0;
        }
    }
}