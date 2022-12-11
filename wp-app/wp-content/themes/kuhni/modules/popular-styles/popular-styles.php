<?php

/*
Title: Популярные стили
Mode: preview
*/

$headline = get_field('headline');
$terms = get_field('select_styles');

?>

<?php if (!is_admin()) : ?>
    <section class="kitchen-style">
        <div class="container">
            <div class="kitchen-style-headline">
                <h2><?= $headline ?? '' ?></h2>
            </div>
            <?php if (!empty($terms)) : ?>
                <div class="kitchen-style-tabs">
                    <?php foreach ($terms as $key => $term) : ?>
                        <?php
                        if ($key === 0) {
                            $ajax = new Ajax();
                            $gallery = $ajax->get_popular_styles($term->term_id);
                        }
                        ?>
                        <?php if ($key < 4) : ?>
                            <div data-term-id="<?= $term->term_id ?>"
                                 class="kitchen-style-tab <?php if ($key === 0) : ?> js-active-tab <?php endif; ?>">
                                <?= $term->name ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="kitchen-style-wrapper">
                    <div class="kitchen-style-results">
                        <?php include get_template_directory() . '/ajax-blocks/' . 'popular-styles-ajax.php' ?>
                    </div>
                    <div class="loader-container" style="display: none">
                        <div class="loader"></div>
                        <div class="loader-bg"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Популярные стили модуль </h2>
<?php endif; ?>