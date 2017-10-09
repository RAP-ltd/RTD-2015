<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 1:44
 */

namespace sys\http;


class Request
{
    public $get;
    public $files;
    public $post;
    public $request;
    public $server;
    public $session;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->files = $_FILES;
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
        $this->server = $_SERVER;
        $this->session = $_SESSION;
    }

    /**
     * @param $str
     * @return null
     */
    public function get($str)
    {
        return $this->get[$str] ? $this->get[$str] : null;
    }

    /**
     * @param $str
     * @return null
     */
    public function files($str)
    {
        return $this->files[$str] ? $this->files[$str] : null;
    }

    /**
     * @param $str
     * @return null
     */
    public function post($str)
    {
        return $this->post[$str] ? $this->post[$str] : null;
    }

    /**
     * @param $str
     * @return null
     */
    public function request($str)
    {
        return $this->request[$str] ? $this->request[$str] : null;
    }

    /**
     * @param $str
     * @return null
     */
    public function server($str)
    {
        return $this->server[$str] ? $this->server[$str] : null;
    }

    /**
     * @param $str
     * @return null
     */
    public function session($str)
    {
        return $this->session[$str] ? $this->session[$str] : null;
    }
}
