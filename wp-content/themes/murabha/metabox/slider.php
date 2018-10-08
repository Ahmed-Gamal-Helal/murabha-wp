<?php

add_action('cmb2_admin_init', 'cmb2_about_metaboxes');

/**
 * Define the metabox and field configurations.
 */
function cmb2_about_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_ho_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box(array(
        'id' => 'slider',
        'title' => __('خصائص اضافيه', 'cmb2'),
        'object_types' => array('slider'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
            // 'cmb_styles' => false, // false to disable the CMB stylesheet
            // 'closed'     => true, // Keep the metabox closed by default
    ));

    // Regular text field
    $cmb->add_field(array(
        'name' => __('الصوره تحت النص', 'cmb2'),
        'desc' => __('صوره تظهر اسفل محتوى من نحن', 'cmb2'),
        'id' => $prefix . 'img_about_par',
        'type' => 'file',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ));

}
