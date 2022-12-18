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
        <div class="kitchen__preview">
            <div class="kitchen__preview-left">
1
            </div>
            <div class="kitchen__preview-right">
                <div class="characteristics-block">
                    <div class="characteristics-block__wrapper">
                        <h3 class="characteristics-title">Характеристики кухни</h3>

                        <ul class="characteristics-list">
                            <li class="characteristics-item">
                                <span class="characteristics-key">Стиль</span>
                                <span class="characteristics-value">Современный</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Планировка</span>
                                <span class="characteristics-value">2,5 метра</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Материал корпуса</span>
                                <span class="characteristics-value">Без острова</span>
                            </li>
                        </ul>
                        <a href="#all-chars" class="characteristics-list__all-btn">Все характеристики</a>
                    </div>
                </div>
                    <div class="kitchen__price-block">
                        <b class="kitchen__price-title">Стоимость</b>
                        <p class="kitchen__price">
                            <?php if(!empty($price)) : ?>
                                от <?= $price ?>
                                <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.856 0H2.55435V10.7283H0V13.1123H2.55435V15.4964H0V17.8804H2.55435V21.4565H5.1087V17.8804H10.2174V15.4964H5.1087V13.1123H10.856C14.7386 13.1123 17.8804 10.1799 17.8804 6.55616C17.8804 2.93239 14.7386 0 10.856 0ZM10.856 10.7283H5.1087V2.38406H10.856C13.3209 2.38406 15.3261 4.25554 15.3261 6.55616C15.3261 8.85678 13.3209 10.7283 10.856 10.7283Z" fill="#303030"/>
                                </svg>
                            <?php endif; ?>
                        </p>
                        <?php if(!empty($subPrice)): ?>
                            <p class="kitchen__price-subtitle"><?= $subPrice ?></p>
                        <?php endif; ?>
                        <p class="kitchen__price-availability"><?= $inStock ? 'В наличии' : 'Под заказ:' ?> <?php if (!$inStock) :?><span><?= $delay ?></span> <?php endif; ?></p>
                    </div>
                </div>

                <div class="characteristics-block__info-wrapper">
                    <div class="characteristics-block__button-group">
                        <button class="characteristics-block__info-order">Оформить заказ</button>
                        <button class="characteristics-block__info-share">share</button>
                    </div>
                    <ul>
                        <li><img src="" alt="icon"><div><b>Доставка</b><span>В течение 1-2 дней, от 300</span></div></li>
                        <li><img src="" alt="icon"><div><b>Самовывоз</b><span>По готовности до 18:00, бесплатно</span></div></li>
                    </ul>
                </div>
            </div>
        </div>

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

            <div class="info-module__tab-content tab-1 active">
                <div class="info-module__description-wrapper">
                    <div class="info-module__description-block">
                        <?php if(!empty($description)) : ?>
                            <?= $description ?>
                        <?php endif; ?>
                    </div>

                    <div class="characteristics-block">
                        <h3 class="characteristics-title">Характеристики</h3>

                        <ul class="characteristics-list">
                            <li class="characteristics-item">
                                <span class="characteristics-key">Стиль</span>
                                <span class="characteristics-value">Современный</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Планировка</span>
                                <span class="characteristics-value">2,5 метра</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Материал корпуса</span>
                                <span class="characteristics-value">Без острова</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Материал фасада:</span>
                                <span class="characteristics-value">ЛДСП</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Столешница цвет:</span>
                                <span class="characteristics-value">Светлая</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Покрытие фасада:</span>
                                <span class="characteristics-value">Матовое</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Материал корпуса:</span>
                                <span class="characteristics-value">ЛДСП</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Декор корпуса:</span>
                                <span class="characteristics-value">«Гейнсборо» и «Дуб Винченца»</span>
                            </li>
                            <li class="characteristics-item">
                                <span class="characteristics-key">Материал фасадов:</span>
                                <span class="characteristics-value">МДФ в плёнке</span>
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