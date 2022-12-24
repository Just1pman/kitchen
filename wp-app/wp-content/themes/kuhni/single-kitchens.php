<?php

$title = $post->post_title ?? null;
$description = get_field('description');
$gallery = get_field('images');
$materials = get_the_terms($post, 'kitchen-material');
$price = get_field('price');
$subPrice = get_field('sub_price');

$delivery = get_field('delivery');
$pickup = get_field('pickup');
$delay = get_field('delay');
$inStock = get_field('instock');

if (!empty($materials)) {
    $materials = array_map(function (WP_Term $WP_Term) {
        return $WP_Term->name;
    }, $materials);

    $materials = implode(', ', $materials);
}

$kitchenInfo = [
  'Стиль' => get_field('style'),
  'Планировка' => get_field('layout'),
  'Материал корпуса' => $materials ?? '',
  'Материал фасада' => get_field('material_facade'),
  'Столешница цвет' => get_field('color_table'),
  'Покрытие фасада' => get_field('facade_cover'),
  'Декор корпуса' => get_field('decor'),
  'Материал фасадов' => get_field('material_facade'),
];

$shortInfo = array_slice($kitchenInfo, 0, 3);

get_header();
?>
<section class="kitchen-single">
    <div class="container">
        <?php include get_template_directory() . '/modules/breadcrumb/breadcrumb.php' ?>
        <?php if (!empty($title)) : ?>
            <h1 class="kitchen-single__title">
                <?= $title ?>
            </h1>
        <?php endif; ?>
        <div class="kitchen__preview">
            <div class="kitchen__preview-left">
                <div class="kitchen-slider__thumb-wrapper">
                    <div class="custom-swiper-button prev kitchen-thumb__button-prev">
                        <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"/>
                        </svg>
                    </div>
                    <div thumbsSlider="" class="swiper kitchen-slider__thumb">
                    <div class="swiper-wrapper">
                        <?php if(!empty($gallery)) : ?>
                            <?php foreach ($gallery as $item) : ?>
                                <div class="swiper-slide">
                                    <picture>
                                        <img loading="lazy" src="<?= $item['url'] ?>" alt="<?= $item['alt'] ?>" />
                                    </picture>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                    <div class="custom-swiper-button kitchen-thumb__button-next">
                        <svg width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.939016 4.07456H16.6504L14.0478 1.48451C13.7574 1.19548 13.7562 0.725759 14.0453 0.435351C14.3343 0.144906 14.8041 0.143831 15.0945 0.432829L18.9709 4.29059C18.9712 4.29081 18.9714 4.29107 18.9716 4.2913C19.2613 4.58033 19.2622 5.05157 18.9717 5.34157C18.9714 5.34179 18.9712 5.34205 18.971 5.34228L15.0946 9.20004C14.8042 9.489 14.3344 9.488 14.0454 9.19752C13.7563 8.90711 13.7574 8.43739 14.0478 8.14835L16.6504 5.55831H0.939016C0.529278 5.55831 0.19714 5.22617 0.19714 4.81643C0.19714 4.40669 0.529278 4.07456 0.939016 4.07456Z" fill="white"/>
                        </svg>
                    </div>
                </div>

                <div
                    class="swiper kitchen-slider__preview"
                >
                    <div class="swiper-wrapper">
                        <?php if(!empty($gallery)) : ?>
                            <?php foreach ($gallery as $item) : ?>
                                <div class="swiper-slide">
                                    <a class="slider-loop" href="javascript:;" data-fancybox="slider" data-src="<?= $item['url'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="36" viewBox="0 0 38 36" fill="none">
                                            <path d="M19.3038 36C29.5362 36 37.8312 27.9411 37.8312 18C37.8312 8.05888 29.5362 0 19.3038 0C9.07136 0 0.776367 8.05888 0.776367 18C0.776367 27.9411 9.07136 36 19.3038 36Z" fill="white"/>
                                            <path d="M25.7012 23.9476L22.4647 20.7111C23.2303 19.7763 23.6912 18.5823 23.6912 17.282C23.6912 14.2922 21.2588 11.8598 18.2689 11.8598C15.2791 11.8598 12.8467 14.2922 12.8467 17.282C12.8467 20.2719 15.2791 22.7043 18.2689 22.7043C19.5692 22.7043 20.7632 22.2434 21.698 21.4778L24.9345 24.7143C25.1465 24.9263 25.4892 24.9263 25.7012 24.7143C25.9132 24.5023 25.9132 24.1596 25.7012 23.9476ZM13.9311 17.282C13.9311 14.8903 15.8772 12.9442 18.2689 12.9442C20.6607 12.9442 22.6067 14.8903 22.6067 17.282C22.6067 19.6738 20.6607 21.6198 18.2689 21.6198C15.8772 21.6198 13.9311 19.6738 13.9311 17.282Z" fill="#303030"/>
                                        </svg>
                                    </a>
                                    <picture>
                                        <img loading="lazy" src="<?= $item['url'] ?>" alt="<?= $item['alt'] ?>" />
                                    </picture>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <div class="kitchen__preview-right">

                <div class="kitchen__parameters-wrapper">
                    <div class="characteristics-block">
                    <div class="characteristics-block__wrapper">
                        <h3 class="characteristics-title">Характеристики кухни</h3>

                        <ul class="characteristics-list">
                            <?php foreach($shortInfo as $key => $item) : ?>
                                <li class="characteristics-item">
                                    <span class="characteristics-key"><?= $key ?></span>
                                    <span class="characteristics-value"><?= $item ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="#all-chars" class="characteristics-list__all-btn">Все характеристики</a>
                    </div>
                </div>
                    <div class="kitchen__price-block">
                        <b class="kitchen__price-title">Стоимость</b>
                        <p class="kitchen__price">
                            <?= !empty($price) ? 'от ' . number_format($price, 0, '', ' ') : '' ?>
                            <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.856 0H2.55435V10.7283H0V13.1123H2.55435V15.4964H0V17.8804H2.55435V21.4565H5.1087V17.8804H10.2174V15.4964H5.1087V13.1123H10.856C14.7386 13.1123 17.8804 10.1799 17.8804 6.55616C17.8804 2.93239 14.7386 0 10.856 0ZM10.856 10.7283H5.1087V2.38406H10.856C13.3209 2.38406 15.3261 4.25554 15.3261 6.55616C15.3261 8.85678 13.3209 10.7283 10.856 10.7283Z" fill="#303030"/>
                            </svg>
                        </p>
                        <?php if(!empty($subPrice)): ?>
                            <p class="kitchen__price-subtitle"><?= $subPrice ?></p>
                        <?php endif; ?>
                        <p class="kitchen__price-availability"><?= $inStock ? 'В наличии' : 'Под заказ:' ?> <?php if (!$inStock) :?><span><?= $delay ?></span> <?php endif; ?></p>
                    </div>
                </div>

                <div class="characteristics-block__info-wrapper">
                    <div class="characteristics-block__button-group">
                        <a href="javascript:;" data-fancybox="" data-src="#checkout" class="characteristics-block__info-order button button--red">Оформить заказ</a>
                        <div class="kitchen-share-wrapper">
                            <button class="characteristics-block__info-share">
                                <svg width="37" height="38" viewBox="0 0 37 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="0.447011" y="1.34935" width="35.7907" height="35.7907" rx="17.8953" stroke="#9F9F9F" stroke-width="0.894022"/>
                                    <path d="M21.8692 22.123C21.3331 22.123 20.8534 22.3347 20.4865 22.6662L15.4565 19.7385C15.4917 19.5763 15.52 19.414 15.52 19.2447C15.52 19.0754 15.4917 18.9131 15.4565 18.7509L20.4301 15.8514C20.811 16.2041 21.3119 16.4228 21.8692 16.4228C23.0403 16.4228 23.9857 15.4775 23.9857 14.3064C23.9857 13.1353 23.0403 12.1899 21.8692 12.1899C20.6981 12.1899 19.7528 13.1353 19.7528 14.3064C19.7528 14.4757 19.781 14.6379 19.8163 14.8002L14.8427 17.6997C14.4617 17.347 13.9609 17.1283 13.4035 17.1283C12.2324 17.1283 11.2871 18.0736 11.2871 19.2447C11.2871 20.4158 12.2324 21.3611 13.4035 21.3611C13.9609 21.3611 14.4617 21.1424 14.8427 20.7897L19.8657 23.7245C19.8304 23.8726 19.8092 24.0278 19.8092 24.183C19.8092 25.3188 20.7334 26.243 21.8692 26.243C23.005 26.243 23.9292 25.3188 23.9292 24.183C23.9292 23.0472 23.005 22.123 21.8692 22.123ZM21.8692 13.6009C22.2572 13.6009 22.5747 13.9184 22.5747 14.3064C22.5747 14.6944 22.2572 15.0118 21.8692 15.0118C21.4812 15.0118 21.1638 14.6944 21.1638 14.3064C21.1638 13.9184 21.4812 13.6009 21.8692 13.6009ZM13.4035 19.9502C13.0155 19.9502 12.6981 19.6327 12.6981 19.2447C12.6981 18.8567 13.0155 18.5392 13.4035 18.5392C13.7915 18.5392 14.109 18.8567 14.109 19.2447C14.109 19.6327 13.7915 19.9502 13.4035 19.9502ZM21.8692 24.9026C21.4812 24.9026 21.1638 24.5851 21.1638 24.1971C21.1638 23.8091 21.4812 23.4916 21.8692 23.4916C22.2572 23.4916 22.5747 23.8091 22.5747 24.1971C22.5747 24.5851 22.2572 24.9026 21.8692 24.9026Z" fill="#9F9F9F"/>
                                </svg>
                            </button>
                            <div class="share-buttons hidden">
                                <div class="ya-share2" data-curtain data-size="l" data-shape="round" data-limit="3" data-services="vkontakte,telegram"></div>
                            </div>
                        </div>
                    </div>
                    <ul class="delivery-list">
                        <?php if (!empty($delivery)) : ?>
                            <li class="delivery-item">
                                <svg class="delivery-icon" width="17" height="12" viewBox="0 0 17 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.0181 4.93241H15.6327L15.0082 2.32006C14.9205 1.94134 14.5883 1.67694 14.199 1.67694H11.66V1.17866C11.66 0.537546 11.1385 0.0159912 10.4973 0.0159912H1.16267C0.521555 0.015958 0 0.537513 0 1.17863V8.91875C0 9.55953 0.521555 10.0814 1.16267 10.0814H2.11441C2.3363 10.9402 3.11764 11.5763 4.04444 11.5763C4.97127 11.5763 5.75257 10.9402 5.97447 10.0814H11.2912C11.5131 10.9402 12.2945 11.5763 13.2213 11.5763C14.1481 11.5763 14.9294 10.9402 15.1513 10.0814H15.8373C16.4784 10.0814 16.9999 9.55986 16.9999 8.91875V5.91439C17 5.37292 16.5595 4.93241 16.0181 4.93241ZM14.0677 2.6735L14.6079 4.93241H11.66V2.6735H14.0677ZM0.996592 8.91875V7.46109H2.05547C2.33066 7.46109 2.55375 7.238 2.55375 6.96282C2.55375 6.68763 2.33066 6.46454 2.05547 6.46454H0.996592V1.17863C0.996592 1.08696 1.071 1.01255 1.16267 1.01255H10.4973C10.589 1.01255 10.6634 1.08696 10.6634 1.17863V9.08483H5.9745C5.75261 8.2261 4.97127 7.58996 4.04447 7.58996C3.11764 7.58996 2.33634 8.2261 2.11444 9.08483H1.16267C1.071 9.08483 0.996592 9.01009 0.996592 8.91875ZM4.04444 10.5797C3.49489 10.5797 3.04785 10.1321 3.04785 9.58311C3.04785 8.56702 4.39878 8.20717 4.90712 9.08483C5.08473 9.3896 5.08672 9.77203 4.90712 10.0814C4.73443 10.3791 4.41253 10.5797 4.04444 10.5797ZM13.2213 10.5797C12.4543 10.5797 11.9759 9.74401 12.3586 9.08483C12.8689 8.20385 14.2178 8.56952 14.2178 9.58311C14.2179 10.1299 13.7727 10.5797 13.2213 10.5797ZM16.0034 8.91875C16.0034 9.01042 15.929 9.08483 15.8373 9.08483H15.1514C14.9295 8.2261 14.1481 7.58996 13.2213 7.58996C12.5898 7.58996 12.0257 7.88526 11.66 8.34536V5.92897H16.0034V8.91875H16.0034Z" fill="black"/>
                                    <path d="M4.79845 6.42091C4.98412 6.63318 5.30885 6.64922 5.51451 6.45621L7.74021 4.36737C7.94086 4.17904 7.95089 3.86371 7.76256 3.66303C7.57426 3.46238 7.25893 3.45235 7.05822 3.64068L5.20881 5.37634L4.63506 4.72038C4.45387 4.51323 4.13907 4.49221 3.93195 4.67337C3.72483 4.85456 3.70378 5.16935 3.88493 5.37648L4.79845 6.42091Z" fill="#ED1C24"/>
                                </svg>
                                <div><b>Доставка</b><span><?= $delivery ?></span>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty($pickup)) : ?>
                            <li class="delivery-item">
                                <svg class="delivery-icon" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.935 1.29896C13.7725 0.819583 13.3175 0.478333 12.7812 0.478333H3.84375C3.3075 0.478333 2.86062 0.819583 2.69 1.29896L1 6.16583V12.6658C1 13.1127 1.36562 13.4783 1.8125 13.4783H2.625C3.07188 13.4783 3.4375 13.1127 3.4375 12.6658V11.8533H13.1875V12.6658C13.1875 13.1127 13.5531 13.4783 14 13.4783H14.8125C15.2594 13.4783 15.625 13.1127 15.625 12.6658V6.16583L13.935 1.29896ZM4.12812 2.10333H12.4887L13.3662 4.63021H3.25062L4.12812 2.10333ZM14 10.2283H2.625V6.16583H14V10.2283Z" fill="black" stroke="white" stroke-width="0.4"/>
                                    <path d="M4.65625 9.41583C5.32935 9.41583 5.875 8.87018 5.875 8.19708C5.875 7.52399 5.32935 6.97833 4.65625 6.97833C3.98315 6.97833 3.4375 7.52399 3.4375 8.19708C3.4375 8.87018 3.98315 9.41583 4.65625 9.41583Z" fill="#ED1C24"/>
                                    <path d="M11.9688 9.41583C12.6418 9.41583 13.1875 8.87018 13.1875 8.19708C13.1875 7.52399 12.6418 6.97833 11.9688 6.97833C11.2957 6.97833 10.75 7.52399 10.75 8.19708C10.75 8.87018 11.2957 9.41583 11.9688 9.41583Z" fill="#ED1C24"/>
                                </svg>
                                <b>Самовывоз</b><span><?= $pickup ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="kitchen-single__info-module info-module">
            <div class="swiper swiper-single-kitchen">
                <div class="swiper-wrapper info-module__tabs">

                    <div class="swiper-slide ">
                        <div id="all-chars" class="info-module__tab active" data-tab="tab-1">
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
                            <?php foreach($kitchenInfo as $key => $item) : ?>
                                <li class="characteristics-item">
                                    <span class="characteristics-key"><?= $key ?></span>
                                    <span class="characteristics-value"><?= $item ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>


                    </div>
                </div>
            </div>
            <div class="info-module__tab-content tab-2">Аксессуары</div>
            <div class="info-module__tab-content tab-3">Гарантия</div>
            <div class="info-module__tab-content tab-4">Отзывы</div>
        </div>
        <?php
        $headline = 'Смотрите такжже';
        ?>
        <?php include get_template_directory() . '/modules/example-kitchens/example-kitchens.php' ?>
    </div>
</section>




<?php
get_footer();
?>