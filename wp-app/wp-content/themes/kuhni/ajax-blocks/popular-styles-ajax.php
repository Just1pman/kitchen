<?php if (!empty($gallery)) : ?>
    <div class="swiper swiper-style">
        <div class="swiper-wrapper">
            <?php foreach ($gallery as $image) : ?>
                <div class="swiper-slide">
                    <picture>
                        <img loading="lazy" src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                    </picture>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
<?php endif; ?>