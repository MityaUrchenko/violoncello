<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
$id = isset($_REQUEST['ID']) ? (int)$_REQUEST['ID'] : 0;
$url = '/mediacenter/photo/detail.php' . ($id > 0 ? '?ID=' . $id : '');
LocalRedirect($url, true, '301 Moved Permanently');
