<?php

/*
Title: О нас модуль
Mode: preview
*/

$description = get_field('description');
$photo = get_field('photo');
$link = get_field('link');
$facts = get_field('records');
$logo = get_field('logo', 'option');

?>


<?php if (!is_admin()) : ?>
    <section class="aboutus">
        <div class="container">
            <div class="aboutus__wrapper">
                <div class="aboutus__left-block">
                    <div class="aboutus__logo-wrapper">
                        <img
                            class="aboutus__logo"
                            src="<?= $logo['url'] ?? '' ?>"
                            alt="<?= $logo['alt'] ?? '' ?>"
                        >
                    </div>
                    <div class="aboutus__description">
                        <?= $description ?? '' ?>
                    </div>

                    <a
                        class="aboutus__button button button--red"
                        href="<?= $link['url'] ?? '' ?>"
                        <?php if ($link['target']) : ?> target="_blank" <?php endif; ?>
                    >
                        <?= $link['title'] ?? '#' ?>
                    </a>

                    <ul class="aboutus__facts-list facts">

                        <?php foreach ($facts as $fact) : ?>
                            <li class="facts__item">
                                <b class="facts__title">
                                    <?= $fact['title'] ?>
                                </b>
                                <span class="facts__subtitle">
                                    <?= $fact['subtitle'] ?>
                                </span>
                            </li>
                        <?php endforeach; ?>

                    </ul>
                </div>
                <div class="aboutus__right-block">
                    <img
                            class="aboutus__photo"
                            loading="lazy"
                            src="<?= $photo['url'] ?? '' ?>"
                            alt="Рабочий"
                    >
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">О нас модуль</h2>
<?php endif; ?>
