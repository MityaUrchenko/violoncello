<?php
$arUrlRewrite = [
    [
        'CONDITION' => '#^/community/(members|alumni|trustees)/#',
        'RULE' => 'role=$1',
        'ID' => '',
        'PATH' => '/community/index.php',
        'SORT' => 90,
    ],
    [
        'CONDITION' => '#^/news/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/news/index.php',
        'SORT' => 100,
    ],
    [
        'CONDITION' => '#^/projects/#',
        'RULE' => '',
        'ID' => 'bitrix:news',
        'PATH' => '/projects/index.php',
        'SORT' => 110,
    ],
];
