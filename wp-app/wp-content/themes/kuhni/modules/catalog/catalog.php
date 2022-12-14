<?php

/*
Title: Каталог модуль
Mode: preview
*/

$headline = get_field('headline');
$terms = get_terms([
    'taxonomy' => 'kitchen-category',
    'hide_empty' => false,
    'orderby' => 'id',
    'order' => 'DESC',
]);

$categories_top = array_slice($terms, '0', 3);
$categories_bottom = array_slice($terms, '3', 6);
?>


<?php if (!is_admin()) : ?>
    <section class="catalog">
        <div class="container">
            <div class="catalog-wrapper">
                <h1><?= $headline ?? '' ?></h1>

                <div class="catalog-top">
                    <div class="catalog-top-left">
                        <?php if (!empty($categories_top)) : ?>
                            <?php
                            $gallery = get_field('gallery', $categories_top[0]->taxonomy . '_' . $categories_top[0]->term_id);
                            $url = sprintf("%s/%s/%s", home_url(), $categories_top[0]->taxonomy, $categories_top[0]->slug);
                            ?>
                            <a href="<?= $url ?? '#' ?>" class="catalog-top-left-item">
                                <picture>
                                    <img loading="lazy" src="<?= $gallery[0]['url'] ?>" alt="<?= $gallery[0]['title'] ?>">
                                </picture>
                                <div class="item-title"><?= $categories_top[0]->name ?></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="59" height="58" viewBox="0 0 59 58"
                                     fill="none">
                                    <path d="M29.5 57.6889C45.7924 57.6889 59 44.7748 59 28.8444C59 12.9141 45.7924 0 29.5 0C13.2076 0 0 12.9141 0 28.8444C0 44.7748 13.2076 57.6889 29.5 57.6889Z"
                                          fill="#ED1C24"/>
                                    <g clip-path="url(#clip0_143_4094)">
                                        <path d="M18.0687 27.8202H39.7613L36.1678 24.2441C35.7669 23.845 35.7653 23.1965 36.1644 22.7955C36.5635 22.3945 37.2121 22.393 37.613 22.792L42.9652 28.1184C42.9656 28.1187 42.9658 28.1191 42.9662 28.1194C43.3661 28.5185 43.3674 29.1691 42.9663 29.5695C42.9659 29.5698 42.9656 29.5702 42.9653 29.5705L37.6131 34.8969C37.2122 35.2958 36.5636 35.2945 36.1645 34.8934C35.7654 34.4924 35.767 33.8439 36.1679 33.4448L39.7613 29.8688H18.0687C17.5029 29.8688 17.0444 29.4102 17.0444 28.8445C17.0444 28.2787 17.5029 27.8202 18.0687 27.8202Z"
                                              fill="white"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_143_4094">
                                            <rect width="26.2222" height="26.2222" fill="white"
                                                  transform="matrix(-1 0 0 1 43.2666 15.7334)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="catalog-top-right">
                        <?php if (!empty($categories_top)) : ?>
                            <?php foreach ($categories_top as $key => $term) : ?>
                                <?php if ($key > 0) : ?>
                                    <?php
			                        $gallery = get_field('gallery', $term->taxonomy . '_' . $term->term_id);
                                    $url = sprintf("%s/%s/%s", home_url(), $term->taxonomy, $term->slug);
                                    ?>
                                    <a href="<?= $url ?? '#' ?>" class="catalog-top-right-item">
                                        <picture>
                                            <img loading="lazy" src="<?= $gallery[0]['url'] ?>" alt="<?= $gallery[0]['title'] ?>">
                                        </picture>
                                        <div class="item-title"><?= $term->name ?></div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (!empty($categories_bottom)) : ?>
                    <div class="catalog-bottom">
                        <?php foreach ($categories_bottom as $term) : ?>
                            <?php
	                        $gallery = get_field('gallery', $term->taxonomy . '_' . $term->term_id);
                            $url = sprintf("%s/%s/%s", home_url(), $term->taxonomy, $term->slug);
                            ?>
                            <a href="<?= $url ?? '#' ?>" class="catalog-bottom-item">
                                <picture>
                                    <img loading="lazy" src="<?= $gallery[0]['url'] ?>" alt="<?= $gallery[0]['title'] ?>">
                                </picture>
                                <div class="item-title"><?= $term->name ?></div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Каталог модуль</h2>
<?php endif; ?>