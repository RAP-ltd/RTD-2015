<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 08.10.2017
 * Time: 15:42
 */

function setDeploy($code)
{
    ini_set('display_errors', 1);
    error_reporting($code);
}

setDeploy(0);
//setDeploy(E_ALL);
setDeploy(E_ERROR);

define("WEB_ROOT", __DIR__);

include_once __DIR__ . '/../classes/autoload.php';
$config = include_once __DIR__ . '/../classes/app/config/web.php';
(new \sys\App($config))->Run();
?>

<h6 class="pull-center">Execution time: <?= microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"] ?>s</h6>