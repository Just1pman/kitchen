<?php if (!empty($reviews)) : ?>
    <?php foreach ($reviews as $review) : ?>

        <?php
            $created_at = get_the_date('j F Y', $review);
            $text = get_field('text', $review->ID);
            $author = get_field('author', $review->ID);
            $photo = get_field('photo', $review->ID);
            $link = '#';

        ?>
        <div class="swiper-slide">
            <div class="reviews__card">
                <div class="reviews__content-wrapper">
                    <?php if (!empty($author)) : ?>
                        <h3 class="reviews__title">
                            <?= $author ?>
                        </h3>
                    <?php endif; ?>

                    <?php if(!empty($created_at)) : ?>
                        <span class="reviews__date">
                            <?= $created_at ?>
                        </span>
                    <?php endif; ?>

                    <?php if(!empty($text)) : ?>
                        <div class="reviews__text">
                            <?= $text ?>
                        </div>
                    <?php endif; ?>

                    <a
                        class="reviews__more"
                        href="<?= $link ?>">
                        Читать отзыв
                    </a>
                </div>
                <?php if (!empty($photo['url'])) : ?>
                    <div class="reviews__image-wrapper">
                        <span class="zoom reviews__zoom">
                                                        <svg
                                                                class="zoom__icon"
                                                                width="15"
                                                                height="15" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M17.3069 16.3124L13.6532 12.6587C14.5175 11.6034 15.0378 10.2555 15.0378 8.78765C15.0378 5.41245 12.2919 2.6665 8.91668 2.6665C5.54148 2.6665 2.79553 5.41245 2.79553 8.78765C2.79553 12.1629 5.54148 14.9088 8.91668 14.9088C10.3845 14.9088 11.7324 14.3885 12.7877 13.5242L16.4414 17.1779C16.6807 17.4172 17.0676 17.4172 17.3069 17.1779C17.5463 16.9386 17.5463 16.5517 17.3069 16.3124ZM4.01976 8.78765C4.01976 6.08761 6.21664 3.89073 8.91668 3.89073C11.6167 3.89073 13.8136 6.08761 13.8136 8.78765C13.8136 11.4877 11.6167 13.6846 8.91668 13.6846C6.21664 13.6846 4.01976 11.4877 4.01976 8.78765Z" fill="black"/>
                                                        </svg>
                                                    </span>

                        <img
                            loading="lazy"
                            src="<?= $photo['url'] ?>"
                            alt=""
                        >
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>