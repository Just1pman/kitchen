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
}