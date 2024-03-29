<?php

use helpers\Helpers;

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

        add_action('wp_ajax_popular_styles', [$this, 'popular_styles']);
        add_action('wp_ajax_nopriv_popular_styles', [$this, 'popular_styles']);

        add_action('wp_ajax_kitchen_filter', [$this, 'kitchen_filter']);
        add_action('wp_ajax_nopriv_kitchen_filter', [$this, 'kitchen_filter']);

        add_action('wp_ajax_get_technics', [$this, 'get_technics_filter']);
        add_action('wp_ajax_nopriv_get_technics', [$this, 'get_technics_filter']);

        add_action('wp_ajax_article_categories', [$this, 'get_articles_filter']);
        add_action('wp_ajax_nopriv_article_categories', [$this, 'get_articles_filter']);

        add_action('wp_ajax_get_accessories', [$this, 'get_accessories_filter']);
        add_action('wp_ajax_nopriv_get_accessories', [$this, 'get_accessories_filter']);
    }

    public function example_kitchens()
    {
        $format = $_POST['format'];
        $entities = $this->get_example_kitchens($format);

        include $this->ajax_blocks_path . 'example-kitchens-ajax.php';
        wp_die();
    }

    public function get_example_kitchens($format): array
    {
        $args = [];
        $defaultArgs = [
            'post_type' => 'kitchens',
            'posts_per_page' => 4,
            'post_status' => 'publish',
        ];

        if ($format === 'new') {
            $args = [
                'orderby' => 'publish_date',
                'order' => 'DESC',
            ];
        }

        if ($format === 'popular') {
            $args = [
                'meta_key' => 'popular',
                'meta_value' => '1',
                'compare' => '=',
            ];
        }

        if ($format === 'discount') {
            $args = [
                'meta_key' => 'discount',
                'meta_value' => '1',
                'compare' => '=',
            ];
        }

        return get_posts(array_merge($defaultArgs, $args));
    }

    public function reviews()
    {
        ['type' => $type] = $_POST;
        $reviews = $this->get_reviews($type);

        include $this->ajax_blocks_path . 'review-card.php';
        wp_die();
    }

    public function popular_styles()
    {
        $term_id = $_POST['termId'];
        $gallery = $this->get_popular_styles($term_id);

        include $this->ajax_blocks_path . 'popular-styles-ajax.php';
        wp_die();
    }

    public function get_popular_styles($term_id)
    {
        $term = get_term($term_id, 'kitchen-category');

        return get_field('gallery', $term->taxonomy . '_' . $term->term_id);
    }

    public function kitchen_filter(): void
    {
        $dataFilter = $this->get_kitchen_filter();

        $entities = $dataFilter['kitchens'];
        $paged = $dataFilter['paged'];
        $max_page = $dataFilter['max_page'];
        $classContainer = 'catalog-filter-results';

        include $this->ajax_blocks_path . 'filter-card-ajax.php';
        wp_die();
    }

    public function get_kitchen_filter(
        ?string $taxonomy = '',
        ?string $term_id = '',
    ): array
    {
        $paged = $_GET['np'] ?? 1;
        $sort = $_GET['sort'] ?? 'new';
        $cheap = $_GET['cheap'] ?? 0;
        $expensive = $_GET['expensive'] ?? Helpers::getMaxPrice();
        $materials = $_GET['materials'] ?? '';
        $sizes = $_GET['sizes'] ?? '';
        $sorting = 9;

        if ($taxonomy && $term_id) {
            $current_tax = [
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $term_id,
            ];
        }

        if ($materials) {
            $materials_tax = [
                'taxonomy' => 'kitchen-material',
                'field' => 'term_id',
                'terms' => explode(',', $materials),
            ];
        }

        if ($sizes) {
            $sizes_tax = [
                'taxonomy' => 'kitchen-size',
                'field' => 'term_id',
                'terms' => explode(',', $sizes)
            ];
        }

        $tax_query = [
            'relation' => 'AND',
            $current_tax ?? '',
            $materials_tax ?? '',
            $sizes_tax ?? ''
        ];

        $meta_query = [
            'relation' => 'AND',
            'key' => 'price',
            'value' => [(int)$cheap, (int)$expensive],
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        ];

        if ($sort === 'new') {
            $order = [
                'orderby' => 'post_date',
                'order' => 'ASC',
            ];
        }

        if ($sort === 'discount') {
            $order = [
                'meta_key' => 'discount',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            ];
        }

        if ($sort === 'expensive') {
            $order = [
                'meta_key' => 'price',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            ];
        }

        if ($sort === 'cheap') {
            $order = [
                'meta_key' => 'price',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
            ];
        }

        if ($sort === 'popular') {
            $order = [
                'meta_key' => 'popular',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            ];
        }

        $args = [
            'post_type' => 'kitchens',
            'posts_per_page' => -1,
            'post_status' => 'publish',

            'tax_query' => [
                $tax_query
            ],

            'meta_query' => [
                $meta_query
            ]
        ];

        $kitchens = get_posts(array_merge(array_merge($args, $order ?? [])));
        $count_kitchens = count($kitchens);
        $max_page = ceil($count_kitchens / $sorting);
        $kitchens = array_splice($kitchens, (($paged - 1) * $sorting), $sorting);

        if ($max_page < $paged) {
            $paged = $max_page;
        }

        return [
            'kitchens' => $kitchens,
            'paged' => $paged,
            'max_page' => $max_page
        ];
    }

    public function get_accessories_filter(): void
    {
        $termId = $_GET['termId'];
        $taxonomy = $_GET['taxonomy'];

        $dataFilter = $this->get_accessories($taxonomy, $termId);

        [
            'accessories' => $entities,
            'paged' => $paged,
            'max_page' => $max_page
        ] = $dataFilter;

        $classContainer = 'catalog-filter-results';
        $catalogPaginationClass = 'catalog-technics-pagination';

        include get_template_directory() . '/ajax-blocks/filter-card-ajax.php';
        wp_die();
    }


    public function get_accessories(
        string $taxonomy = null,
        int $termId = null
    ): array
    {
        $paged = $_GET['onpage'] ?? 1;
        $sorting = 6;

        if (!empty($taxonomy) && !empty($termId)) {
            $current_tax = [
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $termId,
            ];
        }

        $tax_query = [
            'relation' => 'AND',
            $current_tax ?? '',
        ];
        $args = [
            'post_type' => 'accessories',
            'posts_per_page' => -1,
            'post_status' => 'publish',

            'tax_query' => [
                $tax_query
            ],
        ];

        $technics = get_posts($args);
        $count_technics = count($technics);
        $max_page = ceil($count_technics / $sorting);
        $technics = array_splice($technics, (($paged - 1) * $sorting), $sorting);

        if ($max_page < $paged) {
            $paged = $max_page;
        }

//        var_dump($paged);
//
//        die();


        return [
            'accessories' => $technics,
            'paged' => $paged,
            'max_page' => (int)$max_page
        ];
    }

    public function get_technics(
         string $taxonomy = null,
         int $termId = null
    ): array
    {
        $paged = $_GET['onpage'] ?? 1;
        $sorting = 6;

        if (!empty($taxonomy) && !empty($termId)) {
            $current_tax = [
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $termId,
            ];
        }

        $tax_query = [
            'relation' => 'AND',
            $current_tax ?? '',
        ];
        $args = [
            'post_type' => 'technics',
            'posts_per_page' => -1,
            'post_status' => 'publish',

            'tax_query' => [
                $tax_query
            ],
        ];

        $technics = get_posts($args);
        $count_technics = count($technics);
        $max_page = ceil($count_technics / $sorting);
        $technics = array_splice($technics, (($paged - 1) * $sorting), $sorting);

        if ($max_page < $paged) {
            $paged = $max_page;
        }

//        var_dump($paged);
//
//        die();


        return [
            'technics' => $technics,
            'paged' => $paged,
            'max_page' => (int)$max_page
        ];
    }

    public function get_technics_filter(): void
    {
        $termId = $_GET['termId'];
        $taxonomy = $_GET['taxonomy'];

        $dataFilter = $this->get_technics($taxonomy, $termId);

        [
            'technics' => $entities,
            'paged' => $paged,
            'max_page' => $max_page
        ] = $dataFilter;

        $classContainer = 'catalog-filter-results';
        $catalogPaginationClass = 'catalog-technics-pagination';

        include get_template_directory() . '/ajax-blocks/filter-card-ajax.php';
        wp_die();
    }

    public function getArticlesByTermId(?string $termId): array
    {
        ['articles' => $articles] = $this->get_articles($termId);

        $articles = $articles ?? [];
        shuffle($articles);
        $articles = array_slice($articles, 0, 10);

        return $articles;
    }

    public function get_articles(
        ?string $term_id = '',
        array $params = []
    ): array
    {
        $paged = $_GET['np'] ?? 1;
        $term_id = $_GET['term_id'] ?? $term_id;
        $sorting = 6;
        $isDiscount = $params['discount'] ?? $_GET['discount'] ?? false;


        if ($term_id) {
            $current_tax = [
                'taxonomy' => 'articles-category',
                'field' => 'term_id',
                'terms' => $term_id,
            ];
        }


        $tax_query = [
            'relation' => 'AND',
            $current_tax ?? '',
        ];

        $args = [
            'post_type' => 'articles',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'tax_query' => [
                $tax_query
            ],
        ];

        if (!empty($isDiscount)) {
            $filter = [
                'meta_key' => 'is_discount',
                'meta_value' => $isDiscount,
                'compare' => '=',
            ];

            $args = array_merge($args, $filter);
        }


        $articles = get_posts($args);
        $count_articles = count($articles);
        $max_page = ceil($count_articles / $sorting);
        $articles = array_splice($articles, (($paged - 1) * $sorting), $sorting);

        if ($max_page < $paged) {
            $paged = $max_page;
        }

        return [
            'articles' => $articles,
            'paged' => $paged,
            'max_page' => $max_page
        ];
    }

    public function get_articles_filter(): void
    {
        $dataFilter = $this->get_articles();

        [
            'articles' => $articles,
            'paged' => $paged,
            'max_page' => $max_page
        ] = $dataFilter;

        include $this->ajax_blocks_path . 'filter-cards-articles-ajax.php';
        wp_die();
    }


    public function get_reviews(?string $type = null): array
    {
        if ($type === 'video') {
            $meta_value = 1;
        }

        $args = [
            'post_type' => 'reviews',
            'posts_per_page' => 10,
            'post_status' => 'publish',
            'meta_key' => 'is_video',
            'meta_value' => $meta_value ?? 0,
            'compare' => '=',
        ];

        return get_posts($args);
    }

}