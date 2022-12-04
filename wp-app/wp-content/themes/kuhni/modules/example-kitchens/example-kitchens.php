<?php

/*
Title: Примеры кухонь модуль
Mode: preview
*/

$headline = get_field('headline');
$link = get_field('link');
?>

<?php if (!is_admin()) : ?>
    <section class="example-kitchens">
        <div class="container">
            <div class="example-wrapper-top">
                <h2 class="top-left"> <?= $headline ?? '' ?> </h2>
                <div class="top-right">
                    <button class="button button-active" data-format="new">Новинки</button>
                    <button class="button" data-format="popular">поплярные</button>
                    <button class="button" data-format="discount">скидки</button>
                </div>
            </div>
            <div class="example-wrapper-bottom">
                <div class="example-kitchens-results"></div>
                <div class="loader-container">
                    <div class="loader"></div>
                    <div class="loader-bg"></div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Примеры кухонь модуль</h2>
<?php endif; ?>