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

        add_action('wp_ajax_reviews', [$this, 'reviews']);
        add_action('wp_ajax_nopriv_reviews', [$this, 'reviews']);
    }

    public function example_kitchens() {

        $format = $_POST['format'];
        $kitchens = $this->get_example_kitchens($format);

        include $this->ajax_blocks_path . 'example-kitchens-ajax.php';
        wp_die();
    }

    public function get_example_kitchens($format) {
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

        return get_posts(array_merge($defaultArgs, $args));
    }

    public function reviews() {
        [ 'type' => $type ] = $_POST;
        $args = [];
        $defaultArgs = [
            'post_type' => 'reviews',
            'posts_per_page' => 15,
            'post_status' => 'publish',
        ];

        $reviews = get_posts(array_merge($defaultArgs, $args));

        include $this->ajax_blocks_path . 'review-card.php';
        wp_die();
    }

}