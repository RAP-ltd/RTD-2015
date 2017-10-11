<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 1:09
 */

namespace sys;

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
        $route->parseUri($route->uri())->validate();
        \Sys::$app->request->reNew();
        //\Sys::debug(["controller" => $route->controller, "action" => $route->action]);
        echo (new $route->controller())->{$route->action}();
        //TODO;
    }
}
