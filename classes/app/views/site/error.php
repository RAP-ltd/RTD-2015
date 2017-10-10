<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 10.10.2017
 * Time: 1:31
 */

use sys\helpers\Html;

$this->title = "Ошибка {$code}";
 ?>
<h1>Ошибка <?= $code ?>!</h1>
<?= Html::a("Home", ["site/index", "id" => 123]) ?>

