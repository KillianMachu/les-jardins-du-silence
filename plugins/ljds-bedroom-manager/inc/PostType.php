<?php

namespace LjdsBedroomManager;

class PostType
{
    const POST_TYPE = 'bedroom';

    public function register()
    {
        add_action('init', [$this, 'register_bedroom_post_type']);
    }

    public function register_bedroom_post_type()
    {
        $labels = array(
            'name' => _x('Bedrooms', 'Post type general name', 'ljds-bedroom-manager'),
            'singular_name' => _x('Bedroom', 'Post type singular name', 'ljds-bedroom-manager'),
            'menu_name' => _x('Bedrooms', 'Admin Menu text', 'ljds-bedroom-manager'),
            'name_admin_bar' => _x('Bedroom', 'Add New on Toolbar', 'ljds-bedroom-manager'),
            'add_new' => __('Add Bedroom', 'ljds-bedroom-manager'),
            'add_new_item' => __('Add New Bedroom', 'ljds-bedroom-manager'),
            'new_item' => __('New Bedroom', 'ljds-bedroom-manager'),
            'edit_item' => __('Edit Bedroom', 'ljds-bedroom-manager'),
            'view_item' => __('View Bedroom', 'ljds-bedroom-manager'),
            'all_items' => __('All Bedrooms', 'ljds-bedroom-manager'),
            'search_items' => __('Search Bedrooms', 'ljds-bedroom-manager'),
            'parent_item_colon' => __('Parent Bedrooms:', 'ljds-bedroom-manager'),
            'not_found' => __('No Bedrooms Found', 'ljds-bedroom-manager'),
            'not_found_in_trash' => __('No Bedrooms Found in Trash', 'ljds-bedroom-manager'),
            'featured_image' => __('Bedroom Image', 'ljds-bedroom-manager'),
            'set_featured_image' => __('Set Bedroom Image', 'ljds-bedroom-manager'),
            'remove_featured_image' => __('Remove Bedroom Image', 'ljds-bedroom-manager'),
            'use_featured_image' => __('Use as Bedroom Image', 'ljds-bedroom-manager'),
            'archives' => __('Bedroom Archives', 'ljds-bedroom-manager'),
            'insert_into_item' => __('Insert into bedroom', 'ljds-bedroom-manager'),
            'uploaded_to_this_item' => __('Uploaded to this bedroom', 'ljds-bedroom-manager'),
            'filter_items_list' => __('Filter bedrooms list', 'ljds-bedroom-manager'),
            'items_list_navigation' => __('Bedrooms list navigation', 'ljds-bedroom-manager'),
            'items_list' => __('Bedrooms list', 'ljds-bedroom-manager'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-admin-home',
            'hierarchical' => false,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'has_archive' => true,
            'rewrite' => array('slug' => 'bedrooms'),
            'menu_position' => 20,
        );

        register_post_type(self::POST_TYPE, $args);
    }
}

?>