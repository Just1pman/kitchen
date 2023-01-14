<?php
$current_tax = get_queried_object();
$paged = 1;
$ajax = new Ajax();

$taxonomy = $current_tax->taxonomy ?? null;
$termId = $current_tax->term_id ?? null;

$dataFilter = $ajax->get_accessories(
    $taxonomy,
    $termId
);

$entities = $dataFilter['accessories'];

$paged = $dataFilter['paged'];
$max_page = $dataFilter['max_page'];


$classContainer = 'catalog-filter-results';
$catalogPaginationClass = 'catalog-technics-pagination';



$categories = get_terms([
    'taxonomy' => 'accessories-category',
    'hide_empty' => false,
]);

get_header();
?>

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
                                    <a href="<?= $url ?>"
                                       class="filter-left-category <?php if ($current_tax->term_id == $category->term_id) : ?> js-active-category <?php endif; ?>"
                                       data-term-id="<?= $category->term_id ?>"><?= $category->name ?></a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="catalog-filter-right">
                    <div class="catalog-filter-wrapper-results" data-action="get_accessories" data-taxanomy="<?= $taxonomy ?? '' ?>" data-term-id="<?= $termId ?? '' ?>">
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