<?php

function aboutinfo_custom_post() {
    $labels = array(
        'name' => _x((qtranxf_getLanguage() == 'ar')? 'خصائص من نحن' : 'aboutinfo', 'post type general name'),
        'singular_name' => _x((qtranxf_getLanguage() == 'ar')? 'خصائص من نحن' : 'aboutinfo', 'post type general name'),
        'add_new' => _x('أضف خاصية', 'gallery'),
        'add_new_item' => __('أضف خاصية جديد'),
        'edit_item' => __('تعديل خاصية'),
        'new_item' => __('خاصية جديد'),
        'all_items' => __('كل الخصائص'),
        'view_item' => __('خاصيةت'),
        'search_items' => __('البحث في الخصائص'),
        'not_found' => __('لا يوجد خاصية'),
        'not_found_in_trash' => __('لا يوجد خاصية في سلة المهملات'),
        'parent_item_colon' => '',
        'menu_name' => 'About us'
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
    register_post_type('aboutinfo', $args);
}

add_action('init', 'aboutinfo_custom_post');


add_action('cmb2_admin_init', 'cmb2_p_metaboxes');

/**
 * Define the metabox and field configurations.
 */
function cmb2_p_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_br_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box(array(
        'id' => 'aboutinfo_1',
        'title' => __('خصائص اضافية', 'cmb2'),
        'object_types' => array('aboutinfo'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
            // 'cmb_styles' => false, // false to disable the CMB stylesheet
            // 'closed'     => true, // Keep the metabox closed by default
    ));

    $cmb->add_field(array(
        'name' => __('الايكونه', 'cmb2'),
        'desc' => __('صوره الخدمة ف الصفحه الرئيسيه', 'cmb2'),
        'id' => $prefix . 'icon_fontawsome',
        'type' => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ));
    
}
