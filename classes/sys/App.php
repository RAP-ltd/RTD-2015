<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 1:09
 */

namespace sys;


use app\controllers\SiteController;
use sys\web\UrlManager;

class App
{
    public static $config;

    /**
     * App constructor.
     * @param $config
     */
    public function __construct($config)
    {
        self::$config = $config;
        new \Sys($config);
    }

    /**
     *
     */
    public function Run()
    {
        $route = new UrlManager();
        \Sys::debug($route->parseUri($route->uri()));
        //echo (new SiteController())->actionIndex();
        //TODO;
    }
}
