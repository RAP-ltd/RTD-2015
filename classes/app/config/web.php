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
        "View" => [
            "directory" => "layouts",
            "main" => "main",
            "cssFilesAtHead" => true,
            "cssCodeAtHead" => true,
            "jsFilesAtHead" => true,
            "jsCodeAtHead" => true
        ],
        "UrlManager" => [
            "errors" => [
                "error404" => "site/error404"
            ],
            "showPrettyURL" => true,
            "rules" => [
                "" => "site/index",
                "id<id:\w+>" => "site/index"
            ]
        ],
    ]
];
