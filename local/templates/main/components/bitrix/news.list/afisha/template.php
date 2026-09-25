<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arResult */
/** @var array $arParams */
$this->setFrameMode(true);

global $APPLICATION;

$filter = $arResult['FILTER'] ?? [];
$tabs = $arResult['TYPE_TABS'] ?? [];
$opts = $arResult['FILTER_OPTIONS'] ?? [];
$base = $arResult['FILTER_BASE'] ?: $APPLICATION->GetCurPage(false);

$queryWithout = static function (array $filter, string $drop) use ($base): string {
    $params = array_filter($filter, static function ($v) {
        return $v !== '' && $v !== null;
    });
    unset($params[$drop]);
    $qs = http_build_query($params);
    return $qs === '' ? $base : $base . '?' . $qs;
};

$queryWith = static function (array $filter, string $key, string $value) use ($base): string {
    $params = array_filter($filter, static function ($v) {
        return $v !== '' && $v !== null;
    });
    if ($value === '') {
        unset($params[$key]);
    } else {
        $params[$key] = $value;
    }
    $qs = http_build_query($params);
    return $qs === '' ? $base : $base . '?' . $qs;
};

$hasFilters = (bool)array_filter($filter);
$secondary = ['education', 'special'];
?>
<section class="afisha-filters">
    <div class="section__container">
        <div class="afisha-filters__types">
            <?php foreach ($tabs as $code => $label):
                if (in_array($code, $secondary, true)) {
                    continue;
                }
                $active = ($filter['type'] ?? '') === $code;
            ?>
            <a href="<?= htmlspecialcharsbx($queryWith($filter, 'type', $code)) ?>"
               class="afisha-filters__tab<?= $active ? ' afisha-filters__tab--active' : '' ?>"><?= htmlspecialcharsbx($label) ?></a>
            <?php endforeach; ?>
        </div>
        <div class="afisha-filters__types afisha-filters__types--secondary">
            <?php foreach ($secondary as $code):
                if (!isset($tabs[$code])) {
                    continue;
                }
                $active = ($filter['type'] ?? '') === $code;
            ?>
            <a href="<?= htmlspecialcharsbx($queryWith($filter, 'type', $code)) ?>"
               class="afisha-filters__tab<?= $active ? ' afisha-filters__tab--active' : '' ?>"><?= htmlspecialcharsbx($tabs[$code]) ?></a>
            <?php endforeach; ?>
        </div>

        <form class="afisha-filters__row" method="get" action="<?= htmlspecialcharsbx($base) ?>">
            <?php if (!empty($filter['type'])): ?>
            <input type="hidden" name="type" value="<?= htmlspecialcharsbx($filter['type']) ?>">
            <?php endif; ?>
            <div class="afisha-filters__dropdowns">
                <label class="afisha-filters__dropdown">
                    Дата
                    <select name="date" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($opts['date'] ?? [] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= ($filter['date'] ?? '') === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="afisha-filters__dropdown">
                    Город
                    <select name="city" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($opts['city'] ?? [] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= ($filter['city'] ?? '') === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="afisha-filters__dropdown">
                    Проект
                    <select name="project" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($opts['project'] ?? [] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= ($filter['project'] ?? '') === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="afisha-filters__dropdown">
                    Участники
                    <select name="participants" onchange="this.form.submit()">
                        <option value="">Все</option>
                        <?php foreach ($opts['participants'] ?? [] as $val => $label): ?>
                        <option value="<?= htmlspecialcharsbx($val) ?>"<?= ($filter['participants'] ?? '') === (string)$val ? ' selected' : '' ?>><?= htmlspecialcharsbx($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <?php if ($hasFilters): ?>
            <a href="<?= htmlspecialcharsbx($base) ?>" class="afisha-filters__reset">Сбросить фильтры</a>
            <?php endif; ?>
        </form>
    </div>
</section>

<section class="events afisha-events">
    <div class="section__container">
        <?php if (empty($arResult['ITEMS'])): ?>
        <p class="afisha-events__empty">Событий по выбранным фильтрам нет.</p>
        <?php else: ?>
        <div class="events__grid">
            <?php foreach ($arResult['ITEMS'] as $item):
                $this->AddEditAction($item['ID'], $item['EDIT_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_EDIT'));
                $this->AddDeleteAction($item['ID'], $item['DELETE_LINK'], CIBlock::GetArrayByID($item['IBLOCK_ID'], 'ELEMENT_DELETE'), ['CONFIRM' => 'Удалить?']);
                $img = $item['PREVIEW_PICTURE']['SRC'] ?? ($item['DETAIL_PICTURE']['SRC'] ?? '');
                $place = $item['DISPLAY_PROPERTIES']['PLACE']['DISPLAY_VALUE']
                    ?? ($item['DISPLAY_PROPERTIES']['PLACE']['VALUE'] ?? '');
                if (is_array($place)) {
                    $place = implode(', ', $place);
                }
                $metaParts = array_filter([$item['DISPLAY_ACTIVE_FROM'] ?? '', $place]);
                $ticketUrl = $item['DISPLAY_PROPERTIES']['TICKETS_URL']['VALUE'] ?? '';
            ?>
            <article class="event-card" id="<?= $this->GetEditAreaId($item['ID']) ?>">
                <?php if ($img): ?>
                <div class="event-card__image">
                    <img src="<?= htmlspecialcharsbx($img) ?>" alt="<?= htmlspecialcharsbx($item['NAME']) ?>">
                </div>
                <?php endif; ?>
                <div class="event-card__body">
                    <?php if ($metaParts): ?>
                    <p class="event-card__meta"><?= htmlspecialcharsbx(implode(' • ', $metaParts)) ?></p>
                    <?php endif; ?>
                    <h3 class="event-card__title"><?= htmlspecialcharsbx($item['NAME']) ?></h3>
                    <?php if (!empty($item['PREVIEW_TEXT'])): ?>
                    <p class="event-card__desc"><?= $item['PREVIEW_TEXT'] ?></p>
                    <?php endif; ?>
                </div>
                <div class="event-card__actions">
                    <a href="<?= htmlspecialcharsbx($item['DETAIL_PAGE_URL']) ?>" class="event-card__link">Подробнее</a>
                    <?php if ($ticketUrl): ?>
                    <a href="<?= htmlspecialcharsbx($ticketUrl) ?>" class="btn btn--primary btn--sm" target="_blank" rel="noopener">Билеты</a>
                    <?php endif; ?>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($arResult['NAV_STRING'])): ?>
        <nav class="afisha-pagination" aria-label="Пагинация">
            <?= $arResult['NAV_STRING'] ?>
        </nav>
        <?php endif; ?>
    </div>
</section>
