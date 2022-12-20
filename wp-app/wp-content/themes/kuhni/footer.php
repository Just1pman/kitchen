</main>
<?php
$logo = get_field('logo', 'option');
$socials = get_field('socials', 'option');
$phones = get_field('phones', 'option');
$emailInfo = get_field('emailInfo', 'option');
$addressInfo = get_field('addressInfo', 'option');
$workingMode = get_field('workingMode', 'option');
$back_call_form = get_field('back_call', 'option');
$checkout_form = get_field('checkout', 'option');
?>

<footer id="footer" class="footer">
    <div class="modal-form form-back-call" id="back-call">
        <div class="form-wrapper">
            <p class="form-headline">Обратный звонок</p>
            <p class="form-subheadline">Заполните простую форму и мы с вами свяжемся в ближайшее время для уточнения информации.</p>
            <?= $back_call_form ?>
        </div>
    </div>
    <div class="modal-form form-checkout" id="checkout">
        <div class="form-wrapper">
            <p class="form-headline">Оформление заказа</p>
            <p class="form-subheadline">Заполните простую форму и мы с вами свяжемся в ближайшее время для уточнения информации.</p>
            <?= $checkout_form ?>
        </div>
    </div>

    <div class="modal-form form-checkout" id="end-order">
        <div class="form-wrapper">
            <p class="form-headline">Ваша заказ оформлен</p>
            <p class="form-subheadline">Пожалуйста дождитесь ответа наших сотрудников, в ближайшее время они с вами свяжутся для уточнения информации и подтверждения заказа.</p>
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
                        <?php if (!empty($phones)) :     ?>
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

                                    <?php if(!empty($workingMode['workingTime'])) : ?>
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
                        <?php if (!empty($addressInfo['address']) && !empty($addressInfo['department'])) : ?>
                            <div class="footer-section__link">
                                <b class="footer__title">Адрес</b>
                                <p class="footer-section__description">
                                <span class="footer-section__important">
                                    <?= $addressInfo['address'] ?>
                                </span>
                                    <i class="footer-section__signature">
                                        <?= $addressInfo['department'] ?>
                                    </i>
                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($workingMode['workingTime']) && !empty($workingMode['days'])) : ?>
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
                    <ul class="footer__links-list">
                        <li class="footer__links-item">
                            О компании
                        </li>
                        <li class="footer__links-item">
                            Каталоги техники
                        </li>
                        <li class="footer__links-item">
                            Блог
                        </li>
                        <li class="footer__links-item">
                            Контакты
                        </li>
                    </ul>
                </div>

                <div class="footer__links-wrapper">
                    <div class="footer__links-section footer__catalog-section">
                        <b class="footer__title">Каталог</b>
                        <ul class="footer__links-list footer__catalog-list">
                            <li class="footer__links-item">
                                Угловые кухни
                            </li>
                            <li class="footer__links-item">
                                Прямые кухни
                            </li>
                            <li class="footer__links-item">
                                Трехъярусные кухни
                            </li>
                            <li class="footer__links-item">
                                Кухни классика
                            </li>
                            <li class="footer__links-item">
                                Кухни модерн
                            </li>
                            <li class="footer__links-item">
                                Кухни лофт
                            </li>
                            <li class="footer__links-item">
                                Кухни  зеленые
                            </li>
                            <li class="footer__links-item">
                                Кухни красные
                            </li>
                            <li class="footer__links-item footer__links-item--more">
                                весь каталог
                            </li>
                        </ul>
                    </div>

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