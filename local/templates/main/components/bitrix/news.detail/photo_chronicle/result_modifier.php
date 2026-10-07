<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$photoProp = $arParams['PHOTO_PROPERTY'] ?: 'PHOTOS';
$photos = [];
$prop = $arResult['DISPLAY_PROPERTIES'][$photoProp] ?? ($arResult['PROPERTIES'][$photoProp] ?? []);

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

$arResult['PHOTOS'] = $photos;
$arResult['PHOTOS_COUNT'] = count($photos);
$arResult['PHOTOS_INITIAL'] = 17;
$arResult['PHOTOS_STEP'] = 24;

$arResult['OTHER_ALBUMS'] = [];
$iblockId = (int)$arResult['IBLOCK_ID'];
$currentId = (int)$arResult['ID'];
$detailTpl = $arParams['DETAIL_URL'];

if ($iblockId > 0 && $currentId > 0) {
    $res = CIBlockElement::GetList(
        ['RAND' => 'ASC'],
        ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', '!ID' => $currentId],
        false,
        ['nTopCount' => 3],
        ['ID', 'IBLOCK_ID', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_TEXT_TYPE', 'PREVIEW_PICTURE']
    );
    while ($el = $res->GetNext()) {
        $count = 0;
        $cover = '';
        if (!empty($el['PREVIEW_PICTURE'])) {
            $cover = (string)CFile::GetPath($el['PREVIEW_PICTURE']);
        }
        $propRes = CIBlockElement::GetProperty($iblockId, $el['ID'], ['sort' => 'asc'], ['CODE' => $photoProp]);
        while ($p = $propRes->Fetch()) {
            if (empty($p['VALUE'])) {
                continue;
            }
            $count++;
            if ($cover === '') {
                $cover = (string)CFile::GetPath($p['VALUE']);
            }
        }
        $arResult['OTHER_ALBUMS'][] = [
            'ID' => (int)$el['ID'],
            'NAME' => $el['NAME'],
            'PREVIEW_TEXT' => $el['~PREVIEW_TEXT'] ?? $el['PREVIEW_TEXT'],
            'PREVIEW_TEXT_TYPE' => $el['PREVIEW_TEXT_TYPE'] ?? 'text',
            'COVER' => $cover,
            'PHOTOS_COUNT' => $count,
            'DETAIL_PAGE_URL' => str_replace(
                ['#ELEMENT_ID#', '#ID#', '#ELEMENT_CODE#', '#CODE#'],
                [$el['ID'], $el['ID'], $el['CODE'] ?? '', $el['CODE'] ?? ''],
                $detailTpl
            ),
        ];
    }
}
