<?php

/*
Title: Отзывы модуль
Mode: preview
*/

$title = get_field('title');

/** @var WP_Post[] $reviews */
$reviews = (new Ajax())->get_reviews();
?>

<?php if (!is_admin()) : ?>
    <section class="reviews">
        <div class="container">
            <div class="reviews__wrapper">
                <div class="reviews__header">
                    <?php if(!empty($title)): ?>
                        <h2 class="reviews__main-title section-title">
                            <?= $title ?>
                        </h2>
                    <?php endif; ?>

                    <div class="reviews__buttons">
                        <button class="button reviews__button" data-type="video">
                            Видеоотзывы
                        </button>
                        <button class="button reviews__button active" data-type="image">
                            Отзывы
                        </button>
                    </div>
                </div>
                <div class="reviews-loader_wrapper">
                    <div class="swiper swiper-reviews">
                    <div class="swiper-wrapper">
                        <?php if (!empty($reviews)) : ?>
                            <?php foreach ($reviews as $key => $review) : ?>
                                <?php
                                    $author = $review->post_title;
                                    $created_at = get_the_date('j F Y', $review);
                                    $text = get_field('text', $review);
                                    $img = get_field('photo', $review);
                                    $link = get_post_permalink($review);
                                ?>
                                <div class="swiper-slide">
                                    <div class="reviews__card">
                                        <div class="reviews__content-wrapper">
                                            <h3 class="reviews__title">
                                                <?= $author ?? '' ?>
                                            </h3>
                                            <span class="reviews__date">
                                                <?= $created_at ?? '' ?>
                                            </span>
                                            <div class="reviews__text">
                                                <?= $text ?? '' ?>
                                            </div>
                                            <a
                                                class="reviews__more"
                                                href="<?= $link ?>">
                                                <?= 'Читать отзыв' ?>
                                            </a>
                                        </div>

                                        <div class="reviews__image-wrapper">
                                            <a class="zoom reviews__zoom" href="javascript:;" data-fancybox="image<?=$key?>" data-src="<?= $img['url'] ?>">
                                                <svg
                                                    class="zoom__icon"
                                                    width="15"
                                                    height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.3069 16.3124L13.6532 12.6587C14.5175 11.6034 15.0378 10.2555 15.0378 8.78765C15.0378 5.41245 12.2919 2.6665 8.91668 2.6665C5.54148 2.6665 2.79553 5.41245 2.79553 8.78765C2.79553 12.1629 5.54148 14.9088 8.91668 14.9088C10.3845 14.9088 11.7324 14.3885 12.7877 13.5242L16.4414 17.1779C16.6807 17.4172 17.0676 17.4172 17.3069 17.1779C17.5463 16.9386 17.5463 16.5517 17.3069 16.3124ZM4.01976 8.78765C4.01976 6.08761 6.21664 3.89073 8.91668 3.89073C11.6167 3.89073 13.8136 6.08761 13.8136 8.78765C13.8136 11.4877 11.6167 13.6846 8.91668 13.6846C6.21664 13.6846 4.01976 11.4877 4.01976 8.78765Z" fill="black"/>
                                                </svg>
                                            </a>
                                            <picture>
                                                <img
                                                    loading="lazy"
                                                    src="<?= $img['url'] ?? '' ?>"
                                                    alt=""
                                                >
                                            </picture>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                    <div class="loader-container" style="display: none">
                        <div class="loader"></div>
                        <div class="loader-bg"></div>
                    </div>
                </div>
            </div>

            <div class="swiper-reviews-pagination swiper-pagination"></div>

            <div class="reviews__swiper-buttons">
                <div class="custom-swiper-button prev reviews__button-prev">
                    <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"/>
                    </svg>
                </div>
                <div class="custom-swiper-button reviews__button-next">
                    <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"/>
                    </svg>
                </div>

            </div>

        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Отзывы модуль</h2>
<?php endif; ?>
