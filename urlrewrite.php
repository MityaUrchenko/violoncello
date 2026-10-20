<?php
$arUrlRewrite=array (
  2 => 
  array (
    'CONDITION' => '#^/news/([a-z0-9\\-_]+)/?(\\?.*)?$#',
    'RULE' => 'CODE=$1',
    'PATH' => '/news/detail.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/community/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/community/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/projects/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/projects/index.php',
    'SORT' => 110,
  ),
);
