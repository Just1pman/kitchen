<?php

/*
Title: Блог модуль
Mode: preview
*/

//$logo = get_field('logo', 'option');
$ajax = new Ajax();

$articlesData = $articlesData ?? $ajax->get_articles(null);

$articles = $articlesData['articles'];

if (wp_is_mobile()) {
    $articles = array_slice($articles, 0 , 2);
}

$blogTitle = $blogTitle ?? get_field('blog_title');
$linkData = get_field('link');
$needPagination = false
?>

<?php if (!is_admin()) : ?>
    <section class="blog <?= $additionalBlogClass ?? '' ?>">
        <div class="container">

            <div class="blog__wrapper">
                <div class="blog__header">
                    <h2 class="blog__main-title section-title">
                        <?= $blogTitle ?>
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
                    <div class="blog__swiper-buttons">
                        <div class="custom-swiper-button prev blog__button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true" data-bcup-haslogintext="no">
                            <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"></path>
                            </svg>
                        </div>
                        <div class="custom-swiper-button blog__button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false" data-bcup-haslogintext="no">
                            <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"></path>
                            </svg>
                        </div>

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
