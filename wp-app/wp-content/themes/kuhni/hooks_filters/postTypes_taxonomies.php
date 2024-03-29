<?php
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Глобальные настройки',
        'menu_title' => 'Глобальные настройки',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

add_action('init', 'create_taxonomy');
function create_taxonomy()
{

    register_taxonomy('kitchen-category', ['kitchens'], [
        'label' => __('kitchen category'),
        'rewrite' => ['slug' => 'kitchen-category'],
        'labels' => [
            'name' => 'Категория кухонь',
            'singular_name' => 'Категории кухонь',
            'search_items' => 'Найти категорию',
            'all_items' => 'Все категории кухонь',
            'view_item ' => 'Просмотреть категорию кухонь',
            'parent_item' => 'Родительская категория кухни',
            'parent_item_colon' => 'Родительская категория кухни:',
            'edit_item' => 'Редактировать категорию кухни',
            'update_item' => 'Обновить категорию кухни',
            'add_new_item' => 'Добавить новую категорию кухни',
            'new_item_name' => 'Новое название категории кухни',
            'menu_name' => 'Категории кухонь',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);

    register_taxonomy('kitchen-material', ['kitchens'], [
        'label' => __('kitchen material'),
        'rewrite' => ['slug' => 'kitchen-material'],
        'labels' => [
            'name' => 'Материал',
            'singular_name' => 'Материалы',
            'search_items' => 'Найти материал',
            'all_items' => 'Все материалы',
            'view_item ' => 'Просмотреть материал',
            'parent_item' => 'Родительский материал',
            'parent_item_colon' => 'Родительский материал:',
            'edit_item' => 'Редактировать материал',
            'update_item' => 'Обновить материал',
            'add_new_item' => 'Добавить новый материал',
            'new_item_name' => 'Новое название материала',
            'menu_name' => 'Материалы',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);


    register_taxonomy('technics-country', ['technics'], [
        'label' => __('technics-country'),
        'rewrite' => ['slug' => 'technics-country'],
        'labels' => [
            'name' => 'Страна',
            'singular_name' => 'Страна',
            'search_items' => 'Найти страну',
            'all_items' => 'Все страны',
            'view_item ' => 'Просмотреть страну',
            'parent_item' => 'Родительская страна',
            'parent_item_colon' => 'Родительская страну:',
            'edit_item' => 'Редактировать страну',
            'update_item' => 'Обновить страну',
            'add_new_item' => 'Добавить новую страну',
            'new_item_name' => 'Новое название страны',
            'menu_name' => 'Страна',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);

    register_taxonomy('accessories-country', ['accessories'], [
        'label' => __('accessories-country'),
        'rewrite' => ['slug' => 'accessories-country'],
        'labels' => [
            'name' => 'Страна',
            'singular_name' => 'Страна',
            'search_items' => 'Найти страну',
            'all_items' => 'Все страны',
            'view_item ' => 'Просмотреть страну',
            'parent_item' => 'Родительская страна',
            'parent_item_colon' => 'Родительская страну:',
            'edit_item' => 'Редактировать страну',
            'update_item' => 'Обновить страну',
            'add_new_item' => 'Добавить новую страну',
            'new_item_name' => 'Новое название страны',
            'menu_name' => 'Страна',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);

    register_taxonomy('technics-category', ['technics'], [
        'label' => __('technics-category'),
        'rewrite' => ['slug' => 'technics-category'],
        'labels' => [
            'name' => 'Категория',
            'singular_name' => 'Категория',
            'search_items' => 'Найти категорию',
            'all_items' => 'Все категории',
            'view_item ' => 'Просмотреть категорию',
            'parent_item' => 'Родительская категория',
            'parent_item_colon' => 'Родительская категория:',
            'edit_item' => 'Редактировать категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новое название категории',
            'menu_name' => 'Категория',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);

    register_taxonomy('technics-brand', ['technics'], [
        'label' => __('technics-country'),
        'rewrite' => ['slug' => 'technics-country'],
        'labels' => [
            'name' => 'Бренд',
            'singular_name' => 'Бренд',
            'search_items' => 'Найти бренд',
            'all_items' => 'Все бренды',
            'view_item ' => 'Просмотреть бренд',
            'parent_item' => 'Родительский бренд',
            'parent_item_colon' => 'Родительский бренд:',
            'edit_item' => 'Редактировать бренд',
            'update_item' => 'Обновить бренд',
            'add_new_item' => 'Добавить новый бренд',
            'new_item_name' => 'Новое название бренда',
            'menu_name' => 'Бренд',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);

    register_taxonomy('accessories-category', ['accessories'], [
        'label' => __('accessories-category'),
        'rewrite' => ['slug' => 'accessories-category'],
        'labels' => [
            'name' => 'Категория',
            'singular_name' => 'Категория',
            'search_items' => 'Найти категорию',
            'all_items' => 'Все категории',
            'view_item ' => 'Просмотреть категорию',
            'parent_item' => 'Родительская категория',
            'parent_item_colon' => 'Родительская категория:',
            'edit_item' => 'Редактировать категорию',
            'update_item' => 'Обновить категорию',
            'add_new_item' => 'Добавить новую категорию',
            'new_item_name' => 'Новое название категории',
            'menu_name' => 'Категория',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);

    register_taxonomy('accessories-brand', ['accessories'], [
        'label' => __('accessories-country'),
        'rewrite' => ['slug' => 'accessories-country'],
        'labels' => [
            'name' => 'Бренд',
            'singular_name' => 'Бренд',
            'search_items' => 'Найти бренд',
            'all_items' => 'Все бренды',
            'view_item ' => 'Просмотреть бренд',
            'parent_item' => 'Родительский бренд',
            'parent_item_colon' => 'Родительский бренд:',
            'edit_item' => 'Редактировать бренд',
            'update_item' => 'Обновить бренд',
            'add_new_item' => 'Добавить новый бренд',
            'new_item_name' => 'Новое название бренда',
            'menu_name' => 'Бренд',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);

    register_taxonomy('kitchen-size', ['kitchens'], [
        'label' => __('kitchen size'),
        'rewrite' => ['slug' => 'kitchen-size'],
        'labels' => [
            'name' => 'Размер',
            'singular_name' => 'Размеры',
            'search_items' => 'Найти размер',
            'all_items' => 'Все размеры',
            'view_item ' => 'Просмотреть размер',
            'parent_item' => 'Родительский размер',
            'parent_item_colon' => 'Родительский размер:',
            'edit_item' => 'Редактировать размер',
            'update_item' => 'Обновить размер',
            'add_new_item' => 'Добавить новый размер',
            'new_item_name' => 'Новое название размера',
            'menu_name' => 'Размеры',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);


    //СТАТЬИ
    register_taxonomy('articles-category', ['articles'], [
        'label' => __('articles category'),
        'rewrite' => ['slug' => 'articles-category'],
        'labels' => [
            'name' => 'Категория',
            'singular_name' => 'Категория статей',
            'search_items' => 'Найти категорию статей',
            'all_items' => 'Все категории статей',
            'view_item ' => 'Просмотреть категории статей',
            'parent_item' => 'Родительская категория статей',
            'parent_item_colon' => 'Родительская категория:',
            'edit_item' => 'Редактировать категорию статей',
            'update_item' => 'Обновить категорию статей',
            'add_new_item' => 'Добавить новую категорию статей',
            'new_item_name' => 'Новое название категории статей',
            'menu_name' => 'Категории статей',
        ],
        'public' => true,
        'hierarchical' => true,
        'capabilities' => [],
        'meta_box_cb' => null,
        'show_admin_column' => false,
        'show_in_rest' => true,
        'show_ui' => true,
        'publicly_queryable' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
    ]);
}

function custom_register_post_types()
{
    $post_types = [
        [
            "post_type_name" => "kitchens",
            "name" => "Кухни",
            "name_plural" => "Кухни",
            "name_lowercase" => "Кухни",
            "name_lowercase_plural" => "Кухни",
            'menu_icon' => 'dashicons-shield-alt',
            "supports" => ['title', 'editor'],
            "has_archive" => false,
        ],
        [
            "post_type_name" => "accessories",
            "name" => "Аксессуары",
            "name_plural" => "Аксессуары",
            "name_lowercase" => "Аксессуары",
            "name_lowercase_plural" => "Аксессуары",
            'menu_icon' => 'dashicons-shield-alt',
            "supports" => ['title', 'editor'],
            "has_archive" => false,
        ],
        [
            "post_type_name" => "technics",
            "name" => "Техника",
            "name_plural" => "Техника",
            "name_lowercase" => "Техника",
            "name_lowercase_plural" => "Техника",
            'menu_icon' => 'dashicons-shield-alt',
            "supports" => ['title', 'editor'],
            'rewrite' => ['slug' => 'technics'],
            "has_archive" => false,
        ],
        [
            "post_type_name" => "articles",
            "name" => "Статьи",
            "name_plural" => "Статьи",
            "name_lowercase" => "Статьи",
            "name_lowercase_plural" => "Статьи",
            'menu_icon' => 'dashicons-shield-alt',
            "supports" => ['title', 'editor', 'thumbnail'],
            "has_archive" => false,
        ],
        [
            "post_type_name" => "reviews",
            "name" => "Отзывы",
            "name_plural" => "Отзывы",
            "name_lowercase" => "Отзывы",
            "name_lowercase_plural" => "Отзывы",
            'menu_icon' => 'dashicons-format-aside',
            "supports" => ['title', 'editor', 'thumbnail'],
            "has_archive" => false,
        ],
    ];

    foreach ($post_types as $post_type) {
        $post_type_args = [
            'labels' => [
                'name' => __($post_type["name_plural"]),
                'singular_name' => __($post_type["name"]),
                'add_new' => __('Добавить ' . $post_type["name"]),
                'add_new_item' => __('Добавить ' . $post_type["name"]),
                'edit_item' => __('Редактировать ' . $post_type["name"]),
                'new_item' => __('Добавить ' . $post_type["name"]),
                'view_item' => __('Посмотреть ' . $post_type["name"]),
                'view_items' => __('Посмотреть ' . $post_type["name_plural"]),
                'search_items' => __('Найти ' . $post_type["name_plural"]),
                'not_found' => __('Нет ' . $post_type["name_lowercase_plural"] . ' found'),
                'not_found_in_trash' => __('Нет ' . $post_type["name_lowercase_plural"] . ' found in Trash'),
                'all_items' => __('Все ' . $post_type["name_plural"]),
                'archives' => __($post_type["name"] . ' Archives'),
                'attributes' => __($post_type["name"] . ' Attributes'),
                'insert_into_item' => __('Insert into ' . $post_type["name_lowercase"]),
                'uploaded_to_this_item' => __('Uploaded to this ' . $post_type["name_lowercase"]),
                'item_published ' => __($post_type["name"] . ' published.'),
                'item_published_privately' => __($post_type["name"] . ' published privately.'),
                'item_reverted_to_draft' => __($post_type["name"] . ' reverted to draft.'),
                'item_scheduled' => __($post_type["name"] . ' scheduled.'),
                'item_updated' => __($post_type["name"] . ' updated.'),
            ],
            'menu_icon' => $post_type['menu_icon'],
            'public' => true,
            'has_archive' => $post_type["has_archive"],
            'menu_position' => 5,
            'show_in_rest' => true,
            'supports' => $post_type["supports"],
            'taxonomies' => $post_type["taxonomies"] ?? [],

        ];

        register_post_type($post_type["post_type_name"], $post_type_args);
    }

}

add_action('init', 'custom_register_post_types');