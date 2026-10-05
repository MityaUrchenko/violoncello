<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

global $APPLICATION;

$photoProp = $arParams['PHOTO_PROPERTY'] ?: 'PHOTOS';
$projectProp = $arParams['PROJECT_PROPERTY'] ?: 'PROJECT';
$eventProp = $arParams['EVENT_PROPERTY'] ?: 'EVENT';

foreach ($arResult['ITEMS'] as &$item) {
    $photos = [];
    $prop = $item['DISPLAY_PROPERTIES'][$photoProp] ?? ($item['PROPERTIES'][$photoProp] ?? []);

    if (!empty($prop['FILE_VALUE'])) {
        $files = $prop['FILE_VALUE'];
        if (isset($files['SRC'])) {
            $files = [$files];
        }
        foreach ($files as $file) {
            if (!empty($file['SRC'])) {
                $photos[] = $file;
            }
        }
    } elseif (!empty($prop['VALUE'])) {
        $ids = is_array($prop['VALUE']) ? $prop['VALUE'] : [$prop['VALUE']];
        foreach ($ids as $id) {
            if (!$id) {
                continue;
            }
            $file = CFile::GetFileArray($id);
            if (!empty($file['SRC'])) {
                $photos[] = $file;
            }
        }
    }

    $item['PHOTOS'] = $photos;
    $item['PHOTOS_COUNT'] = count($photos);
}
unset($item);

$arResult['FILTER'] = [
    'year' => isset($_GET['year']) ? trim((string)$_GET['year']) : '',
    'project' => isset($_GET['project']) ? trim((string)$_GET['project']) : '',
    'event' => isset($_GET['event']) ? trim((string)$_GET['event']) : '',
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

$years = [];
if ($iblockId > 0) {
    $res = CIBlockElement::GetList(
        ['ACTIVE_FROM' => 'DESC'],
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
        $year = date('Y', $ts);
        $years[$year] = $year;
    }
    krsort($years, SORT_NUMERIC);
}

$arResult['FILTER_OPTIONS'] = [
    'year' => $years,
    'project' => $collect($iblockId, $projectProp),
    'event' => $collect($iblockId, $eventProp),
];
$arResult['FILTER_BASE'] = $APPLICATION->GetCurPage(false) ?: '/mediacenter/photo/';
