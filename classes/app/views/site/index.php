<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 10:55
 */
 
 $this->title = \Sys::$app->brand . " - Главная";
 $this->css([
    ".pull-center" => [
        "text-align" => "center"
    ]
]);
?>
<h1 class="pull-center"><?= \Sys::$app->brand ?></h1>
<h6 class="pull-center">URI: <?= parse_url($_SERVER["REQUEST_URI"])["path"] ?></h6>
<h2 class="pull-center">Site under construction!</h2>
<?php \Sys::debug($user) ?>
<?php \Sys::debug(\Sys::$app) ?>
<?= $this->render("test") ?>
<?php Sys::debug($this) ?>
