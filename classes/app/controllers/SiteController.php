<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 10:37
 */


namespace app\controllers;


use app\models\User;
use sys\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $UserModel = new User(\Sys::$app->request->get("id"));
        $user = $UserModel->one();
        return $this->render("index", ["user" => $user]);
    }

    public function actionTest()
    {
        $userModel = new User(10);
        return $userModel->test();
    }

    public function actionError404()
    {
        return $this->render("error", ["code" => 404]);
    }
    //TODO;
}

