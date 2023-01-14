<?php

use helpers\Helpers;

get_header();
include get_template_directory() . '/modules/breadcrumb/' . 'breadcrumb.php'
?>

<?php
$current_tax = get_queried_object();
$title_page = $current_tax->taxonomy === 'kitchen-category' ? $current_tax->name : 'Материалы';

$materials = get_terms([
    'taxonomy' => 'kitchen-material',
    'hide_empty' => false,
]);

$categories = get_terms([
    'taxonomy' => 'kitchen-category',
    'hide_empty' => false,
]);

$sizes = get_terms([
    'taxonomy' => 'kitchen-size',
    'hide_empty' => false,
]);

$paged = 1;
$ajax = new Ajax();

$taxonomy = $current_tax->taxonomy;
$term_id = $current_tax->term_id;

$dataFilter = $ajax->get_kitchen_filter($taxonomy, $term_id);
$entities = $dataFilter['kitchens'];
$paged = $dataFilter['paged'];
$max_page = $dataFilter['max_page'];

$sort = $_GET['sort'] ?? 'new';

$cheap = $_GET['cheap'] ?? 0;
$expensive = $_GET['expensive'] ?? Helpers::getMaxPrice();
$materialsParams = $_GET['materials'] ?? '';
$sizesParams = $_GET['sizes'] ?? '';
$classContainer = 'catalog-filter-results';
?>

    <section class="materials">
        <div class="container">
            <div class="materials-title">
                <h1><?= $title_page ?? '' ?></h1>
                <div class="materials-count"><?= count($entities) ?> моделей</div>
            </div>
            <?php if (!empty($materials)) : ?>
                <div class="swiper materials-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($materials as $material) : ?>
                            <?php
                            $image = get_field('image', $material->taxonomy . '_' . $material->term_id);
                            ?>
                            <div class="swiper-slide">
                                <div class="materials-slide-image">
                                    <picture>
                                        <img loading="lazy" src="<?= $image['url'] ?>"
                                             alt="<?= $image['title'] ?>">
                                    </picture>
                                </div>
                                <h3 class="materials-slide-title"> <?= $material->name ?> </h3>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="materials-navigation">
                        <div class="swiper-button-prev-materials">
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="37" viewBox="0 0 38 37"
                                 fill="none">
                                <path d="M18.6281 7.79225e-05C8.34005 7.88219e-05 -9.02098e-05 8.15487 -8.93304e-05 18.2143C-8.8451e-05 28.2738 8.34005 36.4286 18.6281 36.4286C28.9162 36.4286 37.2563 28.2738 37.2563 18.2143C37.2563 8.15487 28.9162 7.70231e-05 18.6281 7.79225e-05Z"
                                      fill="#E3E3E3"/>
                                <g clip-path="url(#clip0_143_3365)">
                                    <path d="M25.8467 18.8609L12.1485 18.8609L14.4177 21.119C14.6709 21.371 14.6718 21.7806 14.4198 22.0338C14.1678 22.287 13.7583 22.2879 13.5051 22.036L10.1254 18.6725C10.1251 18.6723 10.125 18.6721 10.1248 18.6719C9.87223 18.4199 9.87142 18.0091 10.1247 17.7562C10.1249 17.756 10.1251 17.7558 10.1253 17.7556L13.505 14.3922C13.7582 14.1402 14.1678 14.1411 14.4198 14.3944C14.6718 14.6476 14.6708 15.0571 14.4176 15.3091L12.1485 17.5673L25.8467 17.5673C26.2039 17.5673 26.4935 17.8568 26.4935 18.2141C26.4935 18.5713 26.2039 18.8609 25.8467 18.8609Z"
                                          fill="#9F9F9F"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_143_3365">
                                        <rect width="16.5584" height="16.5584" fill="white"
                                              transform="matrix(1 -8.74228e-08 -8.74228e-08 -1 9.93506 26.4935)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="swiper-button-next-materials">
                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="37" viewBox="0 0 38 37"
                                 fill="none">
                                <path d="M19.3719 36.4286C29.6599 36.4286 38.0001 28.2738 38.0001 18.2144C38.0001 8.15493 29.6599 0.00012207 19.3719 0.00012207C9.08379 0.00012207 0.743652 8.15493 0.743652 18.2144C0.743652 28.2738 9.08379 36.4286 19.3719 36.4286Z"
                                      fill="#ED1C24"/>
                                <g clip-path="url(#clip0_143_3371)">
                                    <path d="M12.1533 17.5676H25.8515L23.5823 15.3094C23.3291 15.0574 23.3282 14.6479 23.5802 14.3947C23.8322 14.1415 24.2417 14.1405 24.4949 14.3925L27.8746 17.7559C27.8749 17.7561 27.875 17.7564 27.8752 17.7566C28.1278 18.0086 28.1286 18.4194 27.8753 18.6722C27.8751 18.6724 27.8749 18.6727 27.8747 18.6729L24.495 22.0363C24.2418 22.2882 23.8322 22.2874 23.5802 22.0341C23.3282 21.7809 23.3292 21.3714 23.5824 21.1194L25.8515 18.8612H12.1533C11.7961 18.8612 11.5065 18.5716 11.5065 18.2144C11.5065 17.8572 11.7961 17.5676 12.1533 17.5676Z"
                                          fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_143_3371">
                                        <rect width="16.5584" height="16.5584" fill="white"
                                              transform="matrix(-1 0 0 1 28.0649 9.935)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="catalog-filter">
        <div class="container">
            <div class="catalog-filter-wrapper">
                <div class="catalog-filter-left">
                    <div class="catalog-filter-left-categories-wrapper">
                        <svg class="svg-kitchen" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                            <g clip-path="url(#clip0_143_3222)">
                                <path d="M27.5625 16.625H18.8125V15.75H19.25C19.4916 15.75 19.6875 15.5541 19.6875 15.3125C19.6875 15.0709 19.4916 14.875 19.25 14.875H18.8125V14.4375C18.8125 13.471 19.596 12.6875 20.5625 12.6875C21.529 12.6875 22.3125 13.471 22.3125 14.4375C22.3125 14.6791 22.5084 14.875 22.75 14.875C22.9916 14.875 23.1875 14.6791 23.1875 14.4375C23.1875 12.9877 22.0123 11.8125 20.5625 11.8125C19.1127 11.8125 17.9375 12.9877 17.9375 14.4375V16.625H10.5962C10.8147 16.3859 10.9364 16.0739 10.9375 15.75V13.125C10.9375 12.8834 10.7416 12.6875 10.5 12.6875H3.9375C3.69589 12.6875 3.5 12.8834 3.5 13.125V15.75C3.50115 16.0739 3.62277 16.3859 3.84125 16.625H0.4375C0.195891 16.625 0 16.8209 0 17.0625V27.5625C0 27.8041 0.195891 28 0.4375 28H27.5625C27.8041 28 28 27.8041 28 27.5625V17.0625C28 16.8209 27.8041 16.625 27.5625 16.625ZM4.375 13.5625H10.0625V15.75C10.0625 15.9916 9.86661 16.1875 9.625 16.1875H4.8125C4.57089 16.1875 4.375 15.9916 4.375 15.75V13.5625ZM7 27.125H0.875V21.875H7V27.125ZM7 21H0.875V17.5H2.1875C2.1875 17.7416 2.38339 17.9375 2.625 17.9375H5.25C5.49161 17.9375 5.6875 17.7416 5.6875 17.5H7V21ZM20.125 27.125H7.875V17.5H20.125V27.125ZM27.125 27.125H21V21.875H27.125V27.125ZM27.125 21H21V17.5H22.3125C22.3125 17.7416 22.5084 17.9375 22.75 17.9375H25.375C25.6166 17.9375 25.8125 17.7416 25.8125 17.5H27.125V21Z"
                                      fill="black"/>
                                <path d="M8.75 24.0625H19.25C19.4916 24.0625 19.6875 23.8666 19.6875 23.625V19.25C19.6875 19.0084 19.4916 18.8125 19.25 18.8125H8.75C8.50839 18.8125 8.3125 19.0084 8.3125 19.25V23.625C8.3125 23.8666 8.50839 24.0625 8.75 24.0625ZM9.1875 19.6875H18.8125V23.1875H9.1875V19.6875Z"
                                      fill="black"/>
                                <path d="M16.625 25.375H11.375C11.1334 25.375 10.9375 25.5709 10.9375 25.8125C10.9375 26.0541 11.1334 26.25 11.375 26.25H16.625C16.8666 26.25 17.0625 26.0541 17.0625 25.8125C17.0625 25.5709 16.8666 25.375 16.625 25.375Z"
                                      fill="black"/>
                                <path d="M4.8125 6.5625H23.1875C23.4291 6.5625 23.625 6.36661 23.625 6.125V0.4375C23.625 0.195891 23.4291 0 23.1875 0H4.8125C4.57089 0 4.375 0.195891 4.375 0.4375V6.125C4.375 6.36661 4.57089 6.5625 4.8125 6.5625ZM14.4375 0.875H22.75V5.6875H14.4375V0.875ZM5.25 0.875H13.5625V5.6875H5.25V0.875Z"
                                      fill="black"/>
                                <path d="M10.9375 3.0625H7.4375C7.19589 3.0625 7 3.25839 7 3.5C7 3.74161 7.19589 3.9375 7.4375 3.9375H10.9375C11.1791 3.9375 11.375 3.74161 11.375 3.5C11.375 3.25839 11.1791 3.0625 10.9375 3.0625Z"
                                      fill="black"/>
                                <path d="M20.5625 3.0625H17.0625C16.8209 3.0625 16.625 3.25839 16.625 3.5C16.625 3.74161 16.8209 3.9375 17.0625 3.9375H20.5625C20.8041 3.9375 21 3.74161 21 3.5C21 3.25839 20.8041 3.0625 20.5625 3.0625Z"
                                      fill="black"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_143_3222">
                                    <rect width="28" height="28" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <h3>
                            Категории
                            <svg class="svg-arrow" xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                <path d="M5.3902 5.77796L9.84025 1.32784C9.94325 1.22491 10 1.08751 10 0.941009C10 0.794506 9.94325 0.657109 9.84025 0.554183L9.51261 0.226462C9.29911 0.0132119 8.95212 0.0132119 8.73895 0.226462L5.00207 3.96334L1.26105 0.222315C1.15804 0.119389 1.02072 0.0625606 0.874302 0.0625606C0.727717 0.0625606 0.590401 0.119389 0.487312 0.222315L0.159754 0.550036C0.0567474 0.653044 -3.18131e-08 0.79036 -3.8217e-08 0.936863C-4.46208e-08 1.08337 0.0567474 1.22076 0.159754 1.32369L4.61386 5.77796C4.7172 5.88113 4.85516 5.9378 5.00183 5.93747C5.14906 5.9378 5.28695 5.88113 5.3902 5.77796Z" fill="black"/>
                            </svg>
                        </h3>
                        <?php if (!empty($categories)) : ?>
                            <div class="filter-left-categories">
                                <?php foreach ($categories as $key => $category) : ?>
                                    <?php
                                    $url = sprintf("%s/%s/%s", home_url(), $category->taxonomy, $category->slug);
                                    ?>
                                    <?php if ($key === 0) : ?>
                                        <a href="<?= home_url() . '/categories' ?>"
                                           class="filter-left-category <?php if (!empty($current_tax->post_name) && $current_tax->post_name === 'categories' || $taxonomy !== 'kitchen-category') : ?> js-active-category <?php endif ?>"
                                           data-term-id="all">Все категории
                                        </a>
                                    <?php endif; ?>
                                    <a href="<?= $url ?>"
                                       class="filter-left-category <?php if ($current_tax->term_id == $category->term_id) : ?> js-active-category <?php endif; ?>"
                                       data-term-id="<?= $category->term_id ?>"><?= $category->name ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="catalog-filter-left-filters-wrapper">
                        <h3>
                            Фильтры
                            <svg class="svg-arrow" xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                <path d="M5.3902 5.77796L9.84025 1.32784C9.94325 1.22491 10 1.08751 10 0.941009C10 0.794506 9.94325 0.657109 9.84025 0.554183L9.51261 0.226462C9.29911 0.0132119 8.95212 0.0132119 8.73895 0.226462L5.00207 3.96334L1.26105 0.222315C1.15804 0.119389 1.02072 0.0625606 0.874302 0.0625606C0.727717 0.0625606 0.590401 0.119389 0.487312 0.222315L0.159754 0.550036C0.0567474 0.653044 -3.18131e-08 0.79036 -3.8217e-08 0.936863C-4.46208e-08 1.08337 0.0567474 1.22076 0.159754 1.32369L4.61386 5.77796C4.7172 5.88113 4.85516 5.9378 5.00183 5.93747C5.14906 5.9378 5.28695 5.88113 5.3902 5.77796Z" fill="black"/>
                            </svg>
                        </h3>
                        <div class="taxonomy-container tax-materials">
                            <h4 class="taxonomy-container-title">Материал кухни</h4>
                            <?php if (!empty($materials)) : ?>
                                <div class="taxonomy-container-checkbox-wrapper">
                                    <?php foreach ($materials as $key => $material) : ?>
                                        <div class="taxonomy-container-checkbox <?php if ($current_tax->term_id == $material->term_id || str_contains($materialsParams, $material->term_id)) : ?> js-active-checkbox <?php endif; ?> <?php if ($key > 4) : ?> js-hidden <?php endif; ?>"
                                             data-term-id="<?= $material->term_id ?>"
                                        >
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6"
                                                     viewBox="0 0 9 6"
                                                     fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M8.35355 0.146445C8.5488 0.34171 8.5488 0.65829 8.35355 0.853555L3.35355 5.85355C3.1583 6.0488 2.84171 6.0488 2.64644 5.85355L0.146445 3.35355C-0.048815 3.1583 -0.048815 2.8417 0.146445 2.64645C0.34171 2.4512 0.65829 2.4512 0.853555 2.64645L3 4.7929L7.64645 0.146445C7.8417 -0.048815 8.1583 -0.048815 8.35355 0.146445Z"
                                                      fill="white"/>
                                                </svg>
                                            </span>
                                            <p><?= $material->name ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="filter-show-all">показать все
                                        <span></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="taxonomy-container tax-sizes">
                            <h4 class="taxonomy-container-title">Размер метров</h4>
                            <?php if (!empty($sizes)) : ?>
                                <div class="taxonomy-container-checkbox-wrapper">
                                    <?php foreach ($sizes as $size) : ?>
                                        <div class="taxonomy-container-checkbox
                                        <?php if ($current_tax->term_id == $size->term_id || str_contains($sizesParams, $size->term_id)) : ?>
                                        js-active-checkbox
                                        <?php endif; ?>
                                        "
                                             data-term-id="<?= $size->term_id ?>"
                                        >
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6"
                                                     viewBox="0 0 9 6"
                                                     fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M8.35355 0.146445C8.5488 0.34171 8.5488 0.65829 8.35355 0.853555L3.35355 5.85355C3.1583 6.0488 2.84171 6.0488 2.64644 5.85355L0.146445 3.35355C-0.048815 3.1583 -0.048815 2.8417 0.146445 2.64645C0.34171 2.4512 0.65829 2.4512 0.853555 2.64645L3 4.7929L7.64645 0.146445C7.8417 -0.048815 8.1583 -0.048815 8.35355 0.146445Z"
                                                      fill="white"/>
                                                </svg>
                                            </span>
                                            <p><?= $size->name ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="taxonomy-container">
                            <h4 class="taxonomy-container-title">Цена</h4>
                            <div class="range-inputs-container">
                                <div class="dual-range" data-min="0" data-max="<?= Helpers::getMaxPrice() ?>">
                                    <span class="handle left" data-value="<?= $cheap ?>"></span>
                                    <span class="highlight"></span>
                                    <span class="handle right" data-value="<?= $expensive ?>"></span>
                                </div>

                                <div class="range-inputs">
                                    <input class="range-inputs-left" type="text" placeholder="0" min="0"
                                           max="<?= Helpers::getMaxPrice() ?>"
                                           oninput="validity.valid||(value='');">
                                    <input class="range-inputs-right" type="text"
                                           min="0"
                                           max="<?= Helpers::getMaxPrice() ?>"
                                           oninput="validity.valid||(value='');">
                                </div>
                            </div>
                        </div>
                        <button class="filter-apply" type="button"> применить</button>
                        <div class="filter-reset">сбросить фильтр <span></span></div>
                    </div>
                </div>
                <div class="catalog-filter-right">
                    <div class="catalog-filter-right-sorting">
                        <p class="sorting-title">Сортировать:</p>
                        <div class="sorting-items">
                            <p class="sorting-item js-active-sort" data-type="new">
                                Новинки
                                <span></span>
                            </p>
                            <p class="sorting-item" data-type="discount">
                                Скидки
                                <span></span>
                            </p>
                            <p class="sorting-item" data-type="popular">
                                Популярные
                                <span></span>
                            </p>
                            <p class="sorting-item" data-type="cheap">
                                Сначала дешёвые
                                <span></span>
                            </p>
                            <p class="sorting-item" data-type="expensive">
                                Сначала дорогие
                                <span></span>
                            </p>
                        </div>
                    </div>
                    <div class="catalog-filter-wrapper-results">
                        <div class="catalog-ajax-container">
                            <?php include get_template_directory() . '/ajax-blocks/filter-card-ajax.php' ?>
                        </div>
                        <div class="loader-container" style="display: none">
                            <div class="loader"></div>
                            <div class="loader-bg"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
?>