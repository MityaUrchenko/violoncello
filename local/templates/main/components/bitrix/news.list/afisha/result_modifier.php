<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

global $APPLICATION;

$typeProp = $arParams['TYPE_PROPERTY'] ?: 'TYPE';
$cityProp = $arParams['CITY_PROPERTY'] ?: 'CITY';
$projectProp = $arParams['PROJECT_PROPERTY'] ?: 'PROJECT';
$partProp = $arParams['PARTICIPANTS_PROPERTY'] ?: 'PARTICIPANTS';

$arResult['FILTER'] = [
    'type' => isset($_GET['type']) ? trim((string)$_GET['type']) : '',
    'date' => isset($_GET['date']) ? trim((string)$_GET['date']) : '',
    'city' => isset($_GET['city']) ? trim((string)$_GET['city']) : '',
    'project' => isset($_GET['project']) ? trim((string)$_GET['project']) : '',
    'participants' => isset($_GET['participants']) ? trim((string)$_GET['participants']) : '',
];

$arResult['TYPE_TABS'] = [
    '' => 'ВСЕ ТИПЫ',
    'concert' => 'КОНЦЕРТЫ',
    'festival' => 'ФЕСТИВАЛИ',
    'masterclass' => 'МАСТЕР-КЛАССЫ',
    'lecture' => 'ЛЕКЦИИ',
    'contest' => 'КОНКУРСЫ',
    'conference' => 'КОНФЕРЕНЦИИ',
    'education' => 'ОБРАЗОВАТЕЛЬНЫЕ ПРОГРАММЫ',
    'special' => 'СПЕЦИАЛЬНЫЕ МЕРОПРИЯТИЯ',
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
    'city' => $collect($iblockId, $cityProp),
    'project' => $collect($iblockId, $projectProp),
    'participants' => $collect($iblockId, $partProp),
];

$months = [];
$res = CIBlockElement::GetList(
    ['ACTIVE_FROM' => 'ASC'],
    ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', '!DATE_ACTIVE_FROM' => false],
    false,
    false,
    ['ID', 'ACTIVE_FROM', 'DATE_ACTIVE_FROM']
);
while ($row = $res->Fetch()) {
    $raw = $row['ACTIVE_FROM'] ?: ($row['DATE_ACTIVE_FROM'] ?? '');
    $ts = $raw ? MakeTimeStamp($raw) : 0;
    if (!$ts) {
        continue;
    }
    $key = date('Y-m', $ts);
    if (!isset($months[$key])) {
        $months[$key] = FormatDate('f Y', $ts);
    }
}
$arResult['FILTER_OPTIONS']['date'] = $months;
$arResult['FILTER_BASE'] = $APPLICATION->GetCurPage(false);
