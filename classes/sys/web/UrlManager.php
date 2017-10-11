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
    public $params;

    public static $url;

    public $config;

    /**
     * UrlManager constructor.
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
        self::$url = $this;
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
                foreach ($matches as $key => $value) {
                    if (!is_numeric($key)) {
                        $_GET[$key] = $value;
                        $_REQUEST[$key] = $value;
                        $this->params[$key] = $value;
                    }
                }
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
            $this->controller = str_replace("/", "\\", $matches["path"] . ucfirst(strtolower($matches["controller"])) . 'Controller');
            $this->controller = "app\\controllers\\{$this->controller}";
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

    public function validate()
    {
        $file = str_replace("\\", "/", ROOT . "/{$this->controller}.php");
        if (!file_exists($file)
            ) {
            \Sys::debug(["File '{$file}' not found" => ["controller" => $this->controller, "action" => $this->action]]);
            $this->parseRoute($this->config["errors"]["error404"]);
        } elseif (!method_exists($this->controller, "{$this->action}")) {
            \Sys::debug(["File '{$file}' found but action '{$this->action}' not found" => ["controller" => $this->controller, "action" => $this->action]]);
            $this->parseRoute($this->config["errors"]["error404"]);
        }
        return $this;
    }

    public function createUrl($url = [])
    {
        $rules = $this->config["rules"];
        foreach ($rules as $rule => $value) {
            if ($url[0] == $value) {
                if (count($url) == 1)
                {
                    return '/' . $rule;
                }
                if ($a = $this->validateUrl($url, $rule)) {
                    return $a;
                }
            }
        }
    }

    public function validateUrl($url, $rule)
    {
        $pattern = "~<(?<param>[^:]+):(?<value>[^>]+)>~uisU";
        if (preg_match_all($pattern, $rule, $matches))
        {
            $str = $rule;
            foreach ($url as $param => $value)
            {
                if ($param !== 0) {
                    $str = preg_replace("~<$param:[^>]+>~uisU", "$value", $str);
                }
            }
            $parsed = $this->parseUri('/' . $str);
            $arr = $url;
            unset($arr[0]);
            foreach ($parsed->params as $param => $value)
            {
                unset($arr[$param]);
            }
            $query = http_build_query($arr);
            return '/' . $str . ($query ? '?' . $query : '');
        }
        return false;
        //TODO;
    }

}
