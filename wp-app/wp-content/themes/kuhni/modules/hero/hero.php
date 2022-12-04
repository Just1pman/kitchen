<?php

/*
Title: Главный модуль
Mode: preview
*/

$gallery = get_field('gallery');
?>


<?php if (!is_admin()) : ?>
    <section class="hero">
        <div class="container-s">
            <div class="swiper swiper-hero">
                <div class="swiper-wrapper">
                    <?php if (!empty($gallery)) : ?>
                        <?php foreach ($gallery as $image) : ?>
                        <?php
                            ?>
                            <div class="swiper-slide">
                                <picture>
                                    <img src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                                </picture>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>
                <svg class="hero-arrow" xmlns="http://www.w3.org/2000/svg" width="12" height="138" viewBox="0 0 12 138" fill="none">
                    <path d="M5.46968 137.53C5.76257 137.823 6.23744 137.823 6.53034 137.53L11.3033 132.757C11.5962 132.464 11.5962 131.99 11.3033 131.697C11.0104 131.404 10.5355 131.404 10.2426 131.697L6.00001 135.939L1.75737 131.697C1.46447 131.404 0.989598 131.404 0.696705 131.697C0.403812 131.99 0.403812 132.464 0.696705 132.757L5.46968 137.53ZM5.25 3.27835e-08L5.25001 137L6.75001 137L6.75 -3.27835e-08L5.25 3.27835e-08Z" fill="white" fill-opacity="0.6"/>
                </svg>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Главный модуль</h2>
<?php endif; ?>