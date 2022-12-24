<?php

/*
Title: Примеры кухонь модуль
Mode: preview
*/

$headline = $headline ?? get_field('headline');
$button = get_field('link');
$filter_on = get_field('filter_on');
$ajax = new Ajax();
$kitchens = $ajax->get_example_kitchens('new');
?>

<?php if (!is_admin()) : ?>
    <section class="example-kitchens">
        <div class="container">
            <div class="example-wrapper-top">
                <h2 class="top-left section-title"> <?= $headline ?? '' ?> </h2>
                <?php if ($filter_on) : ?>
                    <div class="top-right">
                        <button class="button button-active" data-format="new">Новинки</button>
                        <button class="button" data-format="popular">поплярные</button>
                        <button class="button" data-format="discount">скидки</button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="example-wrapper-bottom">
                <div class="example-kitchens-results">
                    <?php include get_template_directory() . '/ajax-blocks/' . 'example-kitchens-ajax.php' ?>
                </div>
                <div class="loader-container" style="display: none">
                    <div class="loader"></div>
                    <div class="loader-bg"></div>
                </div>
            </div>
            <?php if (!empty($button['url'])) : ?>
                <a href="<?= $button['url'] ?>" class="example-kitchens-link all-entities-link"
                    <?php if ($button['target']) : ?> target="_blank" <?php endif; ?>
                >
                    <?= $button['title'] ?? '' ?>
                    <svg class="circle" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                         fill="none">
                        <circle cx="5" cy="5" r="5" fill="#ED1C24"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Примеры кухонь модуль</h2>
<?php endif; ?>