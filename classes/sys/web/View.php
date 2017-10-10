<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 10:23
 */


namespace sys\web;


use Sys;

class View
{
    protected $config;
    protected $controller;
    protected $view;

    public function __construct($controller, $view)
    {
        $this->controller = $controller;
        $this->config = Sys::$app->config->component("View");
        $this->view = new \sys\base\View($this->controller);
    }

    public function render($view, $params = [])
    {
        return $this->view->controller($view, $params);
    }
}

