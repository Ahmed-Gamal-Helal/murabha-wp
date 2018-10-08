<?php

function features_custom_post() {
    $labels = array(
        'name' => _x((qtranxf_getLanguage() == 'ar')? 'المميزات' : 'features', 'post type general name'),
        'singular_name' => _x((qtranxf_getLanguage() == 'ar')? 'المميزات' : 'features', 'post type general name'),
        'add_new' => _x('أضف جديد', 'gallery'),
        'add_new_item' => __('أضف ميزة جديد'),
        'edit_item' => __('تعديل ميزة'),
        'new_item' => __('ميزة جديد'),
        'all_items' => __('كل المميزات'),
        'view_item' => __('ميزة المميزات'),
        'search_items' => __('البحث في المميزات'),
        'not_found' => __('لا يوجد ميزة'),
        'not_found_in_trash' => __('لا يوجد ميزة في سلة المهملات'),
        'parent_item_colon' => '',
        'menu_name' => 'المميزات'
    );
    $args = array(
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail', 'editor', 'comments'),
        'has_archive' => true,
        'exclude_from_search' => FALSE,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
    );
    register_post_type('features', $args);
}

add_action('init', 'features_custom_post');

