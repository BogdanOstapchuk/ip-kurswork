<?php

class SupportController
{
    public function actionIndex()
    {

        require_once (ROOT . '/views/support/index.php');
        return true;
    }
}