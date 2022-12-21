<div class="<?= $classContainer ?>">
    <?php foreach ($kitchens as $kitchen) : ?>
        <?php
        setlocale(LC_MONETARY, 'ru_RU');
        $images = get_field('images', $kitchen->ID);
        $price = get_field('price', $kitchen->ID);
        $discount = get_field('discount', $kitchen->ID);
        $kitchen_size = get_the_terms($kitchen->ID, 'kitchen-size');
        $material = get_the_terms($kitchen->ID, 'kitchen-material');
        $category = get_the_terms($kitchen->ID, 'kitchen-category');
        $link = get_post_permalink($kitchen->ID);
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
                    <p class="kitchen-bottom-title"><?= $kitchen->post_title ?></p>
                    <hr>

                    <div class="kitchen-bottom-attr">
                        <p class="kitchen-bottom-attr-name">Размер кухни:</p>
                        <p class="kitchen-bottom-attr-value"><?= $kitchen_size[0]->name ?? '' ?> м²</p>
                    </div>

                    <div class="kitchen-bottom-attr">
                        <p class="kitchen-bottom-attr-name">Материал:</p>
                        <p class="kitchen-bottom-attr-value"><?= $material[0]->name ?? '' ?></p>
                    </div>

                    <div class="kitchen-bottom-price">
                        <p <?php if ($discount) : ?> class="discount-price" <?php endif; ?>><?= $price ?? '' ?></p>
                        <button class="button">Посмотреть</button>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<?php if ($classContainer === 'catalog-filter-results' && count($kitchens) > 0) : ?>
    <div class="filter-pagination catalog-kitchen-pagination">
        <?php if ($paged - 2 > 0) : ?>
            <div class="page-numbers paged"> 1</div>
        <?php endif; ?>

        <?php if ($paged - 3 <= $max_page && $paged > 3) : ?>
            <div class="page-numbers dots"> ...</div>
        <?php endif; ?>

        <?php if ($paged - 1 <= $max_page && $paged != 1) : ?>
            <div class="page-numbers paged"> <?= $paged - 1 ?> </div>
        <?php endif; ?>

        <div class="page-numbers current"> <?= $paged ?> </div>

        <?php if ($paged + 1 < $max_page) : ?>
            <div class="page-numbers paged"> <?= $paged + 1 ?> </div>
        <?php endif; ?>

        <?php if ($paged + 3 <= $max_page) : ?>
            <div class="page-numbers dots"> ...</div>
        <?php endif; ?>

        <?php if ($paged < $max_page) : ?>
            <div class="page-numbers paged"> <?= $max_page ?> </div>
        <?php endif; ?>
    </div>
<?php endif; ?>