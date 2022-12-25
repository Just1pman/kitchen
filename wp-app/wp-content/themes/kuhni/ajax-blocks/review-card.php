<?php use helpers\Helpers;

if (!empty($reviews)) : ?>
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
                        <?= $isVideo ? 'Смотреть' : 'Читать' ?> отзыв
                    </<?= $isVideo ? 'a' : 'div'?>
                    >
                </div>

                <div class="reviews__image-wrapper">
                    <a class="zoom reviews__zoom" href="javascript:" data-fancybox="demo" data-src="<?= $imageLink ?? '' ?>" data-caption="<?= $preview  ?>">
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
                                src="<?= $imageLink ?? '' ?>"
                                alt=""
                        >
                    </picture>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>