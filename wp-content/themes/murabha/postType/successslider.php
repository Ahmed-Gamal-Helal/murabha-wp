<?php

function successslider_custom_post() {
    $labels = array(
        // 'name' => _x((qtranxf_getLanguage() == 'ar')? 'السلايدر' : 'Team work', 'post type general name'),
        // 'singular_name' => _x((qtranxf_getLanguage() == 'ar')? 'السلايدر' : 'Team work', 'post type general name'),
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
        'menu_name' => 'شركاء النجاح'
    );
    $args = array(
        'menu_icon'  => 'dashicons-format-gallery',
        'hierarchical' => true,
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('thumbnail'),
        'has_archive' => true,
        'exclude_from_search' => FALSE,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
    );
    register_post_type('successslider', $args);
}

add_action('init', 'successslider_custom_post');


add_action('cmb2_admin_init', 'cmb2_plan_metaboxes3');

/**
 * Define the metabox and field configurations.
 */
function cmb2_plan_metaboxes3() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_br_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box(array(
        'id' => 'serv_metabox',
        'title' => __('الكلمه فوق العنوان', 'cmb2'),
        'object_types' => array('successslider'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
            // 'cmb_styles' => false, // false to disable the CMB stylesheet
            // 'closed'     => true, // Keep the metabox closed by default
    ));

    // Regular text field
    
    $cmb->add_field(array(
        'name' => __('نص مختصر', 'cmb2'),
        'desc' => __('نص مختصر يظهر فوق العنوان', 'cmb2'),
        'id' => $prefix . 'link_successslider',
        'attributes' => array('class' => 'link_successslider'),
        'type' => 'text',
            // 'repeatable' => true,
    ));
    
}



?>