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
    public $route;
    public $controller;
    public $action;

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
     * @param string $uri
     * @return $this
     */
    public function parseUri($uri = "")
    {
        $rules = \Sys::$app->config->component("UrlManager")["rules"];
        foreach ($rules as $rule => $route) {
            $rule = preg_replace("~<([^:]+):([^>]+)>~uisU", "(?<$1>$2)", $rule);
            if (preg_match("~^/$rule$~uisU", $uri, $matches)) {
                $this->route = $route;
                $this->parseRoute($route);
            }
        }
        if ($this->route == null) {
            $this->route = substr($uri, 1);
            $this->parseRoute($this->route);
        }
        return $this;
    }

    protected function parseRoute($route)
    {
        if (preg_match("~^(?<path>.+/)?(?<controller>[^/]+)/(?<action>[^/]+)$~uisU", $route, $matches)) {
            $this->controller = $matches["path"] . ucfirst(strtolower($matches["controller"])) . 'Controller';
            $this->action = 'action' . ucfirst(strtolower($matches["action"]));
        } elseif (preg_match("~^(?<controller>.+)/$~uisU", $route, $matches)) {
            $this->route = $matches["path"] . $matches["controller"] . '/index';
            $this->parseRoute($this->route);
        }
    }

    public function uri()
    {
        return parse_url(\Sys::$app->request->server("REQUEST_URI"))["path"];
    }
}
