<?php
$arUrlRewrite = [
    [
        'CONDITION' => '#^/community/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/community/index.php',
        'SORT' => 80,
    ],
    /*
    [
        'CONDITION' => '#^/news/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/news/index.php',
        'SORT' => 100,
    ],
    */
    [
        'CONDITION' => '#^/projects/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/projects/index.php',
        'SORT' => 110,
    ],
    [
        "CONDITION" => "#^/news/([a-z0-9\-_]+)/?(\?.*)?$#",
        "RULE" => "CODE=$1",
        "PATH" => "/news/detail.php",
    ],
];
