<?php

use helpers\Helpers;

get_header();
$categories = get_the_terms($post, 'articles-category');

$category = !empty($categories) ? $categories[array_rand($categories)] : [];

$ajax = new Ajax();
if (!empty($category)) {

    $articlesData = [
        'articles' => $ajax->getArticlesByTermId($category->term_id)
    ];


}

$title = get_the_title();
$created_at = get_the_date('j F Y', $post);
$image = get_field('photo');
$text = get_field('text');

$readTimeMinutes = Helpers::get_reading_time($text);
$additionalBlogClass = 'additional-articles';
$blogTitle = 'Другие статьи по теме';



?>
<?php include get_template_directory() . '/modules/breadcrumb/breadcrumb.php' ?>
<section class="single-article">
    <?php if(!empty($title)) : ?>
            <div class="container">
                <div class="single-article__header">
                    <div class="single-article__title-wrapper">
                        <h2 class="single-article__title">
                            <?= $title ?>
                        </h2>

                        <?php if(!empty($created_at)): ?>
                            <span class="single-article__created-at"><?= $created_at ?></span>
                        <?endif; ?>
                        <?php if(wp_is_mobile()) : ?>
                            <span class="single-article__read-time">Статья <?= $readTimeMinutes ?> минут(ы)</span>
                        <?php endif; ?>
                    </div>
                    <?php if(!wp_is_mobile()) : ?>
                        <span class="single-article__read-time">Статья <?= $readTimeMinutes ?> минут(ы)</span>
                    <?php endif; ?>
                </div>
            </div>
    <?endif; ?>
    <div class="container-s">
        <?php if(!empty($image)) : ?>
            <div class="single-article__photo" style="background-image: url(<?= $image['url'] ?>)">
<!--                <img src="--><?//= $image['url'] ?><!--" alt="">-->
            </div>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="single-article__text-wrapper">
            <?php if(!empty($title)) : ?>
                <span class="single-article__title">
                    <?= $title ?>
                </span>
            <?endif; ?>
            <?php if(!empty($text)) : ?>
                <div class="single-article__text">
                    <?= $text ?>
                </div>
                <span class="single-article__delimeter"></span>
            <?endif; ?>
            <div class="single-article__share-wrapper share">
                <span class="share__title">Поделиться статьей: </span>
                <div class="share-buttons share-article">
                    <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-limit="3" data-services="vkontakte,telegram"></div>
                </div>
            </div>
        </div>
    </div>

    <?php
        if (!wp_is_mobile() && !empty($articlesData)) {
            include get_template_directory() . '/modules/blog/blog.php';
        }
    ?>
</section>

<?php get_footer(); ?>