<?php

/**
 * Register a custom post type called "cases".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_cases_init()
{
    $labels = array(
        'name'                  => _x('cases', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('case', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('cases', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('cases', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New cases', 'textdomain'),
        'new_item'              => __('New cases', 'textdomain'),
        'edit_item'             => __('Edit cases', 'textdomain'),
        'view_item'             => __('View cases', 'textdomain'),
        'all_items'             => __('All casess', 'textdomain'),
        'search_items'          => __('Search casess', 'textdomain'),
        'parent_item_colon'     => __('Parent casess:', 'textdomain'),
        'not_found'             => __('No cases found.', 'textdomain'),
        'not_found_in_trash'    => __('No cases found in Trash.', 'textdomain'),
        'featured_image'        => _x('cases Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives'              => _x('cases archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into cases', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this cases', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter casess list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('cases list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list'            => _x('cases list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'cases'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-book-alt',
        'taxonomies'         => array('type'),
        'supports'           => array('title', 'author', 'thumbnail', 'excerpt'),
    );

    register_post_type('cases', $args);
}

add_action('init', 'wpdocs_codex_cases_init');




/////////////// Add taxonomy to Cases ///////////////

add_action('init', 'cases_taxonoies', 0);
function cases_taxonoies()
{
    $args = array(
        'show_ui'           => true,
        'show_admin_column' => true,
    );
    register_taxonomy('type', 'cases', array('hierarchical' => true, 'label' => 'Types', 'query_var' => false, 'rewrite' => true), $args);
}



/////////////// Add custom fields ///////////////


//----- Cases techlist repeater fieldgroup -----//

add_action('cmb2_init', 'cases_techlist_repeater');

function cases_techlist_repeater()
{

    /**
     * Repeatable Field Groups
     */
    $cmb_group = new_cmb2_box(array(
        'id'           => 'cases_group_metabox',
        'title'        => esc_html__('Techlist', 'cmb2'),
        'object_types' => array('cases'),
    ));

    // $group_field_id is the field id string, so in this case: 'cases_group_demo'
    $group_field_id = $cmb_group->add_field(array(
        'id'          => 'cases_tech_list',
        'type'        => 'group',
        'description' => esc_html__('Generates reusable form entries', 'cmb2'),
        'options'     => array(
            'group_title'    => esc_html__('Entry {#}', 'cmb2'), // {#} gets replaced by row number
            'add_button'     => esc_html__('Add Another Entry', 'cmb2'),
            'remove_button'  => esc_html__('Remove Entry', 'cmb2'),
            'sortable'       => true,
            'closed'      => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ));

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_group->add_group_field($group_field_id, array(
        'name'       => esc_html__('Entry Title', 'cmb2'),
        'id'         => 'title',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ));


    $cmb_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Entry Image', 'cmb2'),
        'id'   => 'image',
        'type' => 'file',
    ));
}




//----- cases_external_links fieldgroup -----//


