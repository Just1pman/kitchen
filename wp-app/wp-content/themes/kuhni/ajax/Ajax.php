<?php

class Ajax
{
    public string $ajax_blocks_path;

    public function __construct()
    {
        $this->ajax_blocks_path = get_template_directory() . '/ajax-blocks/';
    }

    public function register(): void
    {
        add_action('wp_ajax_example_kitchens', [$this, 'example_kitchens']);
        add_action('wp_ajax_nopriv_example_kitchens', [$this, 'example_kitchens']);
    }

    function example_kitchens() {
        $format = $_POST['format'];
        $args = [];
        $defaultArgs = [
            'post_type' => 'kitchens',
            'posts_per_page' => 4,
            'post_status' => 'publish',
        ];

        if ($format === 'new' || $format === 'popular') {
            $args = [
                'orderby' => 'publish_date',
                'order' => 'DESC',
            ];
        }

        if ($format === 'discount') {
            $args = [
                'meta_key' => 'discount_percentage',
                'order' => 'DESC',
            ];
        }

        $kitchens = get_posts(array_merge($defaultArgs, $args));

        include $this->ajax_blocks_path . 'example-kitchens-ajax.php';
        wp_die();
    }
}