<?php

function slider_custom_post() {
    $labels = array(
        'name' => _x((qtranxf_getLanguage() == 'ar')? 'السلايدر' : 'Team work', 'post type general name'),
        'singular_name' => _x((qtranxf_getLanguage() == 'ar')? 'السلايدر' : 'Team work', 'post type general name'),
        'add_new' => _x('أضف جديد', 'gallery'),
        'add_new_item' => __('أضف صوره جديد'),
        'edit_item' => __('تعديل صوره'),
        'new_item' => __('صوره جديد'),
        'all_items' => __('كل الصور'),
        'view_item' => __('صوره'),
        'search_items' => __('البحث فى الصور'),
        'not_found' => __('لا يوجد صور'),
        'not_found_in_trash' => __('لا يوجد صور في سلة المهملات'),
        'parent_item_colon' => '',
        'menu_name' => 'Main Slider'
    );
    $args2 = array(
        'menu_icon'  => 'dashicons-format-gallery',
        'hierarchical' => true,
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail', 'editor'),
        'has_archive' => true,
        'exclude_from_search' => FALSE,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
    );
    register_post_type('slider', $args2);
}

add_action('init', 'slider_custom_post');


// add_action('cmb2_admin_init', 'cmb2_plan_metaboxes');