<?php

namespace LjdsBedroomManager;

class Taxonomies
{
    public function register()
    {
        add_action('init', [$this, 'register_bed_type_taxonomies']);
        add_action('init', [$this, 'register_price_range_taxonomies']);
    }

    public function register_bed_type_taxonomies()
    {
        $labels = array(
            'name' => _x('Bed types', 'taxonomy general name', 'ljds-bedroom-manager'),
            'singular_name' => _x('Bed type', 'taxonomy singular name', 'ljds-bedroom-manager'),
            'menu_name' => __('Bed types', 'ljds-bedroom-manager'),
            'all_items' => __('All bed types', 'ljds-bedroom-manager'),
            'edit_item' => __('Edit bed type', 'ljds-bedroom-manager'),
            'view_item' => __('View bed type', 'ljds-bedroom-manager'),
            'update_item' => __('Update bed type', 'ljds-bedroom-manager'),
            'add_new_item' => __('Add a new bed type', 'ljds-bedroom-manager'),
            'new_item_name' => __('New bed type name', 'ljds-bedroom-manager'),
            'parent_item' => __('Parent bed type', 'ljds-bedroom-manager'),
            'parent_item_colon' => __('Parent bed type :', 'ljds-bedroom-manager'),
            'search_items' => __('Search for bed types', 'ljds-bedroom-manager'),
            'popular_items' => __('Popular bed types', 'ljds-bedroom-manager'),
            'separate_items_with_commas' => __('Separate bed types with commas', 'ljds-bedroom-manager'),
            'add_or_remove_items' => __('Add or remove bed types', 'ljds-bedroom-manager'),
            'choose_from_most_used' => __('Choose from the most used bed types', 'ljds-bedroom-manager'),
            'not_found' => __('No bed types found', 'ljds-bedroom-manager'),
            'back_to_items' => __('Back to bed types', 'ljds-bedroom-manager'),
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rewrite' => array(
                'slug' => 'bed-type'
            ),
        );

        register_taxonomy('bed_type', PostType::POST_TYPE, $args);
    }

    public function register_price_range_taxonomies()
    {
        $labels = array(
            'name' => _x('Price ranges', 'taxonomy general name', 'ljds-bedroom-manager'),
            'singular_name' => _x('Price range', 'taxonomy singular name', 'ljds-bedroom-manager'),
            'menu_name' => __('Price range', 'ljds-bedroom-manager'),
            'all_items' => __('All price ranges', 'ljds-bedroom-manager'),
            'edit_item' => __('Edit price range', 'ljds-bedroom-manager'),
            'view_item' => __('View price range', 'ljds-bedroom-manager'),
            'update_item' => __('Update price range', 'ljds-bedroom-manager'),
            'add_new_item' => __('Add a new price range', 'ljds-bedroom-manager'),
            'new_item_name' => __('New price range name', 'ljds-bedroom-manager'),
            'parent_item' => __('Parent price range', 'ljds-bedroom-manager'),
            'parent_item_colon' => __('Parent price range :', 'ljds-bedroom-manager'),
            'search_items' => __('Search for price ranges', 'ljds-bedroom-manager'),
            'popular_items' => __('Popular price ranges', 'ljds-bedroom-manager'),
            'separate_items_with_commas' => __('Separate price ranges with commas', 'ljds-bedroom-manager'),
            'add_or_remove_items' => __('Add or remove price ranges', 'ljds-bedroom-manager'),
            'choose_from_most_used' => __('Choose from the most used price ranges', 'ljds-bedroom-manager'),
            'not_found' => __('No price ranges found', 'ljds-bedroom-manager'),
            'back_to_items' => __('Back to price ranges', 'ljds-bedroom-manager'),
        );

        $args = array(
            'labels' => $labels,
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'show_in_rest' => true,
            'rewrite' => array(
                'slug' => 'price-range'
            ),
        );

        register_taxonomy('price_range', PostType::POST_TYPE, $args);
    }
}


?>