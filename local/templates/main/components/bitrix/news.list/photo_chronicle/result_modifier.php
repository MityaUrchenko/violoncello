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
