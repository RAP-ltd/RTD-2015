<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 10.10.2017
 * Time: 1:31
 */

$this->title = "Ошибка {$code}";
 ?>
<h1>Ошибка <?= $code ?>!</h1>
<?= (new \sys\web\UrlManager(Sys::$app->config->component("UrlManager")))->createUrl(["site/index", "id" => 123]) ?>