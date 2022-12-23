<?php

use helpers\Helpers;

$text = get_field('text', $article->ID);
    $readingTime = Helpers::get_reading_time($text);
    $image = get_field('photo', $article);
    $readingTime = !empty($readingTime) ? $readingTime : 1;
    $title = get_the_title($article);
    $link = get_post_permalink($article);
    ?>

    <div class="article-card">
        <a href="<?= $link ?>">
            <div class="article-card__overlay">
                <p class="article-card__reading-time">Статья <?= $readingTime ?> минут(ы)</p>
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
        </a>
    </div>