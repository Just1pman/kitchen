<?php

/*
Title: О компании
Mode: preview
*/

$headline = get_field('headline');
$text = get_field('text');
$company_numbers = get_field('company_numbers');
$images = get_field('images');

?>

<?php if (!is_admin()) : ?>
    <section class="about-company">
        <div class="container">
            <div class="about-company-wrapper">
                <div class="about-company-wrapper-top">
                    <div class="about-company-wrapper-top-left">
                        <h1><?= $headline ?? '' ?></h1>
                        <p><?= $text ?? '' ?></p>
                    </div>
                    <div class="about-company-wrapper-top-right">
                        <h2> <?= $company_numbers['headline'] ?> </h2>
                        <?php if (!empty($company_numbers['numbers'])) : ?>
                            <div class="about-company-wrapper-numbers">
                                <?php foreach ($company_numbers['numbers'] as $number) : ?>
                                    <div class="about-company-number">
                                        <h3> <?= $number['headline'] ?> </h3>
                                        <p><?= $number['subheadline'] ?></p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 20 20" fill="none">
                                            <path d="M9.99366 19.2607C15.2369 19.2607 19.4873 15.0102 19.4873 9.76704C19.4873 4.52384 15.2369 0.273376 9.99366 0.273376C4.75046 0.273376 0.5 4.52384 0.5 9.76704C0.5 15.0102 4.75046 19.2607 9.99366 19.2607Z"
                                                  fill="#ED1C24"/>
                                        </svg>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="about-company-wrapper-bottom">
                    <?php if (!empty($images)) : ?>
                        <div class="swiper about-company-swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($images as $image) : ?>
                                    <div class="swiper-slide">
                                        <picture>
                                            <img loading="lazy" src="<?= $image['image']['url'] ?>"
                                                 alt="<?= $image['image']['title'] ?>">
                                        </picture>
                                        <div class="slide-bg"></div>
                                        <div class="slide-backside">
                                            <h4><?= $image['headline'] ?></h4>
                                            <?php if (!empty($image['values'])) : ?>
                                                <div class="slider-numbers">
                                                    <?php foreach ($image['values'] as $value) : ?>
                                                        <p><?= $value['name'] ?></p>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">О компании модуль</h2>
<?php endif; ?>