<?php

add_action('wp_enqueue_scripts', 'enqueue_child_styles');
function enqueue_child_styles()
{
    wp_enqueue_style('ljds-style', get_stylesheet_directory_uri() . '/style.css');
}

add_theme_support('block-templates');