<?php

add_action('cmb2_admin_init', 'cmb2_home_metaboxes');

/**
 * Define the metabox and field configurations.
 */
function cmb2_home_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_ho_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box(array(
        'id' => 'homepage',
        'title' => __('خصائص الصفحة الرئيسية', 'cmb2'),
        'object_types' => array('page'), // post type
        'show_on' => array('key' => 'page-template', 'value' => 'homepage.php'),
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
            // 'cmb_styles' => false, // false to disable the CMB stylesheet
            // 'closed'     => true, // Keep the metabox closed by default
    ));

}

