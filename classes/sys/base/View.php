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
    protected $cssFiles = [
        "int" => [],
        "ext" => []
    ];
    protected $jsCode = [];
    protected $jsFiles = [
        "int" => [],
        "ext" => []
    ];

    public function __construct(String $controller)
    {
        $this->config = \Sys::$app->config->component("View");
        $this->controller = $controller;
    }

    public function render(String $view, Array $params = [])
    {
        extract($params);
        ob_start();
        include VIEW_PATH . "/{$this->controller}/{$view}.php";
        return ob_get_clean();
    }

    public function controller(String $view, Array $params = [])
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
        if ($this->config["cssFilesAtHead"]) {
            echo $this->getCssFiles();
        }
        if ($this->config["cssCodeAtHead"]) {
            echo $this->cssToString();
        }
        if ($this->config["jsFilesAtHead"]) {
            echo $this->getJsFiles();
        }
        if ($this->config["jsCodeAtHead"]) {
            echo $this->jsToString();
        }
        //TODO;
    }

    public
    function BEGIN_BODY()
    {
        //TODO;
    }

    public
    function END_BODY()
    {
        if (!$this->config["cssFilesAtHead"]) {
            echo $this->getCssFiles();
        }
        if (!$this->config["cssCodeAtHead"]) {
            echo $this->cssToString();
        }
        if (!$this->config["jsFilesAtHead"]) {
            echo $this->getJsFiles();
        }
        if (!$this->config["jsCodeAtHead"]) {
            echo $this->jsToString();
        }
        //TODO;
    }

    public
    function END_HTML()
    {
        //TODO;
    }

    public
    function css(Array $cssCode = [])
    {
        $this->cssCode = array_merge($this->cssCode, $cssCode);
    }

    protected
    function cssToString()
    {
        if (!empty($this->cssCode)) {
            $res = "<style>\n";
            foreach ($this->cssCode as $key => $item) {
                $res .= "{$key} {\n{$this->cssParamsToString($item)}}\n";
            }
            return $res . "</style>";
        } else {
            return "";
        }
    }

    protected
    function cssParamsToString(Array $array)
    {
        $res = "";
        foreach ($array as $key => $value) {
            $res .= "{$key}: {$value}; \n";
        }
        return $res;
    }

    protected
    function cssFiles(Array $files)
    {
        $this->cssFiles[] = array_merge($this->cssFiles, $files);
    }

    protected
    function getCssFiles()
    {
        $res = "";
        foreach ($this->cssFiles["int"] as $id => $file) {
            $res .= "<link rel='stylesheet' href='/styles/{$file}.css'>\n";
        }
        foreach ($this->cssFiles["ext"] as $id => $url) {
            $res .= "<link rel='stylesheet' href='{$url}'>";
        }
        return $res;
    }

    protected
    function js(Array $array)
    {
        $this->jsCode[] = $array;
    }

    protected
    function jsToString()
    {
        if (!empty($this->jsCode)) {
            $res = "<script language='JavaScript'>\n";
            foreach ($this->jsCode as $item) {
                $res .= "{$item}\n";
            }
            return $res . "</script>";
        } else {
            return "";
        }
    }

    protected
    function jsFiles($files)
    {
        $this->jsFiles[] = $files;
    }

    protected
    function getJsFiles()
    {
        $res = "";
        foreach ($this->jsFiles["int"] as $id => $file) {
            $res .= "<script language='JavaScript' src='/scripts/{$file}.js'>\n";
        }
        foreach ($this->jsFiles["ext"] as $id => $url) {
            $res .= "<script language='JavaScript' src='{$url}'>";
        }
        return $res;
    }
}
