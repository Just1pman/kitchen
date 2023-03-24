<?php

namespace helpers;

class Helpers
{
    public static function get_breadcrumb() : string
    {
        $separator = "<span>•</span>";
        $result = '';

        if (!is_front_page()) {
            $result .= '<a href="' . get_home_url() . '">Главная</a>' . $separator;
            $postType = get_post_type();
            if ($postType === 'articles') {
                $totalPage = '<a href="' . get_home_url() . "/$postType" . '">Блог</a>';
            }

            if ($postType === 'kitchens') {
                $totalPage = '<a href="' . get_home_url() . "/catalog" . '">Каталог</a>';
            }

            if ($postType === 'technics') {
                $totalPage = '<a href="' . get_home_url() . "/$postType" . '">Техника</a>';
            }

            if ($postType === 'accessories') {
                $totalPage = '<a href="' . get_home_url() . "/$postType" . '">Комплектующие</a>';
            }

            if (is_single()) {
                $result .= ($totalPage ?? '') . $separator . get_the_title();
            } elseif (is_page()) {
                $result .= get_the_title();
            } elseif (is_category()) {
                $result .= single_cat_title();
            } elseif (is_tax()) {
                $result .= get_queried_object()->name;
            }
        }

        return $result;
    }

    public static function getMaxPrice() : int|string
    {
        $kitchens = get_posts([
            'post_type' => 'kitchens',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ]);

        $prices = [];
        foreach ($kitchens as $kitchen) {
            $price = get_field('price', $kitchen->ID);
            $price = str_replace(' ', '', $price);
            $prices[] = trim($price);
        }

        return max($prices);
    }

    public static function get_reading_time(string $text) : string
    {
        $wordPerMinute = 200;
        $clearText = strip_tags($text);
        $countWords = count(preg_split('/\W+/u', $clearText, -1, PREG_SPLIT_NO_EMPTY));
        $readingTime = floor($countWords / $wordPerMinute);

        return !empty($readingTime) ? $readingTime : 1;
    }

    public static function get_youtube_id_from_url(string $url):?string {
//        $url = "http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate";
        parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
        return $my_array_of_vars['v'] ?? null;
    }
}