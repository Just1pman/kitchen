</main>
<?php
$logo = get_field('logo', 'option');
$socials = get_field('socials', 'option');
$phones = get_field('phones', 'option');
$emailInfo = get_field('emailInfo', 'option');
$addressInfos = get_field('addressInfo', 'option');
$workingMode = get_field('workingMode', 'option');
$back_call_form = get_field('back_call', 'option');
$checkout_form = get_field('checkout', 'option');
$pick_up = get_field('pick_up', 'option');

$quiz = get_field('quiz', 'option');

$step_1_items = $quiz['step_1'] ?? '';
$step_3_items = $quiz['step_3'] ?? '';
$step_4_items = $quiz['step_4'] ?? '';
$step_5_items = $quiz['step_5'] ?? '';

?>

<footer id="footer" class="footer">
    <div class="modal-form form-back-call" id="back-call">
        <div class="form-wrapper">
            <p class="form-headline">Обратный звонок</p>
            <p class="form-subheadline">Заполните простую форму и мы с вами свяжемся в ближайшее время для уточнения
                информации.</p>
            <?= $back_call_form ?>
        </div>
    </div>
    <div class="modal-form form-checkout" id="checkout">
        <div class="form-wrapper">
            <p class="form-headline">Оформление заказа</p>
            <p class="form-subheadline">Заполните простую форму и мы с вами свяжемся в ближайшее время для уточнения
                информации.</p>
            <?= $checkout_form ?>
        </div>
    </div>
    <?php if (!empty($quiz)) : ?>
        <div class="modal-form form-pick-up" id="pick-up" style="visibility: hidden; display: block">
            <div class="swiper swiper-pick-up">
                <h5>Вопрос <span class="current-slide">1</span> из 6</h5>
                <div class="swiper-wrapper">
                    <div class="swiper-slide" data-number="1">
                        <h4>Выберите форму вашей кухни</h4>
                        <?php if (!empty($step_1_items)) : ?>
                            <div class="step-items">
                                <?php foreach ($step_1_items['elements'] as $item) : ?>
                                    <div class="item-step">
                                        <picture>
                                            <img loading="lazy" src="<?= $item['image']['url'] ?>"
                                                 alt="<?= $item['image']['title'] ?>">
                                        </picture>
                                        <div class="checkbox">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6" viewBox="0 0 9 6"
                                             fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M8.35355 0.146445C8.5488 0.34171 8.5488 0.65829 8.35355 0.853555L3.35355 5.85355C3.1583 6.0488 2.84171 6.0488 2.64644 5.85355L0.146445 3.35355C-0.048815 3.1583 -0.048815 2.8417 0.146445 2.64645C0.34171 2.4512 0.65829 2.4512 0.853555 2.64645L3 4.7929L7.64645 0.146445C7.8417 -0.048815 8.1583 -0.048815 8.35355 0.146445Z"
                                              fill="white"></path>
                                        </svg>
                                    </span>
                                            <p><?= $item['text'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-slide" data-number="2">
                        <h4>Укажите примерные размеры кухни</h4>
                        <p class="subheadline">Укажите длину каждой стены на кухне в сантиметрах. Не обращайте внимание
                            на
                            выступы, ниши, двери и окна</p>
                        <div class="step-2">
                            <input class="height" type="number" min="0" placeholder="2.5">
                            <input class="length" type="number" min="0" placeholder="2.5">
                        </div>
                        <div class="step-2-image">
                            <div class="step-2-top"><span>2.5</span><span>м</span></div>
                            <div class="step-2-bottom">
                                <div><span>2.5</span><span>м</span></div>
                                <picture>
                                    <img src="<?= home_url() . '/wp-content/uploads/2022/12/угловая.png' ?>"
                                         alt="image">
                                </picture>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide" data-number="3">
                        <h4>Выберите материал фасада</h4>
                        <p class="subheadline">Цвет или эмитацию фасада можо выбрать позже. Это не вияется на
                            стоимость</p>
                        <?php if (!empty($step_3_items)) : ?>
                            <div class="step-items">
                                <?php foreach ($step_3_items['elements'] as $item) : ?>
                                    <div class="item-step">
                                        <picture>
                                            <img loading="lazy" src="<?= $item['image']['url'] ?>"
                                                 alt="<?= $item['image']['title'] ?>">
                                        </picture>
                                        <div class="checkbox">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6" viewBox="0 0 9 6"
                                             fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M8.35355 0.146445C8.5488 0.34171 8.5488 0.65829 8.35355 0.853555L3.35355 5.85355C3.1583 6.0488 2.84171 6.0488 2.64644 5.85355L0.146445 3.35355C-0.048815 3.1583 -0.048815 2.8417 0.146445 2.64645C0.34171 2.4512 0.65829 2.4512 0.853555 2.64645L3 4.7929L7.64645 0.146445C7.8417 -0.048815 8.1583 -0.048815 8.35355 0.146445Z"
                                              fill="white"></path>
                                        </svg>
                                    </span>
                                            <p><?= $item['text'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-slide" data-number="4">
                        <h4>Выберите стиль кухни</h4>
                        <?php if (!empty($step_4_items)) : ?>
                            <div class="step-items">
                                <?php foreach ($step_4_items as $term) : ?>
                                    <?php
                                    $gallery = get_field('gallery', $term->taxonomy . '_' . $term->term_id);
                                    ?>
                                    <div class="item-step">
                                        <picture>
                                            <img loading="lazy" src="<?= $gallery[0]['url'] ?? '' ?>"
                                                 alt="<?= $gallery[0]['title'] ?? '' ?>">
                                        </picture>
                                        <div class="checkbox">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6" viewBox="0 0 9 6"
                                             fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M8.35355 0.146445C8.5488 0.34171 8.5488 0.65829 8.35355 0.853555L3.35355 5.85355C3.1583 6.0488 2.84171 6.0488 2.64644 5.85355L0.146445 3.35355C-0.048815 3.1583 -0.048815 2.8417 0.146445 2.64645C0.34171 2.4512 0.65829 2.4512 0.853555 2.64645L3 4.7929L7.64645 0.146445C7.8417 -0.048815 8.1583 -0.048815 8.35355 0.146445Z"
                                              fill="white"></path>
                                        </svg>
                                    </span>
                                            <p><?= $term->name ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-slide" data-number="5">
                        <h4>Укажите дополнительные параметры</h4>
                        <?php if (!empty($step_5_items)) : ?>
                            <div class="step-items">
                                <?php foreach ($step_5_items['elements'] as $item) : ?>
                                    <div class="item-step">
                                        <picture>
                                            <img loading="lazy" src="<?= $item['image']['url'] ?>"
                                                 alt="<?= $item['image']['title'] ?>">
                                        </picture>
                                        <div class="checkbox">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9" height="6" viewBox="0 0 9 6"
                                             fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M8.35355 0.146445C8.5488 0.34171 8.5488 0.65829 8.35355 0.853555L3.35355 5.85355C3.1583 6.0488 2.84171 6.0488 2.64644 5.85355L0.146445 3.35355C-0.048815 3.1583 -0.048815 2.8417 0.146445 2.64645C0.34171 2.4512 0.65829 2.4512 0.853555 2.64645L3 4.7929L7.64645 0.146445C7.8417 -0.048815 8.1583 -0.048815 8.35355 0.146445Z"
                                              fill="white"></path>
                                        </svg>
                                    </span>
                                            <p><?= $item['text'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="swiper-slide" data-number="6">
                        <div class="form-wrapper">
                            <p class="form-headline">Вы получите расчет стоимости в ближайшее время</p>
                            <p class="form-subheadline">Наш специалист проверит автоматический расчет цены,
                                скорректирует
                                его для более высокой точности и отправит вам в мессенджер</p>
                            <?= $pick_up ?>
                        </div>
                    </div>
                </div>
                <div class="navigation">
                    <div class="prev-wrapper">
                        <div class="prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="10" viewBox="0 0 20 10"
                                 fill="none">
                                <path d="M1.08672 4.07431H16.7981L14.1955 1.48427C13.9051 1.19523 13.9039 0.725515 14.193 0.435107C14.482 0.144662 14.9518 0.143587 15.2422 0.432585L19.1186 4.29035C19.1189 4.29057 19.1191 4.29083 19.1193 4.29105C19.409 4.58009 19.4099 5.05133 19.1194 5.34133C19.1191 5.34155 19.1189 5.34181 19.1187 5.34203L15.2423 9.19979C14.9519 9.48876 14.4821 9.48775 14.1931 9.19727C13.904 8.90686 13.9051 8.43714 14.1955 8.14811L16.7981 5.55807H1.08672C0.676983 5.55807 0.344845 5.22593 0.344845 4.81619C0.344845 4.40645 0.676983 4.07431 1.08672 4.07431Z"
                                      fill="white"/>
                            </svg>
                        </div>
                        <p>Назад</p>
                    </div>

                    <div class="next-wrapper">
                        <p>Далее</p>
                        <div class="next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="10" viewBox="0 0 20 10"
                                 fill="none">
                                <path d="M1.08672 4.07431H16.7981L14.1955 1.48427C13.9051 1.19523 13.9039 0.725515 14.193 0.435107C14.482 0.144662 14.9518 0.143587 15.2422 0.432585L19.1186 4.29035C19.1189 4.29057 19.1191 4.29083 19.1193 4.29105C19.409 4.58009 19.4099 5.05133 19.1194 5.34133C19.1191 5.34155 19.1189 5.34181 19.1187 5.34203L15.2423 9.19979C14.9519 9.48876 14.4821 9.48775 14.1931 9.19727C13.904 8.90686 13.9051 8.43714 14.1955 8.14811L16.7981 5.55807H1.08672C0.676983 5.55807 0.344845 5.22593 0.344845 4.81619C0.344845 4.40645 0.676983 4.07431 1.08672 4.07431Z"
                                      fill="white"/>
                            </svg>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="modal-form form-checkout" id="end-order">
        <div class="form-wrapper">
            <p class="form-headline">Ваша заказ оформлен</p>
            <p class="form-subheadline">Пожалуйста дождитесь ответа наших сотрудников, в ближайшее время они с вами
                свяжутся для уточнения информации и подтверждения заказа.</p>
        </div>
    </div>

    <button style="display: none" href="javascript:;" data-fancybox data-src="#end-order" class="end-order"></button>

    <div class="container">
        <div class="footer__wrapper">

            <div class="footer__logo-wrapper">
                <a href="<?= home_url() ?>">
                    <picture>
                        <img
                                loading="lazy"
                                class="footer__logo"
                                src="<?= $logo['url'] ?? '' ?>"
                                alt="<?= $logo['alt'] ?? '' ?>"
                        >
                    </picture>
                </a>
            </div>

            <div class="footer__content-wrapper">

                <div class="footer-section">
                    <?php if (!empty($phones)) : ?>
                        <div class="footer-section__link">
                            <b class="footer__title">Телефоны</b>
                            <p class="footer-section__description">
                                <?php foreach ($phones as $phone) : ?>
                                    <a
                                            class="footer-section__important"
                                            href="tel:<?= $phone['phone'] ?? '' ?>">
                                        <?= $phone['phone'] ?? '' ?>
                                    </a>
                                <?php endforeach; ?>

                                <?php if (!empty($workingMode['workingTime'])) : ?>
                                    <i class="footer-section__signature">
                                        (<?= $workingMode['workingTime'] ?>)
                                    </i>
                                <?php endif; ?>
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($emailInfo['email']) && !empty($emailInfo['department'])) : ?>
                        <div class="footer-section__link">
                            <b class="footer__title">Email</b>
                            <p class="footer-section__description">
                                <a
                                        class="footer-section__important"
                                        href="email:<?= $emailInfo['email'] ?>">
                                    <?= $emailInfo['email'] ?>
                                </a>

                                <i class="footer-section__signature">
                                    <?= $emailInfo['department'] ?>
                                </i>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="footer-section">
                    <?php if (!empty($addressInfos)) : ?>
                        <div class="footer-section__link">
                            <b class="footer__title">Адрес</b>
                            <?php foreach ($addressInfos as $addressInfo) : ?>
                                <p class="footer-section__description">
                                    <span class="footer-section__important">
                                        <?= $addressInfo['address'] ?>
                                    </span>
                                    <i class="footer-section__signature">
                                        <?= $addressInfo['department'] ?>
                                    </i>
                                </p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($workingMode['workingTime']) && !empty($workingMode['days'])) : ?>
                        <div class="footer-section__link">
                            <b class="footer__title">Режим работы</b>
                            <p class="footer-section__description">
                                <span class="footer-section__important">
                                    <?= $workingMode['workingTime'] ?>
                                </span>
                                <i class="footer-section__signature">
                                    <?= $workingMode['days'] ?>
                                </i>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="footer__links-section footer__seller-section">
                    <b class="footer__title">Покупателям</b>
                    <?= wp_nav_menu(
                        [
                            'menu' => 'header_menu_desktop',
                            'theme_location' => 'header_menu_desktop',
                            'menu_class' => 'footer-buyers',
                        ]);
                    ?>
                </div>

                <div class="footer__links-wrapper">
                    <div class="footer__links-section footer__catalog-section">
                        <b class="footer__title">Каталог</b>
                        <?= wp_nav_menu(
                            [
                                'menu' => 'footer_catalog_left',
                                'theme_location' => 'footer_catalog_left',
                                'menu_class' => 'footer-catalog-left',
                            ]);
                        ?>
                    </div>
                </div>
                <div class="footer__catalog-others">
                    <?= wp_nav_menu(
                        [
                            'menu' => 'footer_catalog_right',
                            'theme_location' => 'footer_catalog_right',
                            'menu_class' => 'footer-catalog-right',
                        ]);
                    ?>
                </div>

                <ul class="socials-list">
                    <?php if (!empty($socials)) : ?>
                        <?php foreach ($socials as $social) : ?>
                            <?php if (!empty($social['logo']) && !empty($social['link'])) : ?>
                                <li class="socials-item">
                                    <a href="<?= $social['link'] ?>">
                                        <img
                                                src="<?= $social['logo']['url'] ?>"
                                                alt="<?= $social['logo']['alt'] ?? '' ?>"
                                        >
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="footer-additional">
                <div class="footer-additional__left">
                    <a href="">Политика конфиденциальности</a>
                    <a href="">Согласие на обработку персональных данных</a>
                </div>

                <div class="footer-additional__right">
                    <a href="">Разработка сайта — Digital-студия «Акцепт»</a>
                </div>

            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>