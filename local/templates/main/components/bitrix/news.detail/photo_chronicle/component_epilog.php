<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
if (!\CModule::IncludeModule('iblock')) {
    die('Не удалось подключить модуль iblock');
}

$iblockId = (int)($arResult['IBLOCK_ID'] ?? $arParams['IBLOCK_ID'] ?? 0);
$currentId = (int)($arResult['ID'] ?? $arParams['ELEMENT_ID'] ?? 0);
$photoProp = $arParams['PHOTO_PROPERTY'] ?: 'PHOTOS';
$detailTpl = $arParams['DETAIL_URL'] ?: '/mediacenter/photo/detail.php?ID=#ELEMENT_ID#';

if ($iblockId <= 0 || $currentId <= 0) {
    return;
}

$others = [];
$res = CIBlockElement::GetList(
    ['RAND' => 'ASC'],
    ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', '!ID' => $currentId],
    false,
    ['nTopCount' => 3],
    ['ID', 'IBLOCK_ID', 'NAME', 'CODE', 'PREVIEW_TEXT', 'PREVIEW_TEXT_TYPE', 'PREVIEW_PICTURE']
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
    $others[] = [
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

if ($others):
?>
<section class="photo-detail photo-detail--others">
    <div class="section__container">
        <div class="photo-detail__others">
            <h2 class="photo-detail__others-title">Другие альбомы</h2>
            <div class="photo-detail__others-grid">
                <?php foreach ($others as $album):
                    $albumPreview = trim((string)($album['PREVIEW_TEXT'] ?? ''));
                ?>
                <article class="photo-album-card">
                    <a href="<?= htmlspecialcharsbx($album['DETAIL_PAGE_URL']) ?>" class="photo-album-card__link">
                        <div class="photo-album-card__image">
                            <?php if (!empty($album['COVER'])): ?>
                            <img src="<?= htmlspecialcharsbx($album['COVER']) ?>" alt="<?= htmlspecialcharsbx($album['NAME']) ?>" loading="lazy" decoding="async">
                            <?php endif; ?>
                            <span class="photo-album-card__count"><?= (int)$album['PHOTOS_COUNT'] ?> фото</span>
                        </div>
                        <h3 class="photo-album-card__title"><?= $album['NAME'] ?></h3>
                        <?php if ($albumPreview !== ''): ?>
                        <div class="photo-album-card__text">
                            <?php if (($album['PREVIEW_TEXT_TYPE'] ?? 'text') === 'html'): ?>
                                <?= $albumPreview ?>
                            <?php else: ?>
                                <?= htmlspecialcharsbx($albumPreview) ?>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </a>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;

$navSections = [];
$rsSections = CIBlockSection::GetList(
    ['LEFT_MARGIN' => 'ASC'],
    ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y'],
    false,
    ['ID', 'NAME', 'IBLOCK_SECTION_ID']
);
while ($row = $rsSections->Fetch()) {
    $sid = (int)$row['ID'];
    $navSections[$sid] = [
        'id' => $sid,
        'name' => (string)$row['NAME'],
        'parent' => (int)$row['IBLOCK_SECTION_ID'],
        'children' => [],
        'elements' => [],
    ];
}
foreach ($navSections as $sid => $sec) {
    $parent = $sec['parent'];
    if ($parent && isset($navSections[$parent])) {
        $navSections[$parent]['children'][] = $sid;
    }
}
$navRoots = [];
foreach ($navSections as $sid => $sec) {
    if (!$sec['parent'] || !isset($navSections[$sec['parent']])) {
        $navRoots[] = $sid;
    }
}

$rsElements = CIBlockElement::GetList(
    ['DATE_ACTIVE_FROM' => 'ASC', 'NAME' => 'ASC'],
    ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
    false,
    false,
    ['ID', 'NAME', 'CODE', 'IBLOCK_SECTION_ID']
);
while ($row = $rsElements->Fetch()) {
    $sid = (int)$row['IBLOCK_SECTION_ID'];
    if (!$sid || !isset($navSections[$sid])) {
        continue;
    }
    $navSections[$sid]['elements'][] = [
        'id' => (int)$row['ID'],
        'name' => (string)$row['NAME'],
        'url' => str_replace(
            ['#ELEMENT_ID#', '#ID#', '#ELEMENT_CODE#', '#CODE#'],
            [$row['ID'], $row['ID'], $row['CODE'] ?? '', $row['CODE'] ?? ''],
            $detailTpl
        ),
    ];
}

if (!$navRoots) {
    return;
}

$navJson = json_encode(
    [
        'currentId' => $currentId,
        'roots' => $navRoots,
        'sections' => $navSections,
    ],
    JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
);
?>
<div class="photo-nav" data-photo-nav>
    <div class="photo-nav__panel" hidden>
        <div class="photo-nav__head">
            <button type="button" class="photo-nav__back" hidden>← Все разделы</button>
            <p class="photo-nav__crumb"></p>
        </div>
        <div class="photo-nav__grid"></div>
    </div>
    <button type="button" class="photo-nav__fab" aria-expanded="false" aria-label="Все альбомы">
        <span class="photo-nav__fab-line"></span>
        <span class="photo-nav__fab-line"></span>
        <span class="photo-nav__fab-line"></span>
    </button>
    <script type="application/json" class="photo-nav__data"><?= $navJson ?></script>
</div>
<script>if (window.initPhotoNav) window.initPhotoNav();</script>
