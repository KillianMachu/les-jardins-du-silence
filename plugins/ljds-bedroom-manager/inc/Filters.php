<?php

namespace LjdsBedroomManager;

class Filters
{
    public function register()
    {
        add_action('pre_get_posts', [$this, 'pre_get_posts']);
    }

    public function pre_get_posts($query)
    {
        if (is_admin() || !$query->is_main_query() || empty($_POST)) {
            return;
        }

        if (is_post_type_archive(PostType::POST_TYPE)) {
            $meta_query = [];
            foreach ($_POST as $name => $value) {
                if (str_contains($name, 'filter') && !empty($value)) {
                    $key = str_replace('filter-', '', $name);
                    var_dump($key, $value);
                    $min = (int)$value['min'];
                    $max = (int)$value['max'];
                    var_dump($min, $max);

                    $meta_query[] = [
                        'key' => $key,
                        'value' => [$min, $max],
                        'compare' => 'BETWEEN',
                        'type' => 'NUMERIC',
                    ];
                }
            }
            if (!empty($meta_query)) {
                $query->set('meta_query', $meta_query);
            }
        }
    }

    public static function display()
    {
        include __DIR__ . "/../public/templates/filters.php";
    }
}