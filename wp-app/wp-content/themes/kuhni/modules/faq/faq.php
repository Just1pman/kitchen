<?php

/*
Title: FAQ модуль
Mode: preview
*/

$textBefore = get_field('text_before');
$mainContent = get_field('topic');
$anchor_prefix = 'q-';
$photo = get_field('photo');
$mainTitle = get_field('main_title');
?>


<?php if (!is_admin()) : ?>
    <section class="faq">
        <?php if(!empty($mainTitle)): ?>
            <div class="container">
                <h2 class="faq__main-title"><?= $mainTitle ?></h2>
            </div>
        <?php endif; ?>
        <?php if(!empty($photo)): ?>

            <div class="faq__image-section">
                <div class="container-s">
                    <picture>
                        <img loading="lazy" src="<?= $photo['url'] ?>" alt="">
                    </picture>
                </div>
            </div>

        <?php endif; ?>



        <div class="container">
            <div class="faq__wrapper">
                <div class="faq__left">
                    <div class="faq__links">
                        <?php foreach ($mainContent as $key => $item) : ?>
                            <?php if(!empty($item['icon'])) : ?>
                            <div class="faq__links-wrapper">
                                <i>
                                    <img class="faq__icon" width="20" height="20" src="<?= $item['icon']['url'] ?>" alt="">
                                </i>
                                <a class="faq__anchor" href="#<?= $anchor_prefix ?><?= $key ?>"><?= $item['title'] ?></a>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="faq__right">
                    <?php if(!empty($textBefore)): ?>
                        <div class="faq__before">
                            <?= $textBefore ?>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($mainContent)): ?>
                        <?php foreach ($mainContent as $key => $item) : ?>
                            <div>
                                <h2 class="faq__title" id="<?= $anchor_prefix ?><?= $key ?>"><?= $item['title'] ?></h2>
                                <?= $item['description'] ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">FAQ модуль</h2>
<?php endif; ?>
