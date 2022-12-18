<?php

use helpers\Helpers;

get_header();

$current_tax = get_queried_object();

$paged = 1;
$ajax = new Ajax();

$taxonomy = $current_tax->taxonomy;
$term_id = $current_tax->term_id;

$dataArticles = $ajax->get_articles($taxonomy, $term_id);
$articles = $dataArticles['articles'];
$paged = $dataArticles['paged'];
$max_page = $dataArticles['max_page'];

$categories = get_terms( array(
    'taxonomy' => 'articles-category',
    'hide_empty' => false,
));


$categoryData = array_map(function (WP_Term $term) {
    $image = get_field('categoryimage', $term);
    return [
        'image' => $image['url'] ?? null,
        'title' => $term->name,
        'link' => get_term_link($term)
    ];
}, $categories);
?>
    <section class="articles-category">
        <div class="container">
            <h1 class="articles-category__main-title">Категории статей</h1>

            <div class="articles-category__slider-block">
                <div class="swiper swiper-article__category">
                    <div class="swiper-wrapper">
                        <?php if (!empty($categoryData)) : ?>
                            <?php foreach ($categoryData as $item) : ?>
                                <div class="swiper-slide">
                                    <a href="<?= $item['link'] ?>" class="swiper-article__card">
                                        <picture>
                                            <img loading="lazy" src="<?= $item['image'] ?>" alt="">
                                        </picture>
                                        <b class="swiper-article__card-title"><?= $item['title'] ?></b>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="articles-category__slider-buttons">
                <div class="custom-swiper-button swiper-article__category-prev">
                    <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"/>
                    </svg>
                </div>
                <div class="custom-swiper-button swiper-article__category-next">
                    <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"/>
                    </svg>
                </div>
            </div>


            <div class="articles-category--articles-container">

                <?php if(!empty($articles)) : ?>
                    <?php foreach($articles as $article) : ?>
                        <?php
                        $text = get_field('text', $article->ID);
                        $readingTime = Helpers::get_reading_time($text);
                        $image = get_field('photo', $article);
                        $readingTime = !empty($readingTime) ? $readingTime : 1;
                        $title = get_the_title($article);
                        ?>

                        <div class="article-card">
                            <div class="article-card__overlay">
                                <p class="article-card__reading-time">Статья <?= $readingTime ?> минут</p>
                                <p class="article-card__title">
                                    <?= $title ?>
                                </p>

                                <div class="custom-swiper-button article-card__button">
                                    <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"/>
                                    </svg>
                                </div>
                            </div>
                            <?php if(!empty($image)) : ?>
                                <picture class="article-card__image">
                                    <img loading="lazy" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                                </picture>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>


        </div>



    </section>


<?php
get_footer();
?>