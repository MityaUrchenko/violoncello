<?php
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
LocalRedirect('/mediacenter/photo/' . ($GLOBALS['APPLICATION']->GetCurParam() ? '?' . $GLOBALS['APPLICATION']->GetCurParam() : ''), true, '301 Moved Permanently');
