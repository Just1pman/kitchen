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
                                    <img loading="lazy" src="<?= $image['url'] ?>" alt="<?= $image['title'] ?>">
                                </picture>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>
                <svg class="hero-arrow" xmlns="http://www.w3.org/2000/svg" width="26" height="179" viewBox="0 0 26 179" fill="none">
                    <path d="M24.3907 13.0918C24.3517 12.8804 24.2238 12.7025 24.0403 12.5912C19.8136 10.0719 17.3331 9.54909 15.5201 9.17091C15.2865 9.12086 15.0585 9.07636 14.8416 9.02631L14.0574 2.58053C14.0296 1.15679 12.8617 0 11.4324 0C10.0198 0 8.87966 1.09005 8.80736 2.49155C8.80736 2.51936 8.8018 2.5416 8.8018 2.56941V6.36235L8.74063 15.6222L7.73956 14.8492C7.5449 14.6824 6.1879 13.5867 4.50833 13.5867C3.37378 13.5867 2.36715 14.065 1.51624 14.9994C1.2771 15.2607 1.25485 15.6501 1.46063 15.9393C1.53293 16.0394 3.25699 18.453 5.95988 20.9112C7.56159 22.3628 9.17442 23.5251 10.7539 24.3649C12.7671 25.4327 14.7359 25.9833 16.6101 26C16.638 26 16.6713 26 16.6991 26C19.2574 26 21.2484 25.1547 22.6166 23.4918C25.6643 19.7878 24.4407 13.3643 24.3907 13.0918ZM21.4542 22.5463C20.3864 23.8477 18.7847 24.504 16.6991 24.504C16.6713 24.504 16.6491 24.504 16.6213 24.504C12.9006 24.4762 9.33014 21.9457 6.99432 19.8267C5.13121 18.136 3.72416 16.4342 3.07902 15.6C3.51838 15.2607 3.99111 15.0939 4.51389 15.0939C5.72073 15.0939 6.76629 15.9893 6.77186 16.0004C6.78298 16.0116 6.79966 16.0227 6.81079 16.0338L9.02982 17.7412C9.25785 17.9136 9.55817 17.947 9.81956 17.819C10.0754 17.6967 10.2367 17.4353 10.2422 17.1517L10.3145 6.37348V2.61947C10.3145 2.6139 10.3145 2.60278 10.3145 2.59722C10.3312 1.98545 10.8262 1.50717 11.438 1.50717C12.0608 1.50717 12.5614 2.01326 12.5614 2.63059C12.5614 2.6584 12.5614 2.69176 12.5669 2.71957L13.4067 9.7215C13.4457 10.0274 13.6626 10.2776 13.9573 10.3555C14.3577 10.4612 14.7693 10.5502 15.2086 10.6391C16.9661 11.0062 19.1462 11.4678 22.9725 13.7035C23.1616 14.9938 23.7011 19.8156 21.4542 22.5463Z" fill="white" fill-opacity="0.56"/>
                    <path d="M12.4697 178.53C12.7626 178.823 13.2374 178.823 13.5303 178.53L18.3033 173.757C18.5962 173.464 18.5962 172.99 18.3033 172.697C18.0104 172.404 17.5355 172.404 17.2426 172.697L13 176.939L8.75737 172.697C8.46447 172.404 7.9896 172.404 7.6967 172.697C7.40381 172.99 7.40381 173.464 7.6967 173.757L12.4697 178.53ZM12.25 41L12.25 178L13.75 178L13.75 41L12.25 41Z" fill="white" fill-opacity="0.6"/>
                </svg>
            </div>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Главный модуль</h2>
<?php endif; ?>