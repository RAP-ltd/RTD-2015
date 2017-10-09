<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 1:09
 */

namespace sys;


use app\controllers\SiteController;
use sys\http\Request;
use sys\web\UrlManager;

class App
{
    public static $config;
    public $sys;

    /**
     * App constructor.
     * @param $config
     */
    public function __construct($config)
    {
        self::$config = $config;
        $this->sys = new \Sys($config);
    }

    /**
     *
     */
    public function Run()
    {
        \Sys::$app->request = new Request();
        $route = new UrlManager($this->sys->config->component("UrlManager"));
        \Sys::debug($route->parseUri($route->uri())->validate());
        \Sys::$app->request = new Request();
        $controller = "app\\controllers\\{$route->controller}";
        echo (new $controller())->{$route->action}();
        //TODO;
    }
}
