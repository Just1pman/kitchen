<?php if (!empty($kitchens)) : ?>
    <?php foreach ($kitchens as $kitchen) : ?>
        <?php
        $image = get_field('image', $kitchen->ID);
        $price = get_field('price', $kitchen->ID);
        $material = get_field('material', $kitchen->ID);
        $kitchen_size = get_field('kitchen_size', $kitchen->ID);
        $category = get_the_terms($kitchen->ID, 'kitchen-category');
        $link = get_post_permalink($kitchen->ID);
        ?>

        <div class="kitchen-card">
            <a href="<?= $link ?>" class="kitchen-link">
                <div class="kitchen-top">
                    <?php if (!empty($image)) : ?>
                        <picture>
                            <img loading="lazy" src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                        </picture>
                    <?php endif; ?>
                </div>
                <div class="kitchen-bottom">
                    <p class="kitchen-bottom-category"><?= $category[0]->name ?? '' ?></p>
                    <p class="kitchen-bottom-title"><?= $kitchen->post_title ?></p>
                    <hr>

                    <div class="kitchen-bottom-attr">
                        <p class="kitchen-bottom-attr-name">Размер кухни:</p>
                        <p class="kitchen-bottom-attr-value"><?= $kitchen_size ?? '' ?></p>
                    </div>

                    <div class="kitchen-bottom-attr">
                        <p class="kitchen-bottom-attr-name">Материал:</p>
                        <p class="kitchen-bottom-attr-value"><?= $material ?? '' ?></p>
                    </div>

                    <div class="kitchen-bottom-price">
                        <p><?= $price ?? '' ?> &#8381; </p>
                        <button class="button">Посмотреть</button>
                    </div>
                </div>
            </a>
        </div>

    <?php endforeach; ?>
<?php endif; ?>