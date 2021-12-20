<?php
////////////////////////////////////// Add Header Image to Posttype: 'Post'
add_action('cmb2_admin_init', 'post_custom_meta');
function post_custom_meta()
{

    /**
     * Initiate the metabox
     */
    $cmb_more_meta = new_cmb2_box(array(
        'id'            => 'post-meta',
        'title'         => __('post-meta', 'cmb2'),
        'object_types'  => array('post',), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ));



    // header image (transparent background featured image)
    $cmb_more_meta->add_field(array(
        'name' => esc_html__('post_header_image', 'cmb2'),
        'id'   => 'post_header_image',
        'type' => 'file',
    ));
}


// Allow svg uploads

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
add_action('admin_head', 'fix_svg');
