<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 10:20
 */


namespace sys\web;

class Controller
{
    protected $class;
    protected $view;

    public function render($view, $params = [])
    {
        $this->view = new View($this->getClass(), $view);
        return $this->view->render($view, $params);
    }

    protected function getClass()
    {
        if (preg_match("~^app/controllers/(?<class>\w+)Controller$~uisU", str_replace("\\", "/", get_class($this)), $matches)) {
            $this->class = strtolower($matches["class"]);
        }
        return $this->class;
    }
}

