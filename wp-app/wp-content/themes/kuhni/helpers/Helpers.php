<?php

namespace helpers;

class Helpers
{
    public static function get_breadcrumb() : string
    {
        $separator = ' • ';
        $result = '';

        if (!is_front_page()) {
            $result .= '<a href="' . get_home_url() . '">Главная</a>' . $separator;

            if (is_single()) {
                $result .= get_the_title();
            } elseif (is_page()) {
                $result .= get_the_title();
            } elseif (is_category()) {
                $result .= single_cat_title();
            }
        }

        return $result;
    }

    public static function getMaxPrice() : int
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
        return floor($countWords / $wordPerMinute);
    }
}