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

add_action( 'init', 'create_taxonomy' );
function create_taxonomy() {

    register_taxonomy( 'kitchen-category', [ 'kitchens' ], [
        'label'                 => __( 'Ipad category' ),
        'rewrite'               => [ 'slug' => 'kitchen-category' ],
        'labels'                => [
            'name'              => 'Категория кухонь',
            'singular_name'     => 'Категории кухонь',
            'search_items'      => 'Найти категорию',
            'all_items'         => 'Все категории кухонь',
            'view_item '        => 'Просмотреть категорию кухонь',
            'parent_item'       => 'Родительская категория кухни',
            'parent_item_colon' => 'Родительская категория кухни:',
            'edit_item'         => 'Редактировать категорию кухни',
            'update_item'       => 'Обновить категорию кухни',
            'add_new_item'      => 'Добавить новую категорию кухни',
            'new_item_name'     => 'Новое название категории кухни',
            'menu_name'         => 'Категории кухонь',
        ],
        'public'                => true,
        'hierarchical'          => true,
        'capabilities'          => [],
        'meta_box_cb'           => null,
        'show_admin_column'     => false,
        'show_in_rest'          => true,
        'show_ui'               => true,
        'publicly_queryable'    => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
    ] );
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