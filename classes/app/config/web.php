<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 1:14
 */

return [
    "brand" => "РТД-31",
    "language" => "ru-RU",
    "cookieValidationKey" => "wnk3nFF3ff3d2d2d23",
    "components" => [
        "UrlManager" => [
            "showPrettyURL" => true,
            "rules" => [
                "" => "site/index"
            ]
        ],
        "View" => [
            "directory" => "layouts",
            "main" => "main"
        ]
    ]
];
