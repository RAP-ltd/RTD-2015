<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 0:53
 */

namespace sys\web;


class UrlManager
{
    public static $config;

    /**
     * UrlManager constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        self::$config = $config;
    }

    /**
     * @return $this
     */
    public function parse()
    {
        return $this;
    }
}