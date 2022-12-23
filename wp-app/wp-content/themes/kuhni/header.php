<!doctype html>
<html lang="ru">

<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title><?php wp_title('«', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
</head>

<?php
$workingMode = get_field('workingMode', 'option');
$phones = get_field('phones', 'option');
$emailInfo = get_field('emailInfo', 'option');
$logo = get_field('logo', 'option');
$phone_numbers = $phones[0]['phone'] ? preg_replace('/[^0-9]/', "", $phones[0]['phone']) : '';
?>

<body>
<header id="header">
    <div class="header-desktop">
        <div class="container">
            <div class="header-top">
                <div class="header-top-left">
                    <?= wp_nav_menu(
                        [
                            'menu' => 'header_menu_desktop',
                            'theme_location' => 'header_menu_desktop',
                            'menu_class' => 'desktop',
                        ]);
                    ?>
                </div>

                <div class="header-top-right">
                    <a href="mailto:<?= $emailInfo['email'] ?? '' ?>" class="header-email"> <?= $emailInfo['email'] ?? '' ?> </a>
                    <a href="tel:+<?= $phone_numbers ?>" class="header-phone"> <?= $phones[0]['phone'] ?? '' ?> </a>
                    <div class="header-work">Работаем с <?= $workingMode['workingTime'] ?? '' ?> </div>
                    <a href="javascript:;" data-fancybox data-src="#back-call" class="header-feedback">Обратный звонок</a>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="header-bottom-wrapper">
                    <div class="header-bottom-left">
                        <a href="<?= home_url() ?>">
                            <picture>
                                <img loading="lazy" src="<?= $logo['url'] ?? '#' ?>" alt="<?= $logo['title'] ?? '' ?>">
                            </picture>
                        </a>
                    </div>
                    <div class="header-bottom-center">
                        <a href="<?= home_url() . '/catalog' ?>" class="header-center-catalog">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="11" viewBox="0 0 22 11"
                                 fill="none">
                                <rect y="0.982712" width="22" height="2.42915" fill="black"/>
                                <rect y="8.55351" width="22" height="2.42915" fill="black"/>
                            </svg>
                            <p>Каталог кухонь</p>
                        </a>
                        <a href="<?= home_url() ?>/categories" class="header-center-tech">
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="28" viewBox="0 0 27 28"
                                 fill="none">
                                <g clip-path="url(#clip0_202_3619)">
                                    <path d="M26.2079 12.524H22.9068V11.6353C22.8679 10.5873 21.3638 10.5881 21.3253 11.6353V12.524H19.8036V9.11833C19.6862 6.03175 15.2615 6.03412 15.1452 9.11833V9.12824C15.1841 10.1763 16.6882 10.1755 16.7267 9.12824V9.11833C16.7644 8.12755 18.1848 8.12829 18.2221 9.11833V12.524H16.7267V11.6353C16.6878 10.5873 15.1837 10.5881 15.1452 11.6353V12.524H12.5821V0.998456C12.5821 0.561741 12.2281 0.207687 11.7914 0.207687H0.791623C0.354908 0.207687 0.000854492 0.561741 0.000854492 0.998456V26.4169C0.000854492 26.8536 0.354908 27.2077 0.791623 27.2077H26.2079C26.6446 27.2077 26.9986 26.8536 26.9986 26.4169V13.3147C26.9986 12.878 26.6446 12.524 26.2079 12.524ZM25.4171 14.1055V15.9008H12.5821V14.1055H25.4171ZM11.0006 1.78922V15.9008H1.58239V1.78922H11.0006ZM1.58239 17.4823H11.0006V25.6262H1.58239V17.4823ZM12.5821 17.4823H18.2089V25.6262H12.5821V17.4823ZM19.7904 25.6262V17.4823H25.4171V25.6262H19.7904Z"
                                          fill="black"/>
                                    <path d="M6.29187 14.4457H8.85596C9.90405 14.4068 9.90326 12.9027 8.85596 12.8642H6.29187C5.24379 12.9031 5.24458 14.4072 6.29187 14.4457Z"
                                          fill="black"/>
                                    <path d="M15.9015 20.2127C15.4656 20.2127 15.1123 20.566 15.1123 21.0019C15.151 22.0477 16.6522 22.0473 16.6907 21.0019C16.6907 20.566 16.3374 20.2127 15.9015 20.2127Z"
                                          fill="black"/>
                                    <path d="M21.8938 20.2127C21.4579 20.2127 21.1046 20.566 21.1046 21.0019C21.1433 22.0477 22.6445 22.0473 22.683 21.0019C22.683 20.566 22.3296 20.2127 21.8938 20.2127Z"
                                          fill="black"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_202_3619">
                                        <rect width="27" height="27" fill="white" transform="translate(0 0.207687)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                            <p>Техника</p>
                        </a>
                        <a href="<?= home_url() ?>/categories" class="header-center-accessories">
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="30" viewBox="0 0 29 30"
                                 fill="none">
                                <path d="M23.9896 8.84634C23.9486 7.00198 23.182 5.24819 21.8561 3.96551C20.5301 2.68283 18.7519 1.97475 16.9072 1.99493C15.0625 2.0151 13.3002 2.7619 12.0026 4.07327C10.7051 5.38464 9.97701 7.15478 9.97638 8.99959V18.1858C9.55929 18.1901 9.1607 18.3587 8.8671 18.655C8.57349 18.9513 8.40855 19.3513 8.40804 19.7685V20.5845H5.60168C5.38913 20.5833 5.17843 20.6241 4.98171 20.7045C4.78498 20.785 4.60611 20.9036 4.45537 21.0534C4.30464 21.2033 4.18501 21.3815 4.10339 21.5777C4.02176 21.774 3.97974 21.9844 3.97974 22.197C3.97974 22.4095 4.02176 22.62 4.10339 22.8162C4.18501 23.0125 4.30464 23.1906 4.45537 23.3405C4.60611 23.4903 4.78498 23.6089 4.98171 23.6894C5.17843 23.7699 5.38913 23.8106 5.60168 23.8094H8.40804V26.8654C8.40804 27.0133 8.46679 27.1551 8.57138 27.2597C8.67597 27.3643 8.81782 27.4231 8.96573 27.4231H14.6138C14.7617 27.4231 14.9035 27.3643 15.0081 27.2597C15.1127 27.1551 15.1715 27.0133 15.1715 26.8654V19.7685C15.171 19.3488 15.0041 18.9464 14.7073 18.6496C14.4105 18.3529 14.0082 18.1859 13.5885 18.1855H13.5297V9.33711C13.5296 8.43504 13.8724 7.56666 14.4886 6.90782C15.1047 6.24897 15.9482 5.84888 16.8483 5.78856C17.7483 5.72824 18.6377 6.0122 19.3362 6.58295C20.0348 7.15369 20.4903 7.96856 20.6107 8.86257C20.5211 8.90996 20.4461 8.98089 20.3937 9.06773C20.3414 9.15456 20.3137 9.25402 20.3137 9.3554V11.1496C20.3137 11.2975 20.3725 11.4394 20.4771 11.544C20.5816 11.6485 20.7235 11.7073 20.8714 11.7073H23.7617C23.9096 11.7073 24.0515 11.6485 24.156 11.544C24.2606 11.4394 24.3194 11.2975 24.3194 11.1496V9.35523C24.3194 9.24763 24.2882 9.14233 24.2297 9.05204C24.1712 8.96174 24.0878 8.8903 23.9896 8.84634ZM5.1046 22.1969C5.10477 22.0652 5.15719 21.9388 5.25038 21.8456C5.34356 21.7525 5.4699 21.7001 5.60168 21.6999H11.158C11.2237 21.6992 11.2889 21.7116 11.3498 21.7362C11.4107 21.7609 11.4661 21.7974 11.5128 21.8436C11.5596 21.8898 11.5966 21.9449 11.622 22.0055C11.6473 22.0662 11.6603 22.1312 11.6603 22.197C11.6603 22.2627 11.6473 22.3277 11.622 22.3884C11.5966 22.449 11.5596 22.5041 11.5128 22.5503C11.4661 22.5965 11.4107 22.633 11.3498 22.6577C11.2889 22.6824 11.2237 22.6947 11.158 22.694H5.60168C5.46989 22.6939 5.34354 22.6414 5.25036 22.5483C5.15717 22.4551 5.10475 22.3287 5.1046 22.1969ZM13.5885 19.3008C13.7125 19.301 13.8313 19.3503 13.919 19.438C14.0066 19.5256 14.0559 19.6445 14.0561 19.7685V26.3077H9.52342V23.8092H11.158C11.3705 23.8105 11.5812 23.7697 11.7779 23.6892C11.9747 23.6087 12.1535 23.4902 12.3043 23.3403C12.455 23.1905 12.5746 23.0123 12.6563 22.816C12.7379 22.6198 12.7799 22.4093 12.7799 22.1968C12.7799 21.9842 12.7379 21.7738 12.6563 21.5775C12.5746 21.3813 12.455 21.2031 12.3043 21.0533C12.1535 20.9034 11.9747 20.7848 11.7779 20.7044C11.5812 20.6239 11.3705 20.5831 11.158 20.5844H9.52342V19.7685C9.52356 19.6445 9.57286 19.5256 9.66051 19.438C9.74817 19.3503 9.86702 19.301 9.99099 19.3008H13.5885ZM17.0866 4.66476C15.8478 4.66613 14.6602 5.15884 13.7843 6.03478C12.9083 6.91072 12.4156 8.09835 12.4143 9.33711V18.1855H11.0918V8.99981C11.0914 7.45454 11.6982 5.97099 12.7813 4.86883C13.8644 3.76667 15.3371 3.13412 16.8822 3.10749C18.4272 3.08086 19.9209 3.66227 21.0413 4.72645C22.1618 5.79063 22.8193 7.25239 22.8722 8.79676C22.8498 8.79387 22.8272 8.79236 22.8045 8.79224H21.7272C21.5923 7.65576 21.0456 6.60814 20.1904 5.84755C19.3353 5.08696 18.231 4.66616 17.0866 4.66476ZM23.2041 10.5919H21.4292V9.91292H23.2041V10.5919Z"
                                      fill="black" stroke="black" stroke-width="0.4"/>
                                <path d="M21.1478 13.6814C21.4558 13.6814 21.7055 13.4317 21.7055 13.1237C21.7055 12.8157 21.4558 12.566 21.1478 12.566C20.8398 12.566 20.5901 12.8157 20.5901 13.1237C20.5901 13.4317 20.8398 13.6814 21.1478 13.6814Z"
                                      fill="black"/>
                                <path d="M20.9062 15.7607C21.2142 15.7607 21.4639 15.511 21.4639 15.203C21.4639 14.895 21.2142 14.6453 20.9062 14.6453C20.5982 14.6453 20.3485 14.895 20.3485 15.203C20.3485 15.511 20.5982 15.7607 20.9062 15.7607Z"
                                      fill="black"/>
                                <path d="M20.6643 17.8405C20.9723 17.8405 21.222 17.5908 21.222 17.2828C21.222 16.9748 20.9723 16.7251 20.6643 16.7251C20.3563 16.7251 20.1066 16.9748 20.1066 17.2828C20.1066 17.5908 20.3563 17.8405 20.6643 17.8405Z"
                                      fill="black"/>
                                <path d="M20.4222 19.9199C20.7302 19.9199 20.9799 19.6702 20.9799 19.3622C20.9799 19.0542 20.7302 18.8046 20.4222 18.8046C20.1142 18.8046 19.8645 19.0542 19.8645 19.3622C19.8645 19.6702 20.1142 19.9199 20.4222 19.9199Z"
                                      fill="black"/>
                                <path d="M20.1801 21.9993C20.4881 21.9993 20.7378 21.7497 20.7378 21.4416C20.7378 21.1336 20.4881 20.884 20.1801 20.884C19.8721 20.884 19.6224 21.1336 19.6224 21.4416C19.6224 21.7497 19.8721 21.9993 20.1801 21.9993Z"
                                      fill="black"/>
                                <path d="M22.3147 21.9993C22.6227 21.9993 22.8723 21.7497 22.8723 21.4416C22.8723 21.1336 22.6227 20.884 22.3147 20.884C22.0066 20.884 21.757 21.1336 21.757 21.4416C21.757 21.7497 22.0066 21.9993 22.3147 21.9993Z"
                                      fill="black"/>
                                <path d="M24.4532 21.9993C24.7612 21.9993 25.0109 21.7497 25.0109 21.4416C25.0109 21.1336 24.7612 20.884 24.4532 20.884C24.1452 20.884 23.8955 21.1336 23.8955 21.4416C23.8955 21.7497 24.1452 21.9993 24.4532 21.9993Z"
                                      fill="black"/>
                                <path d="M22.3147 19.9199C22.6227 19.9199 22.8723 19.6702 22.8723 19.3622C22.8723 19.0542 22.6227 18.8046 22.3147 18.8046C22.0066 18.8046 21.757 19.0542 21.757 19.3622C21.757 19.6702 22.0066 19.9199 22.3147 19.9199Z"
                                      fill="black"/>
                                <path d="M24.2111 19.9199C24.5191 19.9199 24.7688 19.6702 24.7688 19.3622C24.7688 19.0542 24.5191 18.8046 24.2111 18.8046C23.9031 18.8046 23.6534 19.0542 23.6534 19.3622C23.6534 19.6702 23.9031 19.9199 24.2111 19.9199Z"
                                      fill="black"/>
                                <path d="M22.3147 17.8405C22.6227 17.8405 22.8723 17.5908 22.8723 17.2828C22.8723 16.9748 22.6227 16.7251 22.3147 16.7251C22.0066 16.7251 21.757 16.9748 21.757 17.2828C21.757 17.5908 22.0066 17.8405 22.3147 17.8405Z"
                                      fill="black"/>
                                <path d="M23.9691 17.8405C24.2771 17.8405 24.5268 17.5908 24.5268 17.2828C24.5268 16.9748 24.2771 16.7251 23.9691 16.7251C23.6611 16.7251 23.4114 16.9748 23.4114 17.2828C23.4114 17.5908 23.6611 17.8405 23.9691 17.8405Z"
                                      fill="black"/>
                                <path d="M22.3147 15.7607C22.6227 15.7607 22.8723 15.511 22.8723 15.203C22.8723 14.895 22.6227 14.6453 22.3147 14.6453C22.0066 14.6453 21.757 14.895 21.757 15.203C21.757 15.511 22.0066 15.7607 22.3147 15.7607Z"
                                      fill="black"/>
                                <path d="M23.7271 15.7607C24.0351 15.7607 24.2848 15.511 24.2848 15.203C24.2848 14.895 24.0351 14.6453 23.7271 14.6453C23.4191 14.6453 23.1694 14.895 23.1694 15.203C23.1694 15.511 23.4191 15.7607 23.7271 15.7607Z"
                                      fill="black"/>
                                <path d="M22.315 13.6814C22.623 13.6814 22.8727 13.4317 22.8727 13.1237C22.8727 12.8157 22.623 12.566 22.315 12.566C22.007 12.566 21.7573 12.8157 21.7573 13.1237C21.7573 13.4317 22.007 13.6814 22.315 13.6814Z"
                                      fill="black"/>
                                <path d="M23.4855 13.6814C23.7936 13.6814 24.0432 13.4317 24.0432 13.1237C24.0432 12.8157 23.7936 12.566 23.4855 12.566C23.1775 12.566 22.9279 12.8157 22.9279 13.1237C22.9279 13.4317 23.1775 13.6814 23.4855 13.6814Z"
                                      fill="black"/>
                            </svg>
                            <p>Комплектующие</p>
                        </a>
                        <a href="<?= home_url() ?>/categories/?np=1&sort=discount" class="header-center-stock">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="26" viewBox="0 0 23 26"
                                 fill="none">
                                <path d="M6.69496 11.4346C6.86056 11.4554 7.01926 11.4623 7.18486 11.4623C8.20606 11.4623 9.18586 11.1151 9.98626 10.4623C10.9178 9.70539 11.5043 8.629 11.6354 7.42761C11.7665 6.22623 11.4215 5.05261 10.6694 4.11511C9.11686 2.17761 6.28786 1.87206 4.36276 3.43456C3.43126 4.1915 2.84476 5.26789 2.71366 6.46928C2.58256 7.67067 2.92756 8.84428 3.67966 9.78178C4.43866 10.7193 5.50816 11.3096 6.69496 11.4346ZM4.77676 6.6915C4.84576 6.04567 5.16316 5.46928 5.65996 5.05956C6.09466 4.70539 6.61906 4.52484 7.17106 4.52484C7.26076 4.52484 7.34356 4.53178 7.43326 4.53872C8.07496 4.60817 8.64766 4.92761 9.05476 5.43456C9.46186 5.9415 9.64126 6.57345 9.57226 7.21928C9.50326 7.86511 9.18586 8.4415 8.68906 8.85123C8.19226 9.26095 7.55746 9.4415 6.91576 9.37206C6.27406 9.30262 5.70136 8.98317 5.29426 8.47623C4.89406 7.96928 4.70776 7.33734 4.77676 6.6915Z"
                                      fill="black"/>
                                <path d="M20.6258 16.5595C19.0733 14.622 16.2443 14.3165 14.3192 15.879C13.3877 16.6359 12.8012 17.7123 12.6701 18.9137C12.539 20.1151 12.884 21.2887 13.6361 22.2262C14.3882 23.1637 15.4577 23.754 16.6514 23.8859C16.817 23.9067 16.9757 23.9137 17.1413 23.9137C18.1625 23.9137 19.1423 23.5665 19.9427 22.9137C21.8678 21.3442 22.1783 18.497 20.6258 16.5595ZM18.6455 21.2817C18.1418 21.6915 17.5139 21.872 16.8722 21.8026C16.2305 21.7331 15.6578 21.4137 15.2507 20.9067C14.8436 20.3998 14.6642 19.7678 14.7332 19.122C14.8022 18.4762 15.1196 17.8998 15.6164 17.4901C16.0649 17.129 16.5962 16.9553 17.1275 16.9553C17.8313 16.9553 18.5351 17.2678 19.0112 17.8581C19.8461 18.9067 19.6805 20.4415 18.6455 21.2817Z"
                                      fill="black"/>
                                <path d="M21.3442 5.27484C20.9854 4.82345 20.3368 4.754 19.8883 5.11512L2.69351 19.0596C2.24501 19.4207 2.17601 20.0735 2.53481 20.5248C2.74181 20.7818 3.03851 20.9137 3.34211 20.9137C3.56981 20.9137 3.79751 20.8373 3.99071 20.6846L21.1855 6.74706C21.634 6.37901 21.703 5.72623 21.3442 5.27484Z"
                                      fill="black"/>
                            </svg>
                            <p>Акции</p>
                        </a>
                    </div>
                    <a href="<?= home_url() ?>/categories" class="header-bottom-right button-header">Подобрать кухню</a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile container">
        <div class="header-mobile-wrapper">
            <div class="header-mobile-burger">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="11" viewBox="0 0 22 11" fill="none">
                    <rect y="0.982712" width="22" height="2.42915" fill="black"/>
                    <rect y="8.55351" width="22" height="2.42915" fill="black"/>
                </svg>
                <div class="header-phone"> <?= $phones[0]['phone'] ?? '' ?> </div>
            </div>
            <div class="header-mobile-logo">
                <a href="<?= home_url() ?>">
                    <picture>
                        <img loading="lazy" src="<?= $logo['url'] ?? '#' ?>" alt="<?= $logo['title'] ?? '' ?>">
                    </picture>
                </a>
            </div>
            <div class="">
                <div class="header-mobile-button button-header">
                    <a href="">подобрать кухню</a>
                </div>
            </div>
        </div>
        <div>
            <?= wp_nav_menu(
                [
                    'menu' => 'header_menu_mobile',
                    'theme_location' => 'header_menu_mobile',
                    'menu_class' => 'mobile',
                ]);
            ?>
        </div>
    </div>
</header>
<main id="main" class="main" data-page-id="<?= get_queried_object_id() ?>">