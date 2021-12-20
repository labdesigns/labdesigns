<?php

/**
 * Template part for  portfolio cases archive
 *
 *
 *
 * @package LabDesigns
 */
$cases_short_descr = get_post_meta($post->ID, 'cases_short_descr', true);
$cases_tech_list_items = get_post_meta($post->ID, 'cases_tech_list', true);
$cases_github = get_post_meta($post->ID, 'cases_github', true);
$cases_ext_url = get_post_meta($post->ID, 'cases_ext_url', true);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('archive-cases-part'); ?>>
    <div class="post-thumb">
        <?php
        if (the_post_thumbnail()) {
            the_post_thumbnail('thumbnail');
        }
        ?>
        <a href="<?= the_permalink(); ?>">
            <div class="cases-overlay">
                <div class="case-title">
                    <h5><?= the_title(); ?></h5>
                </div>
                <div class="cases-perma-link">
                    <h5><?php _e('Case details', 'labdesigns') ?> </h5>
                </div>
            </div>
        </a>
    </div>

</article>