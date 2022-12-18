<?php
get_header();

$title = get_the_title();
$created_at = get_the_date('j F Y', $post);
$image = get_field('photo');
$text = get_field('text');
$socials = get_field('socials', 'option');


$wordPerMinute = 200;
$clearText = strip_tags($text);
$countWords = count(preg_split('/\W+/u', $clearText, -1, PREG_SPLIT_NO_EMPTY));
$readTimeMinutes = floor($countWords / 200);

?>
<section class="single-article">
    <?php if(!empty($title)) : ?>
            <div class="container">
                <ul class="single-article__breadcrumbs-list">
                    <li class="single-article__breadcrumb-item">
                        <a href="<?= home_url() ?>">Главная</a>
                    <li><svg style="display: flex" width="3" height="3" viewBox="0 0 3 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.5" cy="1.5" r="1.5" fill="#9F9F9F"/>
                        </svg>
                    </li>
                    <li class="single-article__breadcrumb-item">
                        <span>Статья</span>
                    </li>
                </ul>
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
                <ul class="socials-list">
                    <?php foreach ($socials as $social) : ?>
                        <?php if (!empty($social['logo']) && !empty($social['link'])) : ?>
                            <li class="socials-item">
                                <a href="<?= $social['link'] ?>">
                                    <img
                                            src="<?= $social['logo']['url'] ?>"
                                            alt="<?= $social['logo']['alt'] ?? '' ?>"
                                    >
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
            </div>

        </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>