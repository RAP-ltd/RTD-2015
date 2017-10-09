<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 9:25
 */

?>
<?php $this->BEGIN_HTML() ?>
<!DOCTYPE html>
<html lang="<?= \Sys::$app->language ?>">
<head>
    <?php $this->BEGIN_HEAD() ?>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->title ?></title>
    <?php $this->END_HEAD() ?>
</head>
<body>
<?php $this->BEGIN_BODY() ?>
<?= $content ?>
<?php $this->END_BODY() ?>
</body>
</html>
<?php $this->END_HTML() ?>
