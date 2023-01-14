<?php foreach (($entities ?? []) as $entity) : ?>
        <?php
        setlocale(LC_MONETARY, 'ru_RU');
        $images = get_field('images', $entity->ID);
        $price = get_field('price', $entity->ID);
        $discount = get_field('discount', $entity->ID);
        $entity_size = get_the_terms($entity->ID, 'kitchen-size');
        $material = get_the_terms($entity->ID, 'kitchen-material');
        $category = get_the_terms($entity->ID, 'kitchen-category');
        $brand = get_the_terms($entity->ID, 'technics-brand');
        $country = get_the_terms($entity->ID, 'technics-country');

        if (empty($brand)) {
            $brand = get_the_terms($entity->ID, 'accessories-brand');
        }

        if (empty($country)) {
            $country = get_the_terms($entity->ID, 'accessories-country');
        }
        $link = get_post_permalink($entity->ID);
        ?>

        <div class="swiper-slide kitchen-card">
            <a href="<?= $link ?>" class="kitchen-link">
                <div class="kitchen-top">
                    <?php if (!empty($images[0])) : ?>
                        <picture>
                            <img loading="lazy" src="<?= $images[0]['url'] ?>" alt="<?= $images[0]['title'] ?>">
                        </picture>
                    <?php endif; ?>
                </div>
                <div class="kitchen-bottom">
                    <p class="kitchen-bottom-category"><?= $category[0]->name ?? '' ?></p>
                    <p class="kitchen-bottom-title"><?= $entity->post_title ?></p>
                    <hr>

                    <?php if (!empty($entity_size)) : ?>
                        <div class="kitchen-bottom-attr">
                            <p class="kitchen-bottom-attr-name">Размер кухни:</p>
                            <p class="kitchen-bottom-attr-value"><?= $entity_size[0]->name ?? '' ?> м²</p>
                        </div>
                    <? endif; ?>

                    <?php if (!empty($brand)) : ?>
                        <div class="kitchen-bottom-attr">
                            <p class="kitchen-bottom-attr-name">Бренд:</p>
                            <p class="kitchen-bottom-attr-value"><?= $brand[0]->name ?? '' ?></p>
                        </div>
                    <? endif; ?>

                    <?php if (!empty($country)) : ?>
                        <div class="kitchen-bottom-attr">
                            <p class="kitchen-bottom-attr-name">Страна:</p>
                            <p class="kitchen-bottom-attr-value"><?= $country[0]->name ?? '' ?></p>
                        </div>
                    <? endif; ?>

                    <?php if (!empty($material)) : ?>
                        <div class="kitchen-bottom-attr">
                            <p class="kitchen-bottom-attr-name">Материал:</p>
                            <p class="kitchen-bottom-attr-value"><?= $material[0]->name ?? '' ?></p>
                        </div>
                    <? endif; ?>


                    <div class="kitchen-bottom-price">
                        <?php if(!empty($price)) : ?>
                            <p <?php if ($discount) : ?> class="discount-price" <?php endif; ?>>
                                    <?= $price ?? '' ?>
                            </p>
                        <?php else : ?>
                            <span></span>
                        <?php endif; ?>

                        <button class="button">Посмотреть</button>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
