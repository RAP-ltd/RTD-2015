<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 10:37
 */


namespace app\controllers;


use sys\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render("index");
    }
    //TODO;
}

