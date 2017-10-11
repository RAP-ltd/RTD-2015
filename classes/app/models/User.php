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

    public function test()
    {
        $fnc = "\$this->conditionsToString";
        $code1 = "(`x`='1' AND `y`='2') OR (`x`='2' AND `y`='1')";
        $code2 = "[[[\"x\" => 1], [\"y\" => 2]], \"OR\" => [[\"x\" => 2],[\"y\" => 1]]]";
        $res1 = $this->conditionsToString($code1);
        $res2 = $this->conditionsToString([[["x" => 1], "AND" => ["y" => 2]], "OR" => [["x" => 2], "AND" => ["y" => 1]]]);
        return $this->visual($fnc, '"' . $code1 . '"', $res1) . "\n<br />" . $this->visual($fnc, $code2, $res2);
    }

    protected function visual($function, $params, $res)
    {
        $str = "<font color='#ff4500'>{$function}(<font color='#b8860b'>{$params}</font>)</font> = <font color='green'>\"{$res}\"</font>";
        return $str;
    }
}

