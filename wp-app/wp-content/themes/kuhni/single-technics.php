<?php

use helpers\Helpers;

$title = $post->post_title ?? null;
$description = get_field('description');
$gallery = get_field('images');

/** @var WP_Post */
$reviews = get_field('reviews');

$brand = get_the_terms($post, 'technics-brand');
$country = get_the_terms($post, 'technics-country');

$shortInfo = [
    'Бренд' => !empty($brand) ? $brand[0]->name : null,
    'Страна' => !empty($country) ? $country[0]->name : null,
];


get_header();
?>
<?php include get_template_directory() . '/modules/breadcrumb/breadcrumb.php' ?>
    <section class="kitchen-single">
        <div class="container">
            <?php if (!empty($title)) : ?>
                <h1 class="kitchen-single__title">
                    <?= $title ?>
                </h1>
            <?php endif; ?>
            <div class="kitchen__preview">
                <div class="kitchen__preview-left">
                    <div class="kitchen-slider__thumb-wrapper">
                        <div class="custom-swiper-button prev kitchen-thumb__button-prev">
                            <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"/>
                            </svg>
                        </div>
                        <div thumbsSlider="" class="swiper kitchen-slider__thumb">
                            <div class="swiper-wrapper">
                                <?php if(!empty($gallery)) : ?>
                                    <?php foreach ($gallery as $item) : ?>
                                        <div class="swiper-slide">
                                            <picture>
                                                <img loading="lazy" src="<?= $item['url'] ?>" alt="<?= $item['alt'] ?>" />
                                            </picture>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="custom-swiper-button kitchen-thumb__button-next">
                            <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"/>
                            </svg>
                        </div>
                    </div>

                    <div
                            class="swiper kitchen-slider__preview"
                    >
                        <div class="swiper-wrapper">
                            <?php if(!empty($gallery)) : ?>
                                <?php foreach ($gallery as $item) : ?>
                                    <div class="swiper-slide">
                                        <a class="slider-loop" href="javascript:;" data-fancybox="slider" data-src="<?= $item['url'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="38" height="36" viewBox="0 0 38 36" fill="none">
                                                <path class="bg" d="M19.3038 36C29.5362 36 37.8312 27.9411 37.8312 18C37.8312 8.05888 29.5362 0 19.3038 0C9.07136 0 0.776367 8.05888 0.776367 18C0.776367 27.9411 9.07136 36 19.3038 36Z" fill="white"/>
                                                <path class="icon" d="M25.7012 23.9476L22.4647 20.7111C23.2303 19.7763 23.6912 18.5823 23.6912 17.282C23.6912 14.2922 21.2588 11.8598 18.2689 11.8598C15.2791 11.8598 12.8467 14.2922 12.8467 17.282C12.8467 20.2719 15.2791 22.7043 18.2689 22.7043C19.5692 22.7043 20.7632 22.2434 21.698 21.4778L24.9345 24.7143C25.1465 24.9263 25.4892 24.9263 25.7012 24.7143C25.9132 24.5023 25.9132 24.1596 25.7012 23.9476ZM13.9311 17.282C13.9311 14.8903 15.8772 12.9442 18.2689 12.9442C20.6607 12.9442 22.6067 14.8903 22.6067 17.282C22.6067 19.6738 20.6607 21.6198 18.2689 21.6198C15.8772 21.6198 13.9311 19.6738 13.9311 17.282Z" fill="#303030"/>
                                            </svg>
                                        </a>
                                        <picture>
                                            <img loading="lazy" src="<?= $item['url'] ?>" alt="<?= $item['alt'] ?>" />
                                        </picture>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="kitchen__preview-right">

                    <div class="kitchen__parameters-wrapper">
                        <div class="characteristics-block">
                            <div class="characteristics-block__wrapper">
                                <h3 class="characteristics-title">Характеристики</h3>

                                <ul class="characteristics-list">
                                    <?php foreach($shortInfo as $key => $item) : ?>
                                        <?php if (!empty($item)) : ?>
                                            <li class="characteristics-item">
                                                <span class="characteristics-key"><?= $key ?></span>
                                                <span class="characteristics-value"><?= $item ?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="kitchen__price-block">
                        </div>
                    </div>

                    <div class="characteristics-block__info-wrapper">
                        <div class="characteristics-block__button-group">
                            <div class="kitchen-share-wrapper">
                                <button class="characteristics-block__info-share">
                                    <svg width="37" height="38" viewBox="0 0 37 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="0.447011" y="1.34935" width="35.7907" height="35.7907" rx="17.8953" stroke="#9F9F9F" stroke-width="0.894022"/>
                                        <path d="M21.8692 22.123C21.3331 22.123 20.8534 22.3347 20.4865 22.6662L15.4565 19.7385C15.4917 19.5763 15.52 19.414 15.52 19.2447C15.52 19.0754 15.4917 18.9131 15.4565 18.7509L20.4301 15.8514C20.811 16.2041 21.3119 16.4228 21.8692 16.4228C23.0403 16.4228 23.9857 15.4775 23.9857 14.3064C23.9857 13.1353 23.0403 12.1899 21.8692 12.1899C20.6981 12.1899 19.7528 13.1353 19.7528 14.3064C19.7528 14.4757 19.781 14.6379 19.8163 14.8002L14.8427 17.6997C14.4617 17.347 13.9609 17.1283 13.4035 17.1283C12.2324 17.1283 11.2871 18.0736 11.2871 19.2447C11.2871 20.4158 12.2324 21.3611 13.4035 21.3611C13.9609 21.3611 14.4617 21.1424 14.8427 20.7897L19.8657 23.7245C19.8304 23.8726 19.8092 24.0278 19.8092 24.183C19.8092 25.3188 20.7334 26.243 21.8692 26.243C23.005 26.243 23.9292 25.3188 23.9292 24.183C23.9292 23.0472 23.005 22.123 21.8692 22.123ZM21.8692 13.6009C22.2572 13.6009 22.5747 13.9184 22.5747 14.3064C22.5747 14.6944 22.2572 15.0118 21.8692 15.0118C21.4812 15.0118 21.1638 14.6944 21.1638 14.3064C21.1638 13.9184 21.4812 13.6009 21.8692 13.6009ZM13.4035 19.9502C13.0155 19.9502 12.6981 19.6327 12.6981 19.2447C12.6981 18.8567 13.0155 18.5392 13.4035 18.5392C13.7915 18.5392 14.109 18.8567 14.109 19.2447C14.109 19.6327 13.7915 19.9502 13.4035 19.9502ZM21.8692 24.9026C21.4812 24.9026 21.1638 24.5851 21.1638 24.1971C21.1638 23.8091 21.4812 23.4916 21.8692 23.4916C22.2572 23.4916 22.5747 23.8091 22.5747 24.1971C22.5747 24.5851 22.2572 24.9026 21.8692 24.9026Z" fill="#9F9F9F"/>
                                    </svg>
                                </button>
                                <div class="share-buttons hidden">
                                    <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-limit="3" data-services="vkontakte,telegram"></div>
                                </div>
                            </div>
                        </div>
                        <ul class="delivery-list">
                        </ul>
                    </div>
                </div>
            </div>

            <div class="kitchen-single__info-module info-module">
                <div class="swiper swiper-single-kitchen">
                    <div class="swiper-wrapper info-module__tabs">

                        <div class="swiper-slide ">
                            <div id="all-chars" class="info-module__tab active" data-tab="tab-1">
                                Описание и характеристики
                            </div>
                        </div>

                        <?php if (!empty($reviews)) : ?>
                            <div class="swiper-slide ">
                                <div class="info-module__tab" data-tab="tab-4">
                                    Отзывы
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                    <div class="info-module__tab-content tab-1 active">
                        <div class="info-module__description-wrapper">
                            <div class="info-module__description-block">
                                <?= $description ?? '' ?>
                            </div>

                            <div class="characteristics-block">
                            </div>
                        </div>
                    </div>

                <?php if (!empty($reviews)) : ?>
                    <div class="info-module__tab-content tab-4">
                    <ul class="product__reviews">
                        <?php foreach ($reviews as $review) : ?>
                            <?php
                                $author = $review->post_title;
                                $created_at = get_the_date('j F Y', $review);
                                $text = get_field('text', $review);
                                $img = get_field('photo', $review);
                                $imageLink = $img['url'] ?? null;


                                $link = get_field('video', $review);
                                $preview = htmlspecialchars('<b>'.$author.'</b>' .':</br>' . strip_tags($text));
                                $isVideo = get_field('is_video', $review);


                                if ($isVideo) {
                                    $youtubeVideoId = Helpers::get_youtube_id_from_url($link);
                                    $imageLink = sprintf('https://img.youtube.com/vi/%s/0.jpg', $youtubeVideoId);
                                }
                            ?>
                            <li>
                                <<?= $isVideo ? 'a' : 'div'?>
                                    class="reviews__more"

                                    <?php if (!$isVideo) : ?>
                                        data-fancybox="demo" data-src="<?= $imageLink ?? '' ?>" data-caption="<?= $preview  ?>"
                                    <? endif; ?>
                                    <?php if ($isVideo) : ?>
                                        href="<?= $link ?>"
                                        target="_blank"
                                    <?php endif; ?>
                                >
                                    <?= $author ?>
                                </<?= $isVideo ? 'a' : 'div'?>
                                >
                            </li>

                    <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
get_footer();
?>