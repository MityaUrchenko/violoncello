<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

global $APPLICATION;

$roleProp = $arParams['ROLE_PROPERTY'] ?: 'ROLE';
$positionProp = $arParams['POSITION_PROPERTY'] ?: 'POSITION';

$arResult['FILTER'] = [
    'role' => isset($_REQUEST['role']) ? trim((string)$_REQUEST['role']) : '',
    'position' => isset($_REQUEST['position']) ? trim((string)$_REQUEST['position']) : '',
];

$arResult['ROLE_TABS'] = [
    '' => 'Все',
    'members' => 'Участники',
    'alumni' => 'Выпускники',
    'trustees' => 'Попечители',
];

$iblockId = (int)$arParams['IBLOCK_ID'];

$collect = static function (int $iblockId, string $code): array {
    if ($iblockId <= 0 || $code === '') {
        return [];
    }
    $values = [];
    $res = CIBlockElement::GetList(
        [],
        ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
        false,
        false,
        ['ID', 'PROPERTY_' . $code]
    );
    while ($row = $res->Fetch()) {
        $val = $row['PROPERTY_' . $code . '_VALUE'] ?? '';
        $enum = $row['PROPERTY_' . $code . '_ENUM_ID'] ?? '';
        $xml = $row['PROPERTY_' . $code . '_XML_ID'] ?? '';
        if (is_array($val)) {
            $val = reset($val);
        }
        $val = trim((string)$val);
        if ($val === '') {
            continue;
        }
        $key = $xml !== '' && $xml !== null ? (string)$xml : ((string)$enum !== '' ? (string)$enum : $val);
        $values[$key] = $val;
    }
    asort($values, SORT_NATURAL | SORT_FLAG_CASE);
    return $values;
};

$arResult['FILTER_OPTIONS'] = [
    'position' => $collect($iblockId, $positionProp),
];

$arResult['FILTER_BASE'] = '/community/';
$arResult['ROLE_PATHS'] = [
    '' => '/community/',
    'members' => '/community/members/',
    'alumni' => '/community/alumni/',
    'trustees' => '/community/trustees/',
];
