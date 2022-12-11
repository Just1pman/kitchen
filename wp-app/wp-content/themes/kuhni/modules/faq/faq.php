<?php

/*
Title: FAQ модуль
Mode: preview
*/

$textBefore = get_field('text_before');
$mainContent = get_field('topic');
$anchor_prefix = 'q-';
?>


<?php if (!is_admin()) : ?>
    <section class="faq">
        <div class="container">
            <div class="faq__wrapper">
                <div class="faq__left">
                    <div class="faq__links">
                        <?php foreach ($mainContent as $key => $item) : ?>
                            <a class="faq__anchor" href="#<?= $anchor_prefix ?><?= $key ?>"><?= $item['title'] ?></a>
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
