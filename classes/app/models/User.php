<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 14:39
 */


namespace app\models;


use sys\db\ActiveRecord;

class User extends ActiveRecord
{
    public function tableName()
    {
        return "users";
    }

    public function getUserById($id)
    {
        return $this->select(["id" => \Sys::$app->request->get($id)]);
    }
}

