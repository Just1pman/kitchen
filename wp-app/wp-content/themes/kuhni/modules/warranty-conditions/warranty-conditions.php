<?php

/*
Title: Гарантия и условия модуль
Mode: preview
*/

$image = get_field('image');
$blocks = get_field('blocks');
?>

<?php if (!is_admin()) : ?>
    <section class="warranty-conditions">
        <div class="container">
            <div class="warranty-conditions-wrapper">
                <div class="wrapper-left">
                    <?php if (!empty($blocks)) : ?>
                        <?php foreach ($blocks as $block) : ?>
                            <div class="wrapper-left-item">
                                <div class="wrapper-left-item-icon">
                                    <picture>
                                        <img loading="lazy" src="<?= $block['icon']['url'] ?>"
                                             alt="<?= $block['icon']['title'] ?>">
                                    </picture>
                                </div>
                                <h2><?= $block['headline'] ?? '' ?></h2>
                                <p><?= $block['subheadline'] ?? '' ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="wrapper-right">
                    <?php if (!empty($image)) : ?>
                        <picture>
                            <img loading="lazy" src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                        </picture>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Гарантия и условия модуль</h2>
<?php endif; ?>