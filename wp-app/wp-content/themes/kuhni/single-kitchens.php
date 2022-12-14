<?php
//$workingMode = get_field('workingMode', 'option');
//$phones = get_field('phones', 'option');
//$emailInfo = get_field('emailInfo', 'option');
$title = $post->post_title ?? null;
$description = get_field('description');
//var_dump();
//die();
get_header();
?>
<section class="kitchen-single">

    <div class="container">
        <ul class="kitchen-single__breadcrumbs-list">
            <li class="kitchen-single__breadcrumbs-item">
                Главная
            </li>
            <li class="kitchen-single__breadcrumbs-item">
                Каталог
            </li>
        </ul>
        <?php if (!empty($title)) : ?>
            <h1 class="kitchen-single__title">
                <?= $title ?>
            </h1>
        <?php endif; ?>

        <div class="kitchen-single__info-module info-module">
            <div class="swiper swiper-single-kitchen">
                <div class="swiper-wrapper info-module__tabs">

                    <div class="swiper-slide ">
                        <div class="info-module__tab active" data-tab="tab-1">
                            Описание и характеристики
                        </div>
                    </div>

                    <div class="swiper-slide ">
                        <div class="info-module__tab" data-tab="tab-2">
                            Аксессуары
                        </div>
                    </div>

                    <div class="swiper-slide ">
                        <div class="info-module__tab" data-tab="tab-3">
                            Гарантия
                        </div>
                    </div>

                    <div class="swiper-slide ">
                        <div class="info-module__tab" data-tab="tab-4">
                            Отзывы
                        </div>
                    </div>

                </div>
            </div>







<!--            ////////////////////-->

            <div class="info-module__tab-content tab-1 active">
                <div class="info-module__description-wrapper">
                    <div class="info-module__description-block">
                        <?php if(!empty($description)) : ?>
                            <?= $description ?>
                        <?php endif; ?>
                    </div>

                    <div class="info-module__characteristics-block">
                        <h3 class="info-module__characteristics-title">Характеристики</h3>

                        <ul class="info-module__characteristics-list">
                            <li class="info-module__characteristics-item">
                                <span class="info-module__characteristics-key">Стиль</span>
                                <span class="info-module__characteristics-value">Современный</span>
                            </li>
                            <li class="info-module__characteristics-item">
                                <span class="info-module__characteristics-key">Планировка</span>
                                <span class="info-module__characteristics-value">2,5 метра</span>
                            </li>
                            <li class="info-module__characteristics-item">
                                <span class="info-module__characteristics-key">Материал корпуса</span>
                                <span class="info-module__characteristics-value">Без острова</span>
                            </li>
                            <li class="info-module__characteristics-item">
                                <span class="info-module__characteristics-key">Материал фасада:</span>
                                <span class="info-module__characteristics-value">ЛДСП</span>
                            </li>
                            <li class="info-module__characteristics-item">
                                <span class="info-module__characteristics-key">Столешница цвет:</span>
                                <span class="info-module__characteristics-value">Светлая</span>
                            </li>
                            <li class="info-module__characteristics-item">
                                <span class="info-module__characteristics-key">Покрытие фасада:</span>
                                <span class="info-module__characteristics-value">Матовое</span>
                            </li>
                            <li class="info-module__characteristics-item">
                                <span class="info-module__characteristics-key">Материал корпуса:</span>
                                <span class="info-module__characteristics-value">ЛДСП</span>
                            </li>
                            <li class="info-module__characteristics-item">
                                <span class="info-module__characteristics-key">Декор корпуса:</span>
                                <span class="info-module__characteristics-value">«Гейнсборо» и «Дуб Винченца»</span>
                            </li>
                            <li class="info-module__characteristics-item">
                                <span class="info-module__characteristics-key">Материал фасадов:</span>
                                <span class="info-module__characteristics-value">МДФ в плёнке</span>
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
            <div class="info-module__tab-content tab-2">Аксессуары</div>
            <div class="info-module__tab-content tab-3">Гарантия</div>
            <div class="info-module__tab-content tab-4">Отзывы</div>
        </div>
    </div>
</section>




<?php
get_footer();
?>