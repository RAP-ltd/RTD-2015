<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 9:27
 */


namespace sys\base;


class Config
{
    public static $array;

    /**
     * Config constructor.
     * @param $config
     */
    public function __construct($config)
    {
        self::$array = $config;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return self::$array;
    }

    /**
     * @return mixed
     */
    public function brand()
    {
        return self::$array["brand"];
    }

    /**
     * @return mixed
     */
    public function language()
    {
        return self::$array["language"];
    }

    /**
     * @param $name
     * @return null
     */
    public function component($name)
    {
        if (self::$array["components"][$name]) {
            return self::$array["components"][$name];
        } else {
            return null;
        }
    }
}