add_action('cmb2_admin_init', 'cases_external_links');
function cases_external_links()
{

    /**
     * Initiate the metabox
     */
    $cmb_links = new_cmb2_box(array(
        'id'            => 'external_links',
        'title'         => __('External Links', 'cmb2'),
        'object_types'  => array('cases',), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ));


    // URL text field
    $cmb_links->add_field(array(
        'name' => __('Github', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id'   => 'cases_github',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ));

    // URL text field
    $cmb_links->add_field(array(
        'name' => __('Ext Url', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id'   => 'cases_ext_url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ));

    // URL text field
    $cmb_links->add_field(array(
        'name' => __('Dienstverband', 'cmb2'),
        'desc' => __('field description (optional)', 'cmb2'),
        'id'   => 'cases_dienstverb',
        'type' => 'text',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ));
}



//----- cases MORE META fieldgroup -----//


add_action('cmb2_admin_init', 'cases_more_meta');
function cases_more_meta()
{

    /**
     * Initiate the metabox
     */
    $cmb_more_meta = new_cmb2_box(array(
        'id'            => 'more_meta',
        'title'         => __('Cases Content', 'cmb2'),
        'object_types'  => array('cases',), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ));



    // header image (transparent background featured image)
    $cmb_more_meta->add_field(array(
        'name' => esc_html__('Header Image', 'cmb2'),
        'id'   => 'cases_header_image',
        'type' => 'file',
    ));

    // // wysiwyg Short description
    // $cmb_more_meta->add_field(array(
    //     'name' => __('Short description', 'cmb2'),
    //     'desc' => __('field description (REQUIRED)', 'cmb2'),
    //     'id'   => 'cases_short_descr',
    //     'type' => 'wysiwyg',
    //     'options' => array(
    //         'wpautop' => true, // use wpautop?
    //         'media_buttons' => false, // show insert/upload button(s)
    //         'textarea_rows' => get_option('default_post_edit_rows', 10),
    //     ),
    // ));

    // wysiwyg client description
    $cmb_more_meta->add_field(array(
        'name' => __('Client description', 'cmb2'),
        'desc' => __('field description (REQUIRED)', 'cmb2'),
        'id'   => 'cases_client_descr',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => get_option('default_post_edit_rows', 10),
        ),
    ));

    // wysiwyg assignment description
    $cmb_more_meta->add_field(array(
        'name' => __('Assignment description', 'cmb2'),
        'desc' => __('field description (REQUIRED)', 'cmb2'),
        'id'   => 'cases_assignment_descr',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => get_option('default_post_edit_rows', 10),
        ),
    ));

    // wysiwyg delivered
    $cmb_more_meta->add_field(array(
        'name' => __('Delivered', 'cmb2'),
        'desc' => __('field description (REQUIRED)', 'cmb2'),
        'id'   => 'cases_delivered_descr',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => get_option('default_post_edit_rows', 10),
        ),
    ));


    // wysiwyg review
    $cmb_more_meta->add_field(array(
        'name' => __('Client Review', 'cmb2'),
        'desc' => __('field description (REQUIRED)', 'cmb2'),
        'id'   => 'cases_review_descr',
        'type' => 'wysiwyg',
        'options' => array(
            'wpautop' => true, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            'textarea_rows' => get_option('default_post_edit_rows', 10),
        ),
    ));
}



//----- Cases Product images repeater fieldgroup -----//

add_action('cmb2_init', 'cases_prod_img_repeater');

function cases_prod_img_repeater()
{

    /**
     * Repeatable Field Groups
     */
    $cmb_prod_group = new_cmb2_box(array(
        'id'           => 'cases_prod_img_metabox',
        'title'        => esc_html__('Product Images', 'cmb2'),
        'object_types' => array('cases'),
    ));

    // $group_field_id is the field id string, so in this case: 'cases_group_demo'
    $group_field_id = $cmb_prod_group->add_field(array(
        'id'          => 'cases_prod_img_list',
        'type'        => 'group',
        'description' => esc_html__('Product images', 'cmb2'),
        'options'     => array(
            'group_title'    => esc_html__('Image {#}', 'cmb2'), // {#} gets replaced by row number
            'add_button'     => esc_html__('Add Another Image', 'cmb2'),
            'remove_button'  => esc_html__('Remove Image', 'cmb2'),
            'sortable'       => true,
            'closed'      => true, // true to have the groups closed by default
            // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
        ),
    ));

    /**
     * Group fields works the same, except ids only need
     * to be unique to the group. Prefix is not needed.
     *
     * The parent field's id needs to be passed as the first argument.
     */
    $cmb_prod_group->add_group_field($group_field_id, array(
        'name'       => esc_html__('Image Title', 'cmb2'),
        'id'         => 'title',
        'type'       => 'text',
        // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ));


    $cmb_prod_group->add_group_field($group_field_id, array(
        'name' => esc_html__('Image Image', 'cmb2'),
        'id'   => 'image',
        'type' => 'file',
    ));
}
