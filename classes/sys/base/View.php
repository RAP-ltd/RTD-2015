<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 10:09
 */


namespace sys\base;


class View
{
    protected $config;
    protected $content;
    protected $controller;
    protected $cssCode = [];
    protected $cssFiles = [];
    protected $jsCode = [];
    protected $jsFiles = [];

    public function __construct($controller)
    {
        $this->config = \Sys::$app->config->component("View");
        $this->controller = $controller;
    }

    public function render($view, $params = [])
    {
        extract($params);
        ob_start();
        include VIEW_PATH . "/{$this->controller}/{$view}.php";
        return ob_get_clean();
    }

    public function controller($view, $params = [])
    {
        $content = $this->render($view, $params);
        $this->controller = $this->config["directory"];
        return $this->render($this->config["main"], ["content" => $content]);
    }

    public function BEGIN_HTML()
    {
        //TODO;
    }

    public function BEGIN_HEAD()
    {
        //TODO;
    }

    public function END_HEAD()
    {
        echo "<style>\n";
        echo $this->cssToString();
        echo "</style>\n";
    }

    public function BEGIN_BODY()
    {
        //TODO;
    }

    public function END_BODY()
    {
        //TODO;
    }

    public function END_HTML()
    {
        //TODO;
    }

    public function css($cssCode = [])
    {
        $this->cssCode = array_merge($this->cssCode, $cssCode);
    }

    protected function cssToString()
    {
        $res = "";
        foreach ($this->cssCode as $key => $item) {
            $res .= "{$key} {\n{$this->cssParamsToString($item)}}\n";
        }
        return $res;
    }

    protected function cssParamsToString($array)
    {
        $res = "";
        foreach ($array as $key => $value) {
            $res .= "{$key}: {$value}; \n";
        }
        return $res;
    }
}
