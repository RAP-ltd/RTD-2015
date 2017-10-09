<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 0:57
 */

define("ROOT", __DIR__);
define("APP_ROOT", ROOT . '/app');
define("VIEW_PATH", APP_ROOT . '/views');

function class_loader($class)
{
    $file = __DIR__ . '/' . str_replace("\\", "/", $class) . '.php';
    if (!file_exists($file)) {
        echo "<h3 class='alert-danger'>Error! Class \"{$class}\" no found in \"{$file}\"</h3>\n";
    } else {
        /** @var String $file */
        require_once $file;
    }
}

spl_autoload_register("class_loader");
