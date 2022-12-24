<?php
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', function () {
    register_nav_menus([
        'header_menu_desktop' => 'Меню хедер desktop',
        'header_menu_mobile' => 'Меню хедер mobile',
        'footer_catalog_left' => 'Меню футер каталог левое',
        'footer_catalog_right' => 'Меню футер каталог правое',
    ]);
    add_theme_support(
        'custom-logo',
        array(
            'height' => 500,
            'width' => 500,
            'flex-height' => true,
        )
    );
});