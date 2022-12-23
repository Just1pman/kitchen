<?php

/*
Title: Блог модуль
Mode: preview
*/

//$logo = get_field('logo', 'option');
$ajax = new Ajax();

$articlesData = $ajax->get_articles(null);

$articles = $articlesData['articles'];

if (wp_is_mobile()) {
    $articles = array_slice($articles, 0 , 2);
}

$title = get_field('blog_title');
$linkData = get_field('link');
$needPagination = false
?>

<?php if (!is_admin()) : ?>
    <section class="blog">
        <div class="container">

            <div class="blog__wrapper">
                <div class="blog__header">
                    <h2 class="blog__main-title section-title">
                        <?= $title ?>
                    </h2>

                    <div class="all-articles-button-wrapper hidden">
                        <?php if(!empty($linkData)) : ?>
                            <a class="blog_all-articles all-entities-link"
                               href="<?= $linkData['url'] ?>"
                                <?php if ($linkData['target']) : ?> target="_blank" <?php endif; ?>
                            >
                                <?= $linkData['title'] ?>
                                <svg class="circle" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                     fill="none">
                                    <circle cx="5" cy="5" r="5" fill="#ED1C24"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="swiper swiper-blog">
                    <div class="swiper-wrapper">
                        <?php if(!empty($articles)) : ?>
                            <?php foreach ($articles as $article) : ?>
                                <div class="swiper-slide">
                                    <div class="blog__card">
                                        <?php
                                            include get_template_directory() . '/partials/single-article-card.php'
                                        ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <?php if (wp_is_mobile()) :?>
                        <div class="all-articles-button-wrapper">
                            <?php if(!empty($linkData)) : ?>
                                <a class="blog__all-articles all-entities-link"
                                   href="<?= $linkData['url'] ?>"
                                    <?php if ($linkData['target']) : ?> target="_blank" <?php endif; ?>
                                >
                                    <?= $linkData['title'] ?>
                                    <svg class="circle" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                         fill="none">
                                        <circle cx="5" cy="5" r="5" fill="#ED1C24"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>


            </div>



        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Блог модуль</h2>
<?php endif; ?>
